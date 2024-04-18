<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
//use Illuminate\pagination\LengthAwarePaginator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $envToken = Config::get('app.API_TOKEN');
        $providedToken = $request['token'];
        if ($providedToken !== $envToken){
            return response()->json(['message' => 'Unauthorized'],401);
        }
        $categories = Category::paginate($request["per_page"]);

        return response()->json([
            'current_page' => $categories->currentPage(),
            'data' => $categories->items(),
                'total' => $categories->total(),
                'per_page' => $categories->perPage(),
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'from' => $categories->firstItem(),
                'to' => $categories->lastItem(),
            ]);
    }    
    //
    public function create()
    {
        $response = Http::post('http://127.0.0.1:8000/convertedin/categories');
        return response()->json(['message' => 'Category created successfully']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //$category = Category::create($request->all());
        $category = Category::create($request->validated());

        // $category = new Category();
        // $category->taxonomy = $request->taxonomy;
        // $category->handle = $request->handle;
        // $category->title = $request->title;
        // $category->updated_at = $request->updated_at;
        // $category->content = $request->content;
        // $category->published_at = $request->published_at;
        // $category->available = $request->available;

        $category->save();
        return response()->json(['message' => 'Category created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = Category::find($category->id);
        return response()->json($category);
    }

    //
    public function edit(Category $category)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(category $category ,$id)
    {
        $response = Http::post('http://127.0.0.1:8000/convertedin/categories');
               $category=Category::findOrFail($id);
            if (!$category){
                return response()->json([ "message"=> "category not found"],404);
             }
        $category->save();
        return response()->json(['message' => 'Category updated successfully', 'category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category ,$id)
    {
            $category=Category::findOrFail($id);
            if (!$category){
                return response()->json([ "message"=> "category not found"],404);
             }
            $category->delete();
            $response = Http::post('http://127.0.0.1:8000/convertedin/categories');

        return response()->json(['message' => 'Category deleted successfully'], 200);

    }
      
}
