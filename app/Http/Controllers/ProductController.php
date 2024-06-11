<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $user = Auth::user();

        $user_wishlist_ids = [];
        if($user){
        //$user_wishlist_ids = $user->wishlists()->pluck('course_id')->all();
    }
        //dd($user_wishlist_ids);
        $categories = Category::with('product')->get();
        $products = Product::all()->sortByDesc('created_at');
        $products = Product::latest()->paginate(12);
        return view('product.index',compact(['products','categories' , 'user_wishlist_ids']));

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $productsInSameCategory = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id) 
        ->paginate(12); 
            
        return view('product.show', compact(['categories', 'product','productsInSameCategory']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function cart()
    {
        return view('product.cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
  
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->title,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
  
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }
  
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
}
