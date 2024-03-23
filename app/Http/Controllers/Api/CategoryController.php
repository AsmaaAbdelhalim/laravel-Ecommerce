<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreCategoryRequest;
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
            return response()->json(['message' => 'Unauthorized'],404);
        }
        $categories = Category::paginate($request["per_page"]);

        return response()->json([
            'current_page' => $categories->currentPage(),
            'data' => $categories->items(),
            'pagination' => [
                'total' => $categories->total(),
                'per_page' => $categories->perPage(),
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'from' => $categories->firstItem(),
                'to' => $categories->lastItem(),
            ],
            ]);
    }       
     // $perPage = 
        // $request->has('per_page') ? $request->per_page : []
        // Default per_page value is 10
    //$categories = category::all();
        // $query = Category::query();
        // if ($request->has('per_page')){
        //     $per_page = $request->per_page;
        //     $categories = $query->paginate($per_page);
        // }
      
        // $pagination = self::pagination(Category::all());

        // $page = LengthAwarePaginator::resolveCurrentPage();
        // $perPage = 5;
        // $offset = ($page * $perPage) - $perPage;
        // $items = $categories->slice($offset, $perPage)->all();
        // $paginated = new LengthAwarePaginator($items, $categories->total(), $perPage, $page, [
        //     'path' => LengthAwarePaginator::resolveCurrentPath(),
        // ]);

        // $per_page = $request->per_page;
        // $categories = category::paginate($per_page);


        // $query = Category::query();

        // if ($s = $request->input('s')) {
        //     $query->where('title', 'regexp', "/.*$s/i")
        //         ->orWhere('description', 'regexp', "/.*$s/i");
        // }

        // if ($sort = $request->input('sort')) {
        //     $query->orderBy('price', $sort);
        // }

        // $perPage = 9;
        // $page = $request->input('page', 1);
        // $total = $query->count();

        // $result = $query->offset(($page - 1) * $perPage)->limit($perPage)->get();

        // return [
        //     'data' => $result,
        //     'total' => $total,
        //     'page' => $page,
        //     'last_page' => ceil($total / $perPage)
        // ];
        
        // $pagination = [
        //     'total' => $categories->total(),
        //     'current_page' => $categories->currentPage(),
        //     'per_page' => $categories->perPage(),
        //     'last_page' => $categories->lastPage(),
        //     'from' => $categories->firstItem(),
        //     'to' => $categories->lastItem(),
        // ];

        // return response()->json([
        //     'categories' => $categories->items(),
        //     'pagination' => $pagination,
        // ]);
    private static function pagination(
        $categories,
        $perPage = 3
       
    ){
        $page = (int)request('page');
        $start = ($page == 1) ? 0 : ($page - 1) * $perPage;
        $total = $categories->count();
        $pages_count = ceil($total / $perPage);
        $paginated = $categories->slice($start, $perPage);
        return [
            'total' => $total,
            'current_page' => $page,
            'per_page' => $perPage,
            'last_page' => $pages_count,
            'from' => $start + 1,
            'to' => $start + $perPage,
            'items' => $paginated,
        ];
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        //
    }
      
}
