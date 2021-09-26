<?php

namespace App\Http\Controllers;

use App\Models\Supermarket;
use Illuminate\Http\Request;

class SupermarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //index is to show all data
    {
        //give me the latest product added
        //paginate(10) to show only 10 for each page
        // -> leads to
        $products = Supermarket::latest()->paginate(4); 
        //compact will send the data inside variable $product
        return view('product.index', compact('products'));
    }
    public function trashedProducts() //index is to show all data
    {
        //give me the latest product added
        //paginate(10) to show only 10 for each page
        // -> leads to
        //$products = Supermarket::withTrashed()->latest()->paginate(4); //show all products with inside trash too
        $products = Supermarket::onlyTrashed()->latest()->paginate(2); //show only products inside trash
        //compact will send the data inside variable $product
        return view('product.trash', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     //create like show, means it open/show the form to create new data, it is show file only
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // All names inside the form that created in create.blade.php file
    // must be exactly same as the name in store function
    public function store(Request $request)
    {
        //if the $request come, do a validation
        //validate() is a function and put inside it array
        $request->validate([
            'name'=>'required|alpha|max:255',
            'price'=>'required|numeric|min:1',
            'detail'=>'required|regex:/^[a-zA-Z\s\W]+$/|max:255'
        ]);
        //$product = mean all data that has been added, store/save inside the table
        $product = Supermarket::create($request->all()); 
        //products.index for direction, products follow the route name
        return redirect()->route('products.index')
        ->with('success','Product' . " ". $product->name . " " . 'has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    public function show(Supermarket $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    public function edit(Supermarket $product)
    {
        //edit like show, means we show the products and edit them, it is show file only
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supermarket $product)
    {
        //update is like store
        //if the $request come, do a validation
        //validate() is a function and take inside it array
        // -> leads to
        $request->validate([
            'name'=>'required|alpha|max:255',
            'price'=>'required|numeric|min:0|not_in:0',
            'detail'=>'required|regex:/^[a-zA-Z\s\W]+$/|max:255'
        ]);
        //$product = mean all data that has been added, store/save inside the table
         //$supermarket = new Supermarket();
         // -> leads to
         $product->update($request->all()); 
         return redirect()->route('products.index')
         ->with('success','Product ' . $product->name . ' has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supermarket  $supermarket
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(Supermarket $product)
    {
        $product->delete(); //delete is a function
      //products.index for direction, products follow the route name
        return redirect()->route('products.index')
        ->with('success','Product ' . $product->name . ' has been deleted successfully');
    }*/
    public function softDelete($id)
    {
        //go to model and the model will go to the db by using find function and choose the id for delete
        //$product= Supermarket::destroy($id);  //to do hard delete
        $product= Supermarket::findOrFail($id)->delete(); 
        //$product->delete(); //delete is a function
      //products.index for direction, products follow the route name
        return redirect()->route('products.index')
        ->with('success','The product has been successfully sent to trash');
    }
    public function deleteForever($id)
    {
        //go to model and the model will go to the db by using find function and choose the id for delete
        //$product= Supermarket::destroy($id);  //to do hard delete
        $product= Supermarket::onlyTrashed()->where('id', $id)->first()->forceDelete(); 
        //$product->delete(); //delete is a function
      //products.index for direction, products follow the route name
        return redirect()->route('product.trash')
        ->with('success','The product '. $product->name . ' has been successfully deleted from database ');
    }
    public function backFromTrash($id)
    {
        //go to model and the model will go trash to bring back the product id that
        // equal to the product id coming from the user, first means bring me one only, then restore it
        // it will work also without word first, means we can remove word first
        //$product= Supermarket::onlyTrashed()->restore(); //back all products from trash 
        $product= Supermarket::onlyTrashed()->where('id', $id)->first()->restore(); //back products one by one from trash 
        //products.index for direction, products should follow the route name
        return redirect()->route('products.index')
        ->with('success','The product has been successfully restored for use');
    }
}
