@extends('layouts.customApp')

@section('content')
<div class="title m-b-md">
    Edit Product
</div>
<!-- new product form -->
<div style="width:100%; margin-left: auto; margin-right: auto;">
  <form action="/products/{{ $product->id }}/update" method="POST">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="form-group">
      <label for="code" class="col-form-label">Code:</label>
      <input type="text" class="form-control" value="{{ $product->code }}" name="code" required>
    </div>
    <div class="form-group">
      <label for="category" class="col-form-label"><b>Category:</b></label>
      <select name="category" class="form-control">
        <option  value="{{ $product->category }}" selected>{{ $product->category }}</option>
        <option value="DESIGN CONCEPTS DEVELOPMENT">DESIGN CONCEPTS DEVELOPMENT</option>
        <option value="OFFICE BRANDING AND PARTITIONING">OFFICE BRANDING & PARTITIONING</option>
        <option value="VEHICLE BRANDING">VEHICLE BRANDING</option>
        <option value="SOCIAL MEDIA MANAGEMENT">SOCIAL MEDIA MANAGEMENT</option>
        <option value="SIGNAGE BRANDING">SIGNAGE BRANDING</option>
        <option value="WALL BRANDING AND PAINTING">WALL BRANDING &amp; PAINTING</option>
        <option value="CORPORATE AND PROMOTIONAL PRODUCTS">CORPORATE &amp; PROMOTIONAL PRODUCTS</option>
        <option value="ARCHITECTURE DRAWING">ARCHITECTURE DRAWING</option>
      </select>
    </div>
    <div class="form-group">
      <label for="description" class="col-form-label"><b>Description:</b></label>
      <input type="text" placeholder="Enter Item Description" class="form-control" value="{{ $product->description }}" name="description" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="min_qty" class="col-form-label"><b>Minimum Qty:</b></label><br/>
        <input type="number" placeholder="Enter Minimum Order Quantity" class="form-control" value="{{ $product->min_qty }}" name="min_qty">
      </div>
      <div class="form-group col-md-6">
        <label for="cost" class="col-form-label"><b>Unit Price:</b></label><br/>
        <input type="number" placeholder="Enter Unit Price" class="form-control" value="{{ $product->amount }}" name="cost">
      </div>
    </div>

    <div class="form-group">
      <a href="{{ route('list_products') }}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
      <button type="submit" class="btn btn-info">Update</button>
    </div>
  </form>
</div>
<!-- end of new product form -->
@endsection
