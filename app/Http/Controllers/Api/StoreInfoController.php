<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StoreInfo;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Config;

use App\Http\Requests\StoreStoreInfoRequest;



class StoreInfoController extends Controller
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
        $storeInfo = StoreInfo::paginate($request["per_page"]);   
        return response()->json([
            'code' => 200 ,
            'current_page' => $storeInfo->currentPage(),
            'data' => $storeInfo->items(),
       
            'pagination' => [
            'total' => $storeInfo->total(),
            'current_page' => $storeInfo->currentPage(),
            'per_page' => $storeInfo->perPage(),
            'last_page' => $storeInfo->lastPage(),
            'from' => $storeInfo->firstItem(),
            'to' => $storeInfo->lastItem(),
           ],
             ]);
            return response()->json(['message' => 'StoreInfo created successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreInfoRequest $request)
    {
        $storeInfo = StoreInfo::create($request->all());
        $storeInfo->save();
        return response()->json(['message' => 'StoreInfo created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(StoreInfo $storeInfo)
    {
        $storeInfo = StoreInfo::find($storeInfo->id);
        return response()->json($storeInfo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StoreInfo $storeInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreInfo $storeInfo)
    {
        //
    }
}
