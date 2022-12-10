@extends('controlPanel.parent')

@section('page-name',__('cms.skills'))
@section('main-page',__('cms.skills'))
@section('sub-page',__('cms.skills'))
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
                        <label class="col-3 col-form-label">{{__('cms.title')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="title" value="{{$skill->title}}"
                                placeholder="Enter title" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.title')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.degree')}}:</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="degree" value="{{$skill->degree}}"
                                placeholder="Enter user degree" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.degree')}}</span>
                        </div>
                    </div>
         
             
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performUpdate('{{$skill->id}}')"
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
    var image = new KTImageInput('image');

     function performUpdate(id) {
        let formData = new FormData();
        formData.append('_method','PUT');
        formData.append('title',document.getElementById('title').value);
        formData.append('degree',document.getElementById('degree').value);
        axios.post('/cms/admin/skills/{{$skill->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/skills';
            
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection