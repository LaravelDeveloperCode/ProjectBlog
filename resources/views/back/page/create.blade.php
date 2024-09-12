@extends('back.layouts.dizayn')

@section('title','Səhifə yarat')

@section('create')


    <div class="card shadow mb-4">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        
        <form method="post" action="{{route('pageCreatePost')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Səhifə başlığı:</label>
                <input type="text" name="title" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>Səhifə fotorafı:</label>
                <input type="file" name="image" class="form-control" required><br>
            </div>
            <div class="form-group">
                <label>Səhifə mezmunu:</label>
                <textarea id="editor" name="content" class="form-control" required></textarea><br>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Yarat</button>
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