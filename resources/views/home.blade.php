@extends('layouts.app')

@section('content')
<div class="title m-b-md">
    {{ __('Welcome') }}<br/>{{ Auth::user()->name }}
</div>

<div class="links">
    <a href="{{ route('list_products') }}">Edit Products</a>
</div>
<p>&nbsp;</p>
<p>System Role: <u>{{ Auth::user()->user_role }}</u></p>
@endsection
