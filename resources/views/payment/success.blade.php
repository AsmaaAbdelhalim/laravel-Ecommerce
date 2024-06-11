@extends('layouts.app')
@section('content')


    <div class="container" style="text-align: center;">
        <div class="row my-5">
            <div class="col-md-6 mx-auto">
                <div class="card">
                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:10px auto;">
        <i class="checkmark" style="        
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;">✓</i>
      </div>
                    <div class="card-body">
                      <h1 style=" color: #88B04B;">Payment Successful!</h1>
                        <p>Thank you for your payment.</p>
                            If you have any questions, please conact us.
                        </p>
                        <a href="{{ url('/') }}" class="btn btn-success">Go To Shopping</a>
                    </div>   
                </div>   
            </div>
        </div>
    </div> 
    <script> 
    ciq("track", "Purchase", {
        content: [
            {
                id: "{{$product->id}}", // required
                quantity: "{{$product->quantity}}", // required
                name: "{{$product->title}}", // optional
                category: "{{$product->category_id}}", // optional
            },
            {
                id: 456,
                quantity: 1,
            }
        ],
        order_id: "{{$order->id}}", // required
        currency: "USD", // required
        value: 150.50 // required
    });
    </script>
@endsection
                                                        