<!-- to call the layout -->
<!-- edit page is similar to create page -->
<!-- edit for show only -->
@extends('layouts.akram') 


@section('content')

<!-- This is a card, I copy it from bootstrap inside card files -->
<div class="container" style="padding-top: 6%">
    <div class="card" >
        <div class="card-body">
            <!-- span tag to make it in same line, the word back with Product name: -->
            <p class="card-text"> <span><a href="{{route('products.index')}}">back</a></span>  Product name: {{$product->name}}</p>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 2%">
    <!-- update, show, delete, edit, all return id, so the route must has id -->
    <form action="{{route('products.update', $product->id)}}" method="POST">
        <!-- csrf protects from hacker and avoid error 419 PAGE EXPIRED-->
        @csrf
        @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <!-- All names inside the form that created in create.blade.php file
    must be exactly same as the name in store function -->
    <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Product Name">
    @error('name')
    <!-- if enter invalid name, please show a message
    the variable message is auto stored with the condition, 
    based on the condition, it will give an error massage text   -->
        <div style="color: red">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input type="text" name="price" value="{{$product->price}}" class="form-control"  placeholder="Product Price">
    @error('price')
    <!-- if enter invalid price, please show a message
    the variable message is auto stored with the condition, 
    based on the condition, it will give an error massage text   -->
        <div style="color: red">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Details</label>
    <!-- !! is to allow the html tag to be printed, sometime it includes color, bold, etc -->
    <textarea class="form-control" name="detail" rows="3">
    {!! $product->detail !!}
    </textarea>
    @error('detail')
    <!-- if enter too long text, please show a message
    the variable message is auto stored with the condition, 
    based on the condition, it will give an error massage text   -->
        <div style="color: red">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
  <button type="Submit" class="btn btn-primary">Update</button>
  </div>

</form>

</div>



@endsection