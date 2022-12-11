
@extends('front.parent')
<style>
 


   
</style>
@section('content')
        <!-- markets Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                @foreach ($markets as $market )
                    
                
                <div  class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <p class="text-right">{{$market->products_count.' '. 'Products'}}</p>
                        <a href="{{route('frontproduct.index',['id' => $market->id])}}" class="cat-img position-relative overflow-hidden mb-3">
                        {{-- <a href="{{route('front.supmarkets',['market_id'=>$market->id])}}" class="cat-img position-relative overflow-hidden mb-3"> --}}
                            <img class="img-fluid" src="{{Storage::url($market->logo ?? '')}}" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">{{$market->name}}</h5>
                        <p class="font-weight-semi-bold m-0">{{$market->address}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- markets End -->
@endsection
   