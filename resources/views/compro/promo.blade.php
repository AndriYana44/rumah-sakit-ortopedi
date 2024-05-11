@extends('compro.layouts.app')
@section('content')
    
    @foreach($promo as $key => $item)
    <div class="col-sm-6 py-3">
        <div class="card-blog">
            <div class="header">
                <a href="{{ route('promotion', $item->slug) }}" class="post-thumb">
                    <img src="{{ asset('') }}files\gambar_promo\{{ $item->gambar }}" alt="gambar-berita">
                </a>
            </div>
            <div class="body">
                <h5 class="post-title" style="font-weight: 600"><a href="{{ route('promotion', $item->slug) }}">{{ $item->judul }}</a></h5>
                <div class="konten-promo" style="color: #999">
                    {!! $item->konten !!}
                </div>
                <div class="site-info">
                    <span class="mai-time"></span> Berlaku sampai:  {{ $item->deadline }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
@endsection