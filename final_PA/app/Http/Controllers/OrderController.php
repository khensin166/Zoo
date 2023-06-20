<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    // menampilkan form isian
    public function create($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        return view('wisatawan.Pesanan.index', compact('ticket'));
    }

    //Menyetor data request pesanan namun terlebi dahulu di validasi
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer|min:1',
            'waktu_berkunjung' => 'required|date',
            'gambar_bukti_pembayaran' => 'required|image',
            'nomor_telepon' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $ticket = Ticket::findOrFail($request->ticket_id);
        $orderQuantity = $request->jumlah;

        // Cek ketersediaan stok tiket
        if ($ticket->jumlah_stok >= $orderQuantity) {
            $order = new Order();
            $order->ticket_id = $request->ticket_id;
            $order->nama = $request->nama;
            $order->jumlah = $request->jumlah;
            $order->user_id =  $request->user_id;
            $order->harga = $ticket->harga * $request->jumlah;
            $order->waktu_berkunjung = $request->waktu_berkunjung;

            if ($request->hasFile('gambar_bukti_pembayaran')) {
                $order->gambar_bukti_pembayaran = $request->file('gambar_bukti_pembayaran')->store('bukti_pembayaran', 'public');
            }

            $order->nomor_telepon = $request->nomor_telepon;
            $order->save();

            return redirect()->route('orders.show')->with('success', 'Pesanan berhasil dibuat.');
        } else {
            return redirect()->back()->with('error', 'Stok tiket tidak mencukupi.');
        }
    }

    //Menampilkan semua pesanan akun yang sedang login
    public function show()
    {
        $user = auth()->user();
        $userOrders = Order::where('user_id', $user->id)->get();

        return view('wisatawan.Pesanan.allPesanan', compact('userOrders'));
    }

    //
    public function approve($id)
    {
        $order = Order::findOrFail($id);
        $orderTicket = $order->ticket; // Assuming 'ticket' is the relationship method in the Order model

        $order->status = 'approved';
        $order->save();

        // Reduce ticket stock based on the order quantity
        $orderQuantity = $order->jumlah;
        $ticketStock = $orderTicket->jumlah_stok;

        if ($ticketStock >= $orderQuantity) {
            $orderTicket->jumlah_stok -= $orderQuantity;
            $orderTicket->save();
            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil disetujui.');
        } else {
            return redirect()->route('orders.index')->with('error', 'Stok tiket tidak mencukupi.');
        }
    }

    public function reject($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'rejected';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil ditolak.');
    }

    public function index() //menampilkan disisi admin
    {
        $orders = Order::all();
        return view('admin.Pesanan.index', compact('orders'));
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dihapus.');
    }

}
