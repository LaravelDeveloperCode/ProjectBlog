@extends('back.layouts.dizayn')

@section('title', $Articles->title.' məqaləni yenilə')

@section('create')


    <div class="card shadow mb-4">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <form method="post" action="{{route('meqaleler.update', $Articles->id)}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>Məqalə başlığı:</label>
                <input type="text" name="title" class="form-control" value="{{$Articles->title}}" required><br>
            </div>
            <div class="form-group">
            <label>Məqalə kategoriyası:</label>
                <select class="form-control" name="category" required>
                    <option value="">Seçin</option>
                    @foreach($Categories as $category)
                        <option @if($Articles->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Məqalə fotorafı:</label><br>
                <img src="{{asset($Articles->image)}}" class="img-thumbnail rounded" width="300"><br><br>
                <input type="file" name="image" class="form-control"><br>
            </div>
            <div class="form-group">
                <label>Məqalə mezmunu:</label>
                <textarea id="editor" name="content" class="form-control" required>{!! $Articles->content !!}</textarea><br>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Yenilə</button><br>
                <a href="{{route('meqaleler.index')}}"><button type="button"  class="btn btn-danger btn-lg btn-block">Imtina</button></a>
            </div>
        </form>
    </div>


@endsection


@section('css')
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#editor').summernote(
                {
                    'heigh':300
                }
            );
        });
    </script>
@endsection