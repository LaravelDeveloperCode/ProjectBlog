@extends('back.layouts.dizayn')

@section('title','Bütün məqalələr')

@section('index')


<!-- DataTales Example -->
@if(session('message'))
  <div class="alert alert-success text-center" role="alert">
    <strong>{{session('message')}}</strong>
  </div>
@endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$Articles->count()}} məqalə var!</strong>
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
                            <th>Kategoriya</th>
                            <th>Baxış</th>
                            <th>Yaradılıma tarixi</th>
                            <th>Durum</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Articles as $article)
                        <tr>
                            <td><img src="{{ asset($article->image) }}" width="200" height="120"></td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->getCategory->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>
                            <td>
                                @if($article->status == 0)
                                    <a href="{{ route('active', $article->id) }}" title="Aktif Et">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-check-circle"></i> 
                                        </button>
                                    </a>
                                  @else
                                    <a href="{{ route('passive', $article->id) }}" title="Pasif Et">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fa fa-times-circle"></i> 
                                        </button>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a target="_blank" href="{{route('single',[$article->getCategory->slug, $article->slug])}}" class="btn btn-sm btn-primary" title="Göstər"><i class="fa fa-eye"></i></a>
                                <a href="{{route('meqaleler.edit', $article->id)}}" class="btn btn-sm btn-success" title="Yenilə"><i class="fa fa-refresh"></i></a>
                                <a href="{{route('deleteArticle', $article->id)}}" class="btn btn-sm btn-danger" title="Sil"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
