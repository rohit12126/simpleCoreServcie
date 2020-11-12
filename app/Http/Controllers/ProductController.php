<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**  
     * The App Services
     *  
     * @var App\Services\ProductService  
     */  
    protected $productService;

    /**  
     * Inject the ProductService 
     *  
     * @param App\Services\ProductService $productService 
     * @return void 
     */  
    public function __construct(ProductService $productService)  
    {  
        $this->productService = $productService;  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->index();
        return View('product.index', compact('products'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(ProductRequest $request)
    {
        $this->productService->create($request);
        return back()->with(['status'=>'Product created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = $this->productService->read($id);
        return view('edit', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productService->read($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = $this->productService->update($request, $request->id);
        return redirect('product')->with('status', 'Product has been updated succesfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productService->delete($id);
        return back()->with(['status'=>'Deleted successfully']);
    }
}
