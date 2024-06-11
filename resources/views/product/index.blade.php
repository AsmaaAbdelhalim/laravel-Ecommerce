@extends('layouts.admin')
@section('content')
    <!-- Category Start -->

            @foreach($categories as $category)

                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">{{ $category->title }}</h4>
                            <span>{{ $category->product->count() }} products</span>
                        </a>

                        @foreach($category->product->take(6) as $product)

                        <table class="table table-bordered text-center">
    
                        <thead>
        
                        <tr>
            
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>vendor</th>
	
                    <th>handle	</th>
                    <th>owner	</th>
                    <th>price</th>	
                    <th>compare_at_price</th>	
                    <th>stock_status	</th>
                    <th>quantity	</th>
                    <th>published_at</th>	
                    <th>tags	</th>
                    <th>full_permalink	</th>
                    <th>content	</th>
                    <th>meta	</th>
                    <th>category_id	</th>
                    <th>image_id	</th>
                    <th>created_at</th>	
                    <th>updated_at</th>	 
                                     </thead>
    <tbody>

<tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td> 

<td><img src="{{ $product->image }}" alt="product Image" width="100" height="100"></td>

                        <td>{{ $product->type }}</td>
                        <td>{{ $product->vendor }}</td>
                        <td>{{ $product->handle }}</td>
                        <td>{{ $product->owner }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->compare_at_price }}</td>
                        <td>{{ $product->stock_status }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->published_at }}</td>
                        <td>{{ $product->tags }}</td>
                        <td>{{ $product->full_permalink }}</td>
                        <td>{{ $product->content	}}</td>
                        <td>{{ $product->meta }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->image_id }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>

                        </tr>
 


    </tbody>
</table>

                        @endforeach
                        @endforeach
               
       
    
    <!-- Category End -->
        @foreach($products as $product)
        {{$product->id}}
        {{$product->title}}<br>
        @endforeach
    
    <!-- products End -->


    <!-- products End -->

    
    

  @endsection