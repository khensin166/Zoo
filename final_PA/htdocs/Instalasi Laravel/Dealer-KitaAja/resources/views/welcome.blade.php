@extends('layouts.layout')

@section('Title','Daftar Mobil')
@section('content')
<div class="container">
    <a href="{{url('tambahMobil')}}" class="btn btn-success m-2">Tambahkan Mobil</a>
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="row m-1">
        @foreach ($AllMobil as $item)
            <div class = "col-4 card border-0">
                <img src="{{asset('asset/gambar/' .$item['gambar'])}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$item['name']}}</h5>
                    <p class="card-text">{{$item['deskripsi']}}</p>
                </div>
                <div class="row">
                    <a href = "{{ url('editMobil/' .$item->id)}}" class="btn btn-primary"> Edit</a>
                    <form action ="{{ url ('hapusMobil/' .$item->id)}}" method="post">
                        @csrf
                        <button type="submit" class="col btn btn-danger ml-3">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
