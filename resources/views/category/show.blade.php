
    <!-- Header Start -->

            <img src="{{ $category->image }}" position="relative"; width="100%"; height= "350px"; padding-bottom="56.25%"; >
    <!-- Category Start -->
    
 <!-- End -->
    <div class="container">

    
       <!-- products End -->
       <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1>{{ $category->title }}</h1>
            </div>
            <p>{{ $category->id }}</p>
            <p>{{ $category->title }}</p>
            <p>{{ $category->taxonomy }}</p>
            <p>{{ $category->handle }}</p>
            <p>{{ $category->content }}</p>
            <p>{{ $category->published_at }}</p>
            <p>{{ $category->available }}</p>
            <p><img src="{{ $category->image }}" alt="Category Image" width="100" height="100"></p>
            <p>{{ $category->sort_order }}</p>
            <p>{{ $category->template_suffix }}</p>
            <p>{{ $category->created_at }}</p>
            <p>{{ $category->updated_at }}</p>
            <p>category->user->name</p> 
            <p>{{$category->product_count}}</p>
            
    <div class="row">         
               <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">products</h5>       

    @if($products->count() > 0)
    @foreach($products as $product)

{{ $product->id }}
{{ $product->title }} <br>
                        
    @endforeach
    @else
    <p>No products found in this category.</p>
@endif
        </div>
        </div>
    </div>


    <!-- products End -->
 
</div>
{{ $products->links('layouts.custom-pagination')}}
   


    