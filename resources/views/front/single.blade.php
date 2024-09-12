@extends('front.layouts.dizayn')

@section('title',$Article->title)
@section('image',$Article->image) <!-- postlara daxil olduqda yuxaridaki foto yerine postun sheklinin gelmeyi ucundur-->

@section('single')
<!-- Post Content-->
<div class="position-relative">
    <div class="category-widget-container">
        @include('front.widget.categorywidget')
    </div>
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <p>{!!$Article->content!!}</p>  <!--Buradaki !! işaretleri, içeriğin "safe" yani güvenli olarak değerlendirildiğini ve HTML etiketlerinin işlenmesini sağlar. Bu, kullanıcıdan gelen veya dinamik olarak oluşturulmuş HTML içeriğini doğrudan görüntülemek için kullanılır.-->
            <span class="text-primary">Oxunma sayısı : <b>{{$Article->hit}}</b></span>
        </div>
    </div>
</div>

<!-- Footer-->
@endsection
