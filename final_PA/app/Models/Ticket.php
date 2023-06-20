<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected $fillable = [
        'nama',
        'harga',
        'jumlah_stok',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
