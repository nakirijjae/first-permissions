@extends('layouts.customApp')

@section('content')
<div class="title m-b-md">
    The First
</div>

<div class="links">
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('list_products') }}">Products</a>
</div>
@endsection
