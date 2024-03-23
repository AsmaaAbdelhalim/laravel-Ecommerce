<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Config;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
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
        $orders = Order::with(['customer','line_item'])->paginate($request["per_page"]);

        return response()->json([
            'current_page' => $orders->currentPage(),
            //'data' => $orders->items(),
            $formattedOrders = $orders->map(function ($order) {
                return [
                    'id' => $order->id,
                    'contact_email' => $order->contact_email,
                    'ordered_at' => $order->ordered_at,
                    'financial_status' => $order->financial_status,
                    'total_price' => $order->total_price,
                    'total_price_usd' => $order->total_price_usd,
                    'subtotal_price' => $order->subtotal_price,
                    'total_tax' => $order->total_tax,
                    'taxes_included' => $order->taxes_included,
                    'total_discounts' => $order->total_discounts,
                    'total_line_items_price_set' => $order->total_line_items_price_set,
                    'total_weight' => $order->total_weight,
                    'total_tip_received' => $order->total_tip_received,
                    //'billing_address' => $order->billing_address,
                    'currency' => $order->currency,
                    'country_code' => $order->country_code,
                    'customer_locale' => $order->customer_locale ,
                    'closed_at' => $order->closed_at,
                    'confirmed' => $order->confirmed,
                    'discount_codes' => $order->discount_codes,
                    'payment_gateway_names' => $order->payment_gateway_names,
                    'phone' => $order->phone,
                    'presentment_currency' => $order->presentment_currency,
                    'processed_at' => $order->processed_at,
                    'processing_method' => $order->processing_method,
                    'reference' => $order->reference,
                    'referring_site' => $order->referring_site,
                    'source_identifier' => $order->source_identifier,
                    'source_name' => $order->source_name,
                    'source_url' => $order->source_url,
                    'tags' => $order->tags,

                    //'created_at' => $order->created_at,

                    'customer' => [
                        'id' => $order->customer->id,
                        'email' => $order->customer->email,
                        'first_name' => $order->customer->first_name,
                        'last_name' => $order->customer->last_name,
                        'orders_count' => $order->customer->orders_count,
                        'state' => $order->customer->state,
                        'total_spent' => $order->customer->total_spent,
                        'last_order_id' => $order->customer->last_order_id,
                        'verified_email' => $order->customer->verified_email,
                        'phone' => $order->customer->phone,
                        'last_order_name' => $order->customer->last_order_name,
                        'currency' => $order->customer->currency,
                        'addresses' => $order->customer->addresses,
                        'default_address' => $order->customer->default_address,
                        'registered_at' => $order->customer->registered_at,
                        'gender' => $order->customer->gender,
                        
                    ],
                   

                    'line_items' =>
                         [
                        'id' => $order->line_item->id,
                        'fulfillable_quantity' => $order->line_item->fulfillable_quantity,
                        'fulfillment_status' =>  $order->line_item->fulfillment_status,
                        'name' => $order->line_item->name,
                        'price' => $order->line_item->price,
                         
                        'product_exists' => $order->line_item->product_exists,
                        //'product' => $order->line_item->product,
                        'product_id'  => $order->line_item->product_id,
                        'quantity'  => $order->line_item->quantity,
                        'title'    => $order->line_item->title,
                        //'image' => $order->line_item->image,
        
                        'total_discount' => $order->line_item->total_discount,
                        'variant_id' => $order->line_item->variant_id,
                        'variant_title' => $order->line_item->variant_title,
                        'vendor' => $order->line_item->vendor,
                         ],
                   

               
                ];
        
                }),

            'pagination' => [
                'total' => $orders->total(),
                'per_page' => $orders->perPage(),
                'current_page' => $orders->currentPage(),
                'last_page' => $orders->lastPage(),
                'from' => $orders->firstItem(),
                'to' => $orders->lastItem(),
            ],


        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());
        $order->save();
        return response()->json(['message' => 'Order created successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = Order::find($order->id);
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
