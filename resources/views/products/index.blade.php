@extends('layouts.app')

@section('content')
<div class="container">
<div class="card">
  <div class="card-header ">
     <h2 class="me-auto">Products</h2>  
     <a class="btn btn-success ms-auto" href="{{ route('product.create') }}">Create Product</a>
  </div>
    <div class="card-body p-5">

              @if ($message = Session::get('status'))
                <div class="alert alert-success text-center">
                  <strong>  {{ $message}}</strong>
                </div>
              @endif

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->categories->category_name}}</td>
                    <td class="text-center">
                      <a href="{{ route('product.show', ['id'=>$product->id ]) }}" class="btn btn-info btn-sm">Edit</a>
                      <form method="POST" action="{{ route('product.destroy', ['id'=>$product->id]) }}" accept-charset="UTF-8" style="display:inline">
                                        
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"> Delete</button>
                      </form>
                    </td>
                  </tr>
                 @endforeach
                  
                </tbody>
          </table>

    </div>  
</div>
</div>

@endsection