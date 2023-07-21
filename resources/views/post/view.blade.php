@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>view</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    
    <h1 class="mt-4">{{ $data['title'] }}</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>tanggal:</strong> {{date('d/m/Y',strtotime($data['created_at']))}}</p>
            <p> {{ $data['content'] }}</p>
        </div>
    </div>
</div>

</body>
</html>
@endsection