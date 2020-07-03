@extends('layouts.customApp')

@section('content')
<div class="title m-b-md">
    Products and services
</div>

<div class="links">
    <a href="/">Home</a>
    <a href="{{ route('about') }}">About</a>
</div>

<table id='productsTable' width="100%">
  <thead>
    <tr><td colspan="8">
      <a href="{{ route('new_product') }}" class="btn btn-success active" role="button" aria-pressed="true">Add New Item</a>
    </td></tr>
    <tr>
    <th hidden>#</th>
    <th>Item Code</th>
    <th width="25%">Item Category</th>
    <th width="30%">Item Description</th>
    <th>Min. Order<br/>Qty</th>
    <th>Unit Price</th>
    <th width="85px">&nbsp;</th>
    <th width="85px">&nbsp;</th>
  </tr></thead>
  @foreach($products as $product)
    <tbody><tr>
      <td hidden>{{ $product->id }}</td>
      <td>{{ $product->code }}</td>
      <td>{{ $product->category }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->min_qty }}</td>
      <td>{{ $product->amount }}</td>
      <td>
        <!-- Product Edit Button -->
        <a href="/products/{{ $product->id }}/edit" class="btn btn-info btn-sm active" role="button" aria-pressed="true">Edit</a>
      </td>
      <td>
      <!-- Product Delete Button -->
      <form action="/products/{{ $product->id }}/delete" method="POST">
        {{ csrf_field() }}
        {{ method_field('delete') }}

        <button type="submit" onclick="return confirm('Are you sure you want to delete the product: {{ $product->description }} ({{ $product->code }})?')"  width="100px" class="btn btn-secondary btn-sm btn-danger">Delete</button>
      </form>
      </td>
    </tr></tbody>
  @endforeach
</table>
@endsection
