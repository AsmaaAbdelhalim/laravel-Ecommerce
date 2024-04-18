<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

use  Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreProductRequest;
use App\Events\ProductEvent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $envToken = Config::get('app.API_TOKEN');
        $providedToken = $request['token'];
        if ($providedToken !== $envToken){
            return response()->json(['message' => 'Unauthorized'],404);
        }
        $products = Product::with( ["images" => function($query){$query->orderBy("id");},
                    ])->paginate($request["per_page"]);
        return response()->json([
            'current_page' => $products->currentPage(),
            'data' => $products->items(),
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem(),
        
        ]);
    }

    public function create(Request $request)
    {
        $response = Http::post('https://app.converted.in/api/webhooks/api/products/create', $request->all());
        if ($response->successful()) {
            return response()->json(['message' => 'Product created successfully']);
        } else {
            return response()->json(['error' => 'Failed to create product'], $response->status());
        }
        //$response = Http::post('https://app.converted.in/api/webhooks/api/products/create');
        //return response()->json(['message' => 'Product created successfully']);
    }

    /** 
     * Store a newly created resource in storage.
     */ 
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->save();
        return response()->json(['message' => 'Product created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, $id)
    {
        $product=Product::findOrFail($id);
        if (!$product){
            return response()->json([ "message"=> "product not found"],404);
         }
        $product->save();
        $response = Http::post('https://app.converted.in/api/webhooks/api/products/update');
        return response()->json(['message' => 'product updated successfully', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product=Product::findOrFail($id);
        if (!$product){
            return response()->json([ "message"=> "product not found"],404);
         }
        $product->delete();
        $response = Http::post($response = Http::post('https://app.converted.in/api/webhooks/api/products/delete'));
    return response()->json(['message' => 'product deleted successfully'], 200);

    }
}