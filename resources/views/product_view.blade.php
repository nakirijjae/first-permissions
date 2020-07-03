@extends('layouts.customApp')

@section('content')
<div class="title m-b-md">
    View Product
</div>
<!-- new product form -->
<div style="width:100%; margin-left: auto; margin-right: auto;">
  <form>
    {{ csrf_field() }}
    <div class="form-group">
      <label for="code" class="col-form-label">Code:</label>
      <input type="text" class="form-control" name="code" value="{{ $product->code }}" disabled>
    </div>
    <div class="form-group">
      <label for="category" class="col-form-label">Code:</label>
      <input type="text" class="form-control" name="category" value="{{ $product->category }}" disabled>
    </div>
    <div class="form-group">
      <label for="description" class="col-form-label"><b>Description:</b></label>
      <input type="text" class="form-control" name="description" value="{{ $product->description }}" disabled>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="min_qty" class="col-form-label"><b>Minimum Qty:</b></label><br/>
        <input type="number" class="form-control" name="min_qty" value="{{ $product->min_qty }}" disabled>
      </div>
      <div class="form-group col-md-6">
        <label for="cost" class="col-form-label"><b>Unit Price:</b></label><br/>
        <input type="number" class="form-control" name="cost" value="{{ $product->amount }}" disabled>
      </div>
    </div>

    <div class="form-group">
      <a href="{{ route('list_products') }}" class="btn btn-secondary" role="button" aria-pressed="true">Go to Products</a>
    </div>
  </form>
</div>
<!-- end of new product form -->
@endsection
