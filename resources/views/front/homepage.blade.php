@extends('front.layouts.dizayn')

@section('title','Ana səhifə')

@section('homepage')


<div class="col-md-10 col-lg-8 col-xl-7">
    @include('front.widget.articleslist')  <!-- Bu sahede articleslistdi(homepage(ana sehife)) istediyimiz yerde cagira bilerik-->
</div>

@include('front.widget.categorywidget') <!-- Bu sahede kategori cedvelini istediyimiz yerde cagira bilerik-->


@endsection

