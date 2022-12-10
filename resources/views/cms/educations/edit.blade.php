@extends('controlPanel.parent')

@section('page-name',__('cms.educations'))
@section('main-page',__('cms.educations'))
@section('sub-page',__('cms.educations'))
@section('page-name-small',__('cms.update'))

@section('styles')

@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">{{__('cms.update')}}</h3>
                {{-- <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                        <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                        <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                    </div>
                </div> --}}
            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.start_date')}}:</label>
                        <div class="col-9">
                            <input type="date" class="form-control" id="start_date" value="{{$education->start_date , date('Y-m-d')}}"
                                placeholder="Enter start_date" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.start_date')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.end_date')}}:</label>
                        <div class="col-9">
                            <input type="date" class="form-control" id="end_date" value="{{$education->end_date ,date('Y-m-d')}}"
                                placeholder="Enter end_date" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.end_date')}}</span>
                        </div>
                    </div>

                
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.company_name')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="company_name" value="{{$education->company_name}}"
                                placeholder="Enter company_name" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.company_name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.description')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="description" value="{{$education->description}}"
                                placeholder="Enter user description" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.description')}}</span>
                        </div>
                    </div>
          
        
             
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performUpdate('{{$education->id}}')"
                                class="btn btn-primary mr-2">{{__('cms.update')}}</button>
                            <button type="reset" class="btn btn-secondary">{{__('cms.cancel')}}</button>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card-->
    </div>
</div>
<!--end::Container-->
@endsection

@section('scripts')
<script src="{{asset('controlPanel/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<script src="{{asset('controlPanel/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
<script>

     function performUpdate(id) {
        let formData = new FormData();
        formData.append('_method','PUT');
        formData.append('company_name',document.getElementById('company_name').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('start_date',document.getElementById('start_date').value);
        formData.append('end_date',document.getElementById('end_date').value);
     
        axios.post('/cms/admin/educations/{{$education->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/educations';
            
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection