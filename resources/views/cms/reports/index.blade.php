@extends('cms.parent')

@section('page-name',__('cms.reports'))
@section('main-page',__('cms.hr'))
@section('sub-page',__('cms.reports'))
@section('page-name-small',__('cms.index'))

@section('styles')

@endsection

@section('content')
<!--begin::Advance Table Widget 5-->
<div class="card card-custom gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{__('cms.reports')}}</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
        </h3>
      
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-0">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                <thead>
                    <tr class="text-uppercase">
                        {{-- <th style="min-width: 120px">Image</th> --}}
                        {{-- <th style="min-width: 150px">Store Name</th> --}}
                        <th style="min-width: 150px">Name</th>
                        <th style="min-width: 150px">Price</th>
                        {{-- <th style="min-width: 150px">Price After Discount </th> --}}
                        {{-- <th style="min-width: 150px">Date</th> --}}
                        {{-- <th class="pr-0 text-right" style="min-width: 160px">{{__('cms.actions')}}</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                     

                     
               
                 
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$report->name}}</span>
                        </td>

                     
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$report->total}}</span>
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
<script src="{{asset('cms/assets/js/pages/widgets.js')}}"></script>
<script>
      function performDelete(id, reference) {
        axios.delete('/cms/admin/reports/'+id)
        .then(function (response) {
            console.log(response);
            // toastr.success(response.data.message);
            reference.closest('tr').remove();
            showMessage(response.data);
        })
        .catch(function (error) {
            console.log(error.response);
            // toastr.error(error.response.data.message);
            showMessage(error.response.data);
        });
    }
</script>
@endsection