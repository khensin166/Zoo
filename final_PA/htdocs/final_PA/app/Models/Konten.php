<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = 'konten';
    use HasFactory;

    protected $fillable = [
        'name',
        'kategori_id',
        'gambar',
        'detail',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
