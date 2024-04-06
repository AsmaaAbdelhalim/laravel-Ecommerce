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



class StoreInfoController extends Controller
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
            return response()->json(['message' => 'Unauthorized'],401);
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

    public function create(Request $request)
    {
    event(new StoreInfoEvent('create', [$request->all()]));
    return response()->json(['message' => 'StoreInfo created successfully'], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreInfoRequest $request)
    {

        // event(new StoreInfo('create', [$request->all()]));
        //         $storeInfo->save();

        // //event(new  StoreInfo('store', $storeInfo));
        // return response()->json(['message' => 'StoreInfo created successfully'], 200);
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

     public function edit(StoreInfo $storeInfo, Request $request, $id)
     {
        //    $editedData = StoreInfo::find($id);
        //    $editedData->update($request->all());

        //    event(new StoreInfo('edit', $editedData));
        //    return response()->json([
        //        "old" => $request->input("_previous"),
        //        "new"=> $editedData
        //    ], 200);

           }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $storeInfo = StoreInfo::find($id);     
       // dd($storeInfo);
        StoreInfoEvent::dispatch('update', [$request->all()]);
            if (!$storeInfo){
                return response()->json([ "message"=> "storeInfo not found"],404);
             }  
        $storeInfo->save();
        return response()->json(['message' => 'storeInfo updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request, $id)
    {
        $storeInfo=StoreInfo::findOrFail($id);
        if (!$storeInfo){
            return response()->json([ "message"=> "storeInfo not found"],404);
         }
        $storeInfo->delete();
        event(new StoreInfo($request->all()));
    return response()->json(['message' => 'StoreInfo deleted successfully']);
    }
}
