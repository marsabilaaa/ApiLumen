@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>view</title>
</head>
<body>

<div class="container">
    <center>
    <h1 class="mt-4">{{ $data['title'] }}</h1>
    <p><strong>tanggal:</strong> {{date('d/m/Y',strtotime($data['created_at']))}}</p>
    </center>
    <div class="card">
        <div class="card-body">
            <p> {{ $data['content'] }}</p>
        </div>
    </div>
</div>

</body>
</html>
@endsection