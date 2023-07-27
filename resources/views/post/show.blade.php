@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Post</title>
    <style>
        .thumbnail {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .card {
            width: 100%; 
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- membuat jumbotron -->
    <div class="jumbotron">
        <center>
            <h2>Daily Post</h2>
            <p>...</p><br/><br/>
        </center>
    </div>
    <!-- akhir jumbotron -->

    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <div class="row">
                @foreach($data as $item)
                    <div class="card" >
                        <div class="card-body">

                            <h3>{{$item['title']}}</h3>
                            <p>{{ substr($item['content'], 0, 100) . (strlen($item['content']) > 100 ? '...' : '') }}</p>
                            <p><a href="{{ route('post.view', $item['id']) }}" class="btn btn-primary" role="button">Lihat</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


</div>
<br/>


<div class="clearfix"></div>

{{-- <nav class="navbar navbar-default" style="bottom: 0;margin: 0">
    <div class="container">    
        <center>

        {{-- <ul class="nav navbar-nav">
            <li><a href="#">Copyright @ 2015 Malas Ngoding. All rights reserved.</a></li>                
        </ul> --}}
{{--  
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Develop by www.malasngoding.com</a></li>                                    
        </ul>
        </center>        
    </div>
</nav> --}} 

</body>
</html>
@endsection
