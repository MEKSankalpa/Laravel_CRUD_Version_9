@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Find Products') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        <form action="saveTask" method="POST">
                            {{ csrf_field() }}
                            <select class="form-select form-select-sm mb-3" name="category" id="filter_porducts">
                                <option selected="selected" disabled>Select number id</option>
                                @foreach($filter as $item)
                                    <option value="{{$item->category}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                            <input class="form-control" type="text" name="product" placeholder="Enter the product name"/></br>
                            
                            <Button type="submit" class="btn btn-success"><i class="fa fa-eye " aria-hidden="true"></i> ADD PRODUCTS HERE</Button>

                        </form>
                        <br>
                        <br>
                    </div>   
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Categoty</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->product }}</td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    
                                    <a href="{{ url('/edit/' . $item->id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                    <form method="POST" action="{{url('/home/'.$item->id.'/delete/')}}" accept-charset="UTF-8" style="display:inline">
                                        
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
