@extends('front.layouts.dizayn')

@section('category')


<div class="col-md-10 col-lg-8 col-xl-7">
    <!-- Post preview-->
    @if($Article->count() > 0)
        @foreach($Article as $Cat) 
            <div class="post-preview">
                <a href="{{ route('single', [$Cat->getCategory->slug, $Cat->slug]) }}">
                    <h2 class="post-title">{{ $Cat->title }}</h2>
                    <img src="{{ $Cat->image }}" width="500" height="300"/><br><br>
                    <h3 class="post-subtitle">{!! Str::limit($Cat->content, 75) !!}</h3>
                </a>
                <p class="post-meta">Kategori:
                    <a href="#!">{{ $Cat->getCategory->name }}</a><br>
                    <span class="float-right">Tarix: <b>{{ $Cat->created_at->diffForHumans() }}</b></span>
                </p>
            </div>
            @if(!$loop->last)
                <hr class="my-4" />  <!-- metinlerin altındaki arakesme xetti sonuncuda olmasin-->
            @endif
        @endforeach
    @else
        <div class="alert alert-danger text-center">
            <b>Bu kategoriyaya ait bir qeyd bulunamadı!</b>
        </div>
    @endif
</div>

@include('front.widget.categorywidget') <!-- Bu sahədə kategori cədvəlini istədiyimiz yerdə çağıra bilərik-->


@endsection
