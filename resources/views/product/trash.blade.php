<!-- to call the layout -->
@extends('layouts.akram') 


@section('content')
<div class="jumbotron container">
  <p>Trashed Products.</p>
    <a class="btn btn-primary btn-lg" href="{{route('products.index')}}" role="button">Home</a>
</div>
<div class="container">
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col" style="width: 400px">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i=0;
        @endphp
        @foreach ($products as $item)
        <tr>
        <th scope="row">{{++$i}}</th>
        <td>{{$item->name}}</td>
        <td> RM {{$item->price}}</td>
        <td>
        <div class="row">

            <div class="col-sm">
                    <!-- update, show, delete, edit, all return id, so the route must has id -->
            <a class="btn btn-primary" href="{{route('product.back.from.trash', $item->id)}}">Back</a>
            </div>
            <div class="col-sm">
            <a class="btn btn-danger" href="{{route('product.delete.from.database', $item->id)}}">Delete</a>
            </div>
            
            
        </div> 
        </td>
        </tr>
        <tr>
        @endforeach
    </tbody>
    </table>
</div>

@endsection