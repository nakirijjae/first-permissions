@extends('layouts.customApp')

@section('content')
<div class="title m-b-md">
    Our products and services
</div>

<div class="links">
    <a href="/">Home</a>
    <a href="{{ route('about') }}">About</a>
</div>

<p>&nbsp;</p>

<table id='productsTable' width="100%">
  <thead>
    <tr>
    <th hidden>#</th>
    <th>Item Code</th>
    <th width="40%">Item Category</th>
    <th width="40%">Item Description</th>
    <th width="85px">&nbsp;</th>
  </tr></thead>
  @foreach($products as $product)
    <tbody><tr>
      <td hidden>{{ $product->id }}</td>
      <td>{{ $product->code }}</td>
      <td>{{ $product->category }}</td>
      <td>{{ $product->description }}</td>
      <td>
        <!-- Product Edit Button -->
        <a href="/products/{{ $product->id }}/view" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">View</a>
      </td>
    </tr></tbody>
  @endforeach
</table>
@endsection
