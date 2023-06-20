@extends('layouts.layout')

@section('title', 'Edit Mobil')

@section('content')
    <div class="container">
        <a href="{{ url('/') }}" class="btn btn-success m-2">Kembali ke Daftar Mobil</a>
        <div class="row m-1">
            <div class="col">
                <form action="{{ url('updateMobil/'.$mobil->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Mobil</label>
                        <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Tesla" value="{{ $mobil->nama }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3" placeholder="...">{{ $mobil->deskripsi }}</textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok:</label>
                        <input name="stok" type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ $mobil->stok }}">
                        @error('stok')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ $mobil->harga }}">
                        @error('harga')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Update Mobil</button>
                </form>
            </div>
        </div>
    </div>
@endsection
