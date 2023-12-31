@extends('layouts.app')
@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post</title>
 
</head>

<body class="bg-light">
    <main class="container">
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>
                    {{$item}}
                </li>
                @endforeach
            </ul>

        </div>
          @endif

          @if (session()->has('success'))
          <div class="alert alert-success">
            {{session('success')}}
        </div>
          @endif
        <form action='' method='post'>
                @csrf

                @if(Route::current()->uri == "post/{id}")
                @method('put')
                @endif

                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='title' id="title" 
                        value="{{ isset($data ['title'])?$data['title']:old('title')}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Isi konten</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name='content' id="content"> {{ isset($data ['content'])?$data['content']:old('content')}}</textarea>
                    </div>
                </div>
                
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->
        @if (Route::current()->uri == 'post')
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Judul</th>
                        <th class="col-md-3">Konten</th>
                        <th class="col-md-2">Tgl Publikasi</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{$item['title']}}</td>
                        <td>{{ substr($item['content'], 0, 70) . (strlen($item['content']) > 70 ? '...' : '') }}</td>
                        <td>{{date('d/m/Y',strtotime($item['created_at']))}}</td>
                        <td>
                            <a href="{{ route('post.view', $item['id'] ) }}" class="btn btn-success btn-sm">View</a>
                            <a href="{{url('post/'. $item['id'])}}" class="btn btn-warning btn-sm">Edit</a>
                           
                            @can('delete posts', Post::class)
                            <form action="{{url('post/'. $item['id'])}}" method="post" onsubmit="return confirm 
                            ('Apakah yakin akan melakukan pengahapusan data')"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            @endcan
                            
                        </td>

                    </tr>
                    <?php $i++ ?>
                    @endforeach
                        
                    
                </tbody>
            </table>

        </div>
        <!-- AKHIR DATA -->
        @endif        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>
@endsection