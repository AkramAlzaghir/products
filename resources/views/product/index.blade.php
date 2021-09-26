<!-- to call the layout -->
@extends('layouts.akram') 


@section('content')
<div class="jumbotron container">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">Create</a>
    <a class="btn btn-primary btn-lg" href="{{route('product.trash')}}" role="button">Trash</a>
</div>
<!-- this alert we get it from bootstrap under name alert -->
<div class="container"> 
    <!-- message is session coming from controller, 
    so if the Session which come from controller contain a success, then show me $message -->
    @if ($message = Session::get('success'))
    <div class="alert alert-primary" role="alert">
      {{$message}}
</div>

    @endif
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
            <!-- sucess and primary for green and blue color button -->
            <a class="btn btn-success" href="{{route('products.edit', $item->id)}}">Edit</a>
            </div>
            <div class="col-sm">
            <a class="btn btn-primary" href="{{route('products.show', $item->id)}}">Show</a>
            </div>
            <div class="col-sm">
            <!-- warning for orange color button -->
            <a class="btn btn-warning" href="{{route('soft.delete', $item->id)}}">Trash</a>
            </div>
            {{-- <div class="col-sm">
            <form action="{{route('products.destroy', $item->id)}}", method="POST">
                <!-- csrf protects from hacker and avoid error 419 PAGE EXPIRED-->
                @csrf
                @method('DELETE')
                <!-- danger red color button -->
            <button Type="Submit" class="btn btn-danger">Delete</button>
            </form>
            </div> --}}
        </div> 
        </td>
        </tr>
        <tr>
        @endforeach
    </tbody>
    </table>
    {!! $products->links() !!}
</div>

@endsection