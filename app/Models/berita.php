<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class berita extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }

    public function getRouteKey()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul_berita'
            ]
        ];
    }
}
