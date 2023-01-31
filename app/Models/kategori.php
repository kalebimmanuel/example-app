<?php

namespace App\Models;

use App\Models\berita;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    public function berita()
    {
        return $this->hasMany(berita::class);
    }
}
