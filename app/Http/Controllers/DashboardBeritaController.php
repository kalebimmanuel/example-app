<?php

namespace App\Http\Controllers;

use App\Models\berita;
use App\Models\kategori;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.berita.index',[
            'berita'=> Berita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.berita.create',[
            'kategori'=> kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_berita' => 'required|max:255',
            'slug' => 'required',
            'kategori_id' => 'required',
            'isi_berita' => 'required',
            'foto' => 'image|file|max:1024'
        ]);         
    
        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi_berita), 100);
        $validatedData['foto'] = $request->file('foto')->store('berita-foto');
        Berita::create($validatedData);
        return redirect('/dashboard/berita')->width('sukses', 'Berita Baru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $beritum)
    {
        return view('dashboard.berita.show', [
            'berita'=> $beritum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $beritum)
    {
        return view('dashboard.berita.edit',[
            'berita'=> $beritum,
            'kategori'=> kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $beritum)
    {
        $rules = [
            'judul_berita' => 'required|max:255',
            'kategori_id' => 'required',
            'isi_berita' => 'required',
            'foto' => 'image|file|max:1024'
        ];

        if($request->slug != $beritum->slug){
            $rules['slug']='required|unique:beritas';
        }
        $validatedData = $request->validate($rules);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi_berita), 100);

        if($request->file('foto')){
            if ($request->foto_lama){
                Storage::delete($request->foto_lama);
            }
            Berita::where('id', $beritum->id)->update($validatedData);

            return redirect('/dashboard/berita')->with('sukses', 'Data Berita Berhasil Di Update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        if($beritum->foto){
            Storage::delete($beritum->foto);
        }

        Berita::destroy($beritum->id);
        return redirect('/dashboard/berita')->with('sukses', 'Data Berita Berhasil Dihapus!');
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul_berita);

        return response()->json(['slug'=>$slug]);
    }
}
