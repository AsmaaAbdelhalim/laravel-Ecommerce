<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function checkout($productId)

    {
        $product = Product::find($productId);
        return view('payment.checkout', compact('product'));
    }
 
    public function session(Request $request)
    {
        //\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        \Stripe\Stripe::setApiKey(config('app.st_secret'));
        $productname = $request->get('productname');
        $totalprice = $request->get('total');
        $two0 = "00";
        $total = "$totalprice$two0";
 
        $total = (int) ($totalprice * 100);

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
                 
            ],
            'mode'        => 'payment',
            'success_url' => route('success').'?id={CHECKOUT_SESSION_ID}&&order_id=2&&product_id=2',

            'cancel_url'  => url('checkout'),
        ]);
 
        return redirect()->away($session->url);
    }
 
    public function success(Request $request)
    {
        //dd($request->input('product_id'));
        $product = Product::find($request->input('product_id'));
        $order = Order::find($request->input('order_id'));
        return view ('payment.success',compact('order','product'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
}
