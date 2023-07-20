@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<div class="card-header">{{ __('Dashboard') }}</div>
<div class="card-body">
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif
Ini adalah halaman Admin
<div class="my-3">
        <a href="{{ route('products.index') }}" class="btn btn-primary">Dashboard</a>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
