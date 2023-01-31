<?php
namespace App\Http\Controllers;
use App\Models\berita;
use App\Http\Requests\StoreberitaRequest;
use App\Http\Requests\UpdateberitaRequest;
class BeritaController extends Controller
{
    public function index()
    {
        return view('berita', [
            "title" => "Berita",
            "berita" => Berita::all()
        ]);
    }
    public function create()
    {
        //
    }
    public function store(StoreberitaRequest $request)
    {
        //
    }
    public function show(berita $detil_berita)
    {
        return view('detil_berita', [
            "title" => "Detil Berita",
            "db" => $detil_berita
        ]);
    }
    public function edit(berita $berita)
    {
        //
    }
    public function update(UpdateberitaRequest $request, berita $berita)
    {
        //
    }
    public function destroy(berita $berita)
    {
        //
    }
}
