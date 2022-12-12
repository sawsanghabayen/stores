@extends('front.parent')
@section('styles')


<style>
    /* .product-wish{
        font-size: 30px;
        
    } */
    .text-primary:hover {
    color: #a08582 !important;}

    .img-fluid  {
        /* height: 150px; */
    }
   
</style>

@endsection
@section('content')


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Stores</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($markets as $market)
            
        <div class="col-lg-4 col-md-6 pb-1">
            <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                <p class="text-right">{{$market->products_count}}</p>
                <a  href="{{route('frontproduct.index',['id' => $market->id])}}" class="cat-img position-relative overflow-hidden mb-3">
                    <img class="img-fluid" style="height: auto , max-width: 100%;" src="{{Storage::url($market->logo ?? '')}}" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">{{$market->name}}</h5>
                <p class="font-weight-semi-bold m-0">{{$market->address}}</p>
            </div>
        </div>
        @endforeach

  
    </div>
</div>
<!-- Categories End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Products</span></h2>
    </div>

    <div class="row px-xl-5 pb-3">
        @foreach ( $products as $product )

        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img  class="img-fluid  w-100" style="height: auto , max-width: 100%;" src="{{Storage::url($product->image ?? '')}}" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                    <p class="font-weight-semi-bold m-0">{{$product->store_name}} Store</p>

                    <div class="d-flex justify-content-center">
                        <h6>$ 
                        @if($product->discount)
                            
                            {{
                            $product->price-($product->discount_price * $product->price)/100
                            
                            
                            }}
                            @else
                            {{$product->price}}
                            @endif
                            
                        </h6>
                        @if($product->discount)
                        <h6 class="text-muted ml-2"><del>${{$product->price}}</del></h6>

                            {{-- @else --}}

                        {{-- <h6 class="text-muted ml-2"><del>${{$product->price-($product->discount_price * $product->price)/100}}</del></h6> --}}
                            @endif
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    {{-- @if (Auth::guard('user')->check()) --}}

                    <a  onclick="performCartStore({{$product->id }} ,{{$product->price}},
                        @if($product->discount)
                        {{$product->price-($product->discount_price * $product->price)/100}}
                         @else
                        {{ $product->price}}
                        @endif
                        ,{{$product->discount }}

                        )"  class="btn btn-sm text-dark p-0">
                        <i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    {{-- <a href="" class="btn btn-sm text-dark p-0">{{$latestproduct->vendor->mobile}}</a> --}}
                    <a  onclick=""class="product-wish" class="btn btn-sm text-dark p-0" 
                        {{-- @if($latestproduct->is_favorite) --}}
                        style= "color: #a08582"
                        hover="color: #fff !important"
                      ><i  class="fas fa-heart text-primary mr-1" ></i>
                     
                    </a>
                  
                    
                 
          
                
             
                </div>
                  
           {{-- @endforeach --}}


               
            </div>
        </div>
        @endforeach
     
    </div> 
   
</div>

    
@endsection
<script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>
<script >
  function performCartStore(id ,price,discount_price ,discount ) {
        axios.post('/store-project/payments',{
              product_id:  id,
              price:price,
              discount_price:discount_price,
              discount:discount,
    
        })
        .then(function (response) {
            console.log(response);
            alert(response.data.message);
            toastr.success(response.data.message);
            // window.location.href = '/rest/index';
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>
<script>
function performFavorite(id) {
}

</script>
