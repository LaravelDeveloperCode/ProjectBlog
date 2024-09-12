@extends('back.layouts.dizayn')

@section('title','Ayarlar')

@section('index')

@if(session('message'))
  <div class="alert alert-success text-center" role="alert">
    <strong>{{session('message')}}</strong>
  </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><strong> @yield('title')</strong></h6>
    </div>
    <div class="card-body">
        <form method="post" action="{{route('confingUpdate')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sayt başlığı</label>
                        <input type="text" name="title" class="form-control" required value="{{$Confing->title}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Saytın aktiflik durumu</label>
                        <select class="form-control" name="active">
                            <option @if($Confing->active==1) selected @endif value="1">Açıq</option>
                            <option @if($Confing->active==0) selected @endif value="0">Bağlı</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sayt logo</label>
                        <input type="file" name="logo" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sayt favicon</label>
                        <input type="file" name="favicon" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" name="facebook" class="form-control" required value="{{$Confing->facebook}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" name="twitter" class="form-control" required value="{{$Confing->twitter}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Github</label>
                        <input type="text" name="github" class="form-control" required value="{{$Confing->github}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>LinkIn</label>
                        <input type="text" name="linkedin" class="form-control" required value="{{$Confing->linkedin}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Youtube</label>
                        <input type="text" name="youtube" class="form-control" required value="{{$Confing->youtube}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" name="instagram" class="form-control" required value="{{$Confing->instagram}}"/>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-md btn-success">Yenilə</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
