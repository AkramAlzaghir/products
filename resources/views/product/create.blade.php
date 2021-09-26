<!-- to call the layout -->
<!-- edit for show only -->

@extends('layouts.akram') 


@section('content')

<!-- this is a card, I copy it from bootstrap inside card files -->
<div class="container" style="padding-top: 6%">
    <div class="card container" >
        <div class="card-body">
            <p class="card-text"><span><a href="{{route('products.index')}}">back</a></span>  
            Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 2%">
    <form action="{{route('products.store')}}" method="POST">
        <!-- csrf protects from hacker and avoid error 419 PAGE EXPIRED-->
        @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <!-- All names inside the form that created in create.blade.php file
    must be exactly same as the name in store function -->
    <input type="text" name="name" class="form-control" placeholder="Product Name">
    @error('name')
    <!-- if enter too long text, please show a message
    the variable message is auto stored with the condition, 
    based on the condition, it will give an error massage text   -->
        <div style="color: red">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price</label>
    <input type="text" name="price" class="form-control"  placeholder="Product Price">
    @error('price')
    <!-- if enter too long text, please show a message
    the variable message is auto stored with the condition, 
    based on the condition, it will give an error massage text   -->
        <div style="color: red">{{ $message }}</div>
    @enderror
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Details</label>
    <textarea class="form-control" name="detail" rows="3"></textarea>
    @error('detail')
    <!-- if enter too long text, please show a message
    the variable message is auto stored with the condition, 
    based on the condition, it will give an error massage text   -->
        <div style="color: red">{{ $message }}</div>
    @enderror
  </div>

  <div class="form-group">
  <button type="Submit" class="btn btn-primary">Save</button>
  </div>

</form>

</div>



@endsection