@extends('layouts.app')

@section('content')
<div class="container">
     <div class="card">
      <div class="card-header">
         <h2 class="me-auto">Create Your Product</h2>  
      </div>
      <div class="card-body p-5">

      @if ($message = Session::get('status'))
      <div class="alert alert-success text-center">
        <strong>  {{ $message}}</strong>
      </div>
    @endif


      <form action="{{ route('product.store') }}" method="post">
       {!! csrf_field() !!}
        <div class="form-group p-2">
          <label for="product_name">Product Name</label>
          <input type="text" class="form-control" id="product_name" aria-describedby="emailHelp" placeholder="Enter Product Name" name="product_name">
          @error('product_name')
                    <span class="" role="alert">
                        <small style="color:red"><strong>{{ $message }}</strong></small>
                    </span>
          @enderror
        </div>

        <div class="form-group p-2">
          <label for="exampleInputPassword1">Product Category</label>
          <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{  $category->category_name }}</option>
            @endforeach
          </select>
        </div>   

        <button type="submit" class="btn btn-primary m-2">Submit</button>
      </form>
      </div>
     </div>
</div>
@endsection