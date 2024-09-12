@extends('back.layouts.dizayn')

@section('title','Silinən məqalələr')

@section('trashed')


<!-- DataTales Example -->
@if(session('message'))
  <div class="alert alert-success text-center" role="alert">
    <strong>{{session('message')}}</strong>
  </div>
@endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>{{$Articles->count()}} məqalə var!</strong>
                <a href="{{route('meqaleler.index')}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-arrow-left"></i> Geriyə
                </a>
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
                                <a href="{{route('hardDeleteArticle', $article->id)}}" class="btn btn-sm btn-danger" title="Sil"><i class="fa fa-trash"></i></a>
                                <a href="{{route('recoverArticle', $article->id)}}" class="btn btn-sm btn-primary" title="Qaytar"><i class="fa fa-reply"></i></a></td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
