<!-- to call the layout -->
<!-- show page is similar to create and edit page, but it does not need for form,
because we only need to show the data only  -->

@extends('layouts.akram') 


@section('content')

<!-- This is a card, I copy it from bootstrap inside card files -->
<div class="container" style="padding-top: 6%">
    <div class="card container" >
        <div class="card-body">
            <!-- span tag to make it in same line, the word back with Product name: -->
            <p class="card-text"><span><a href="{{route('products.index')}}">back</a></span>  Product page</p>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 2%">
   
  <div class="form-group">
    <label for="exampleFormControlInput1">Name : {{$product->name}}</label>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Price : {{$product->price}}</label>
  </div>
  
  <div class="form-group">
    {!! $product->detail !!}
    </textarea>
  </div>

</div>



@endsection