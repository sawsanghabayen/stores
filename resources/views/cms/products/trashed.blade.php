@extends('cms.parent')

@section('page-name',__('cms.productsTrashed'))
@section('main-page',__('cms.hr'))
@section('sub-page',__('cms.productsTrashed'))
@section('page-name-small',__('cms.index'))

@section('styles')

@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cms.productsTrashed')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
        </h3>
        <div class="card-toolbar">
          

                <a href="{{route('cms.restore')}}"
                class="btn btn-info font-weight-bolder font-size-sm">Restore</a>
        </div>
       
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 120px">Image</th>
                        <th style="min-width: 150px">Store Name</th>
                        <th style="min-width: 150px">Name</th>
                        <th style="min-width: 150px">Description</th>
                        <th style="min-width: 150px">Price</th>
                        <th style="min-width: 150px">Price After Discount </th>
                        <th style="min-width: 150px">Discount Status</th>
                        {{-- <th class="pr-0 text-right" style="min-width: 160px">{{__('cms.actions')}}</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productsTrashed as $product)
                    <tr>
                     

                        <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                            <div class="symbol symbol-50 symbol-light mr-4">
                                <span class="symbol-label">
                                    @if ($product->image != null)
                                   
                                     
                                    <img src="{{Storage::url($product->image ?? '')}}"
                                        class="h-75 align-self-end" alt="" /> 
                                        @else
                                        <img src="{{asset('cms/assets/media/users/project.jpg')}}"
                                        class="h-75 align-self-end" alt="" />
                                    @endif

                                </span>
                            </div>
                            </div>
                        </td>
               
                 
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$product->store_name}}</span>
                        </td>

                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$product->name}}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$product->description}}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$product->price}}</span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">@if($product->discount) {{$product->price-($product->discount_price * $product->price)/100}} @else {{$product->price}} @endif</span>
                        </td>
                        
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$product->active_status}}</span>
                        </td>
                  
                    
             
                        {{-- @endcanany --}}
                    </tr>
                    @endforeach
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 5-->
@endsection

@section('scripts')

@endsection