<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreProductRequest;
use App\Events\ProductCreated;

use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{

    protected $logger;

    public function __construct(Log $logger)
    {
        $this->logger = $logger;
    }
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
            //'data' => $products->items(),


            $formattedProducts = $products->map(function ($product) {

                return [
                    'id' => $product->id,
                    'title' => $product->title,
                    'image' => $product->image,
                    'type' => $product->type,
                    'vendor' => $product->vendor,
                    'handle' => $product->handle,
                    'owner' => $product->owner,
                    'compare_at_price' => $product->compare_at_price,
                    'price' => $product->price,
                    'stock_status' => $product->stock_status,
                    'quantity' => $product->quantity,
                    'published_at' => $product->published_at,
                    'tags' => $product->tags,
                    'full_permalink' => $product->full_permalink,
                    'content' => $product->content,
                    'meta' => $product->meta,
                    'category_id' => $product->category_id,

                'images' => [
                   'path' => $product->images->path,
                   'width' => $product->images->width,
                   'height' => $product->images->height,
                ],
                ];
            }),           


     
            'pagination' => [
                'total' => $products->total(),
                'per_page' => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem(),
            ],
        ]);
    }

    public function create(Request $request)
    {
        //event(new ProductCreated($request->all()));
        return response()->json(['message' => 'Product created successfully']);
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
    public function update(Request $request, Product $product, $id)
    {
        //event(new ProductCreated($request->all()));        
        $product=Product::findOrFail($id);
        if (!$product){
            return response()->json([ "message"=> "product not found"],404);
         }
    $product->save();
    return response()->json(['message' => 'product updated successfully', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request,Product $product, $id)
    {
        $product=Product::findOrFail($id);
        if (!$product){
            return response()->json([ "message"=> "product not found"],404);
         }
        $product->delete();
    return response()->json(['message' => 'product deleted successfully'], 200);

    }
}
