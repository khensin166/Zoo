<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'ticket_id',
        'nama',
        'jumlah',
        'harga',
        'waktu_berkunjung',
        'gambar_bukti_pembayaran',
        'nomor_telepon',
        'status',
        'user_id',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
