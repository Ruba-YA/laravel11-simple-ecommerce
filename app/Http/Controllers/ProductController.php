<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $products;
    public function __construct() {
        $this->products = new Product();
    }


    public function index()
    {
       $products = $this->products->all();
        $categories = Category::pluck('name' , 'id');
        return view('pages.product.index' , compact('products' , 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=> 'required',
            'cat_id'=>'required',
            'description'=>'required',
            'price'=>'required',
            'photo'=> 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if($request->hasFile('photo')){
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images') , $fileName);
            $validateData['photo'] = $fileName;
        }
        Product::create($validateData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
