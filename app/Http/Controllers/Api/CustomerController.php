<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreCustomerRequest;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
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
        $customers = Customer::paginate($request["per_page"]);

        return response()->json([
            'current_page' => $customers->currentPage(),
            'data' => $customers->items(),
                'total' => $customers->total(),
                'per_page' => $customers->perPage(),
                'current_page' => $customers->currentPage(),
                'last_page' => $customers->lastPage(),
                'from' => $customers->firstItem(),
                'to' => $customers->lastItem(),
        ]);
    }
    /**
     * 
     */
    public function create()
    {
        $response = Http::post('http://127.0.0.1:8000/convertedin/customers');
        return response()->json(['message' => 'Customer created successfully']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->all());
        $customer->save();
        return response()->json(['message' => 'Customer created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $customer = Customer::find($customer->id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Customer $customer, $id)
    {
        $response = Http::post('http://127.0.0.1:8000/convertedin/customers');
    
        $customer=Customer::findOrFail($id);
        if (!$customer){
            return response()->json([ "message"=> "customer not found"],404);
         }
        $customer->save();
        return response()->json(['message' => 'customer updated successfully', 'customer' => $customer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, $id)
    {
        $customer=Customer::findOrFail($id);
        if (!$customer){
            return response()->json([ "message"=> "customer not found"],404);
         }
        $customer->delete();
        $response = Http::post('http://127.0.0.1:8000/convertedin/customers');
    return response()->json(['message' => 'customer deleted successfully'], 200);
    }
}
