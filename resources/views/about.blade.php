@extends('layouts.customApp')

@section('content')
<div class="title m-b-md">
    About the First
</div>

<div class="links">
    <a href="/">Home</a>
    <a href="{{ route('list_products') }}">Products</a>
</div>

<main class="py-4">
  <p>This is a sample application to enable the creation, viewing, updating and deleting of products in a database.</p>
  <p>Guest users will be able to view the product list while basic users will be able to view the product details as well.</p>
  <p>Admin user will be able to create, view and update a product but not to delete it.</p>
  <p>Super admin will be able to create, update and delete products.</p>
  <p>Only users who have logged in can register new users in the system.</p>
</div>
@endsection
