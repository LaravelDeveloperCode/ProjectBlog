@extends('back.layouts.dizayn')

@section('title','Bütün məqalələr')

@section('index')


<!-- DataTales Example -->
@isset($PagesDel_id)
    <div class="alert alert-warning text-center" role="alert">
        <strong>Səhifəni silməyə əminsizmi?</strong>
    </div>
    <div class="text-center">
        <a href="{{route('pagDelete2',$PagesDel_id)}}">
            <button class="btn btn-success" title="Hə">
            <i class="fa fa-check-circle f-14"></i>
            </button>
        </a>
        <a href="{{route('pageIndex')}}">
            <button class="btn btn-danger" title="Yox">
            <i class="fa fa-times-circle f-14"></i>
            </button>
        </a>
    </div><br>
@endisset

@if(session('message'))
  <div class="alert alert-success text-center" role="alert">
    <strong>{{session('message')}}</strong>
  </div>
@endif


@isset($PagesEdit_id)
    <div class="card shadow mb-4">
        <form method="post" action="{{route('pagUpdate')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Səhifə başlığı:</label>
                <input type="hidden" name="id" value="{{$PagesEdit_id->id}}">
                <input type="text" name="title" class="form-control" value="{{$PagesEdit_id->title}}"><br>
            </div>
            <div class="form-group">
                <label>Səhifə fotorafı:</label><br>
                <img style="height:100px; width:auto;" src="{{url($PagesEdit_id->image)}}"><br><br>
                <input type="file" name="image" class="form-control" value="{{$PagesEdit_id->image}}"><br>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Yenilə</button><br>
                <a href="{{route('pageIndex')}}"><button type="button"  class="btn btn-danger btn-lg btn-block">Imtina</button></a>
            </div>
        </form>
    </div>
@endisset


@empty($PagesEdit_id)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$Pages->count()}} məqalə var!</strong>
                <a href="{{route('trashedArticle')}}" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i> Silinən məqalələr</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>foto</th>
                            <th>Məqalə başlığı</th>
                            <th>Durum</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Pages as $page)
                        <tr>
                            <td><img src="{{ asset($page->image) }}" width="200" height="120"></td>
                            <td>{{$page->title}}</td>
                            <td>
                                @if($page->status == 0)
                                    <a href="{{ route('pagActive', $page->id) }}" title="Aktif Et">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-check-circle"></i> 
                                        </button>
                                    </a>
                                  @else
                                    <a href="{{ route('pagPassive', $page->id) }}" title="Pasif Et">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-times-circle"></i> 
                                        </button>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a target="_blank" href="{{route('pages',$page->slug)}}" class="btn btn-sm btn-primary" title="Göstər"><i class="fa fa-eye"></i></a>
                                <a href="{{route('pagEdit', $page->id)}}" class="btn btn-sm btn-success" title="Yenilə"><i class="fa fa-refresh"></i></a>
                                <a href="{{route('pagDelete', $page->id)}}" class="btn btn-sm btn-danger" title="Sil"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endempty

@endsection
