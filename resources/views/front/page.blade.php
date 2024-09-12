@extends('front.layouts.dizayn')

@section('title',$PagesList->title)
@section('image',$PagesList->image) 

@section('page')

<div class="col-md-10 col-lg-8 col-xl-7">
    <p>{!!$PagesList->content!!}</p>
</div>



@endsection
