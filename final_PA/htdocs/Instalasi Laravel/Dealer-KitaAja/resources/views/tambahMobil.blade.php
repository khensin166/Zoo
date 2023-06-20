@extends('layouts.layout')

@section('Title', 'Daftar Mobil')
@section('content')
<div class="container">
    <a href="{{url('/')}}" class="btn btn-success m-2">Kembai ke Daftar Mobil</a>
    <div class="row m-1">
        <div class="col">
            <form action="{{ url('tambahMobil')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Mobil</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="tesla" value="{{ old
                        ('nama') }}">
                    </div>
                    @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" rows="3" placeholder="...
                        ">{{ old('deskripsi') }}</textarea>
                    </div>
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="gambar">Pilih Gambar :</label>
                        <input name="gambar" class="@error('gambar') is-invalid @enderror" type="file" id="gambar" value="{{ old('gambar') }}">
                    </div>
                    @error('gambar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="stok">Stok : </label>
                        <input name="stok" types="number" class="form-control @error('stok') is-invalid @enderror" id="stok" value="{{ old('stok') }}">
                    </div>
                    @error('stok')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="harga">harga : </label>
                        <input name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" value="{{ old('harga') }}
                        ">
                    </div>
                    @error('harga')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary" type="submit">Tambahkan Mobil</button>
                </form>
            </div>
        </div>
    </div>
@endSection