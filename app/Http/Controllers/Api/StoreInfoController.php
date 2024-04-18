<?php

namespace App\Http\Controllers\Api;
use App\Events\StoreInfoEvent;
use App\Observers\StoreInfoObserver;

use App\Http\Controllers\Controller;
use App\Models\StoreInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\StoreStoreInfoRequest;
use Illuminate\Support\Facades\Http;

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
            return response()->json(['message' => 'Unauthorized'],401);
        }
        $storeInfo = StoreInfo::paginate($request["per_page"]);   
        return response()->json([
            'code' => 200 ,
            'current_page' => $storeInfo->currentPage(),
            'data' => $storeInfo->items()[0],

            'total' => $storeInfo->total(),
            'current_page' => $storeInfo->currentPage(),
            'per_page' => $storeInfo->perPage(),
            'last_page' => $storeInfo->lastPage(),
            'from' => $storeInfo->firstItem(),
            'to' => $storeInfo->lastItem(),
             ]);
            return response()->json(['message' => 'StoreInfo created successfully'], 200);
    }

    public function create(Request $request)
    {
    return response()->json(['message' => 'StoreInfo created successfully'], 201);
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
     * 
     */

     public function edit(StoreInfo $storeInfo)
     {
        //
     }
    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $storeInfo = StoreInfo::find($id);     
            if (!$storeInfo){
                return response()->json([ "message"=> "storeInfo not found"],404);
             }  
        $storeInfo->save();
        return response()->json(['message' => 'storeInfo updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $storeInfo=StoreInfo::findOrFail($id);
        if (!$storeInfo){
            return response()->json([ "message"=> "storeInfo not found"],404);
         }
        $storeInfo->delete();
        $response = Http::post('http://127.0.0.1:8000/convertedin/storeinfo');
    return response()->json(['message' => 'StoreInfo deleted successfully']);
    }
}
