<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $table = 'saran';

    protected $fillable = [
        'user_id',
        'isi',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}