@extends('back.layouts.dizayn')

@section('title','Bütün kategoriyalar')

@section('indexCategory')


@isset($CatDeleteId)
  <div class="alert alert-warning text-center" role="alert">
    <strong>Kategoriyanı silməyə əminsizmi?</strong>
  </div>
  <div class="text-center">
  <a href="{{route('catDelete2',$CatDeleteId)}}">
    <button class="btn btn-success" title="Hə">
      <i class="fa fa-check-circle f-14"></i> <!-- Font Awesome İkonu -->
    </button>
  </a>
  <a href="{{route('categoryIndex')}}">
    <button class="btn btn-danger" title="Yox">
      <i class="fa fa-times-circle f-14"></i> <!-- Font Awesome İkonu -->
    </button>
  </a>
</div><br>
@endisset


@if(session('message1'))
  <div class="alert alert-success text-center" role="alert">
    <strong>{{session('message1')}}</strong>
  </div>
@endif

@if(session('message2'))
  <div class="alert alert-danger text-center" role="alert">
    <strong>{{session('message2')}}</strong>
  </div>
@endif


@isset($CatEditData)
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <!-- Kategori Formu -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Yenilə</h6>
                </div>
                <div class="card-body">
                <form action="{{route('catUpdate')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="categoryName">Kategoriya adı:</label>
                        <input type="hidden" name="id" value="{{$CatEditData->id}}">
                        <input type="text" class="form-control" id="categoryName" name="name" value="{{$CatEditData->name}}" required>
                    </div>
                    <button class="btn btn-success">Yenilə</button>
                    <button type="button" class="btn btn-danger" onclick="cancelForm()">İmtina</button>
                </form>
                <script>
                    function cancelForm() {
                        window.location.href = '{{ route('categoryIndex') }}';
                    }
                </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endisset



<div class="row">
    @empty($CatEditData)
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 front-weight-bold text-primary">Yeni Kategoriya yarat</h6>
                </div>
                <form method="post" action="{{route('adminCategoryCreate')}}">
                    @csrf
                    <div class="card-body">
                        <label>Kategoriya adı:</label>
                        <input type="text" name="category" class="form-control" required />
                    </div>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary btn-block">Göndər</button>
                    </div>
                </form>
            </div>
        </div>
    @endempty
    
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 front-weight-bold text-primary">@yield('title')</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kategoriya adı</th>
                                <th>Məqalə sayısı</th>
                                <th>Durum</th>
                                <th>Əməliyyatlar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->ArticleCount()}}</td>
                                <td>
                                    @if($category->status == 0)
                                        <a href="{{ route('catActive', $category->id) }}" title="Aktif Et">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-check-circle"></i></button>
                                        </a>
                                    @else
                                        <a href="{{ route('catPassive', $category->id) }}" title="Pasif Et">
                                            <button class="btn btn-success btn-sm"><i class="fa fa-times-circle"></i></button>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('catEdit', $category->id)}}" class="btn btn-sm btn-success" title="Yenilə"><i class="fa fa-refresh"></i></a>
                                    <a href="{{route('catDelete', $category->id)}}" class="btn btn-sm btn-danger" title="Sil"><i class="fa fa-trash"></i></a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
