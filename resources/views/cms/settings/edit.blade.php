@extends('controlPanel.parent')

@section('page-name',__('cms.settings'))
@section('main-page',__('cms.settings'))
@section('sub-page',__('cms.settings'))
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

            </div>
            <!--begin::Form-->
            <form id="create-form">
                <div class="card-body">

                
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.description_about')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="description_about" value="{{$setting->description_about}}"
                                placeholder="Enter description_about" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.description_about')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.description_portfolio')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="description_portfolio" value="{{$setting->description_portfolio}}"
                                placeholder="Enter description_portfolio" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.description_portfolio')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.description_contact')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="description_contact" value="{{$setting->description_contact}}"
                                placeholder="Enter description_contact" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.description_contact')}}</span>
                        </div>
                    </div>
           
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.background_img')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="background_img"
                            style="background-image: url({{Storage::url($setting->background_img ?? '')}})">
                            <div class="image-input-wrapper"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="Change background_img">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="background_img" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="background_img_remove" />
                            </label>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel background_img">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>

                          
                        </div>
                        </div>
                    </div>
             
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performUpdate('{{$setting->id}}')"
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
    var background_img = new KTImageInput('background_img');

     function performUpdate(id) {
        let formData = new FormData();
        formData.append('_method','PUT');
        formData.append('description_about',document.getElementById('description_about').value);
        formData.append('description_portfolio',document.getElementById('description_portfolio').value);
        formData.append('description_contact',document.getElementById('description_contact').value);
        formData.append('background_img',background_img.input.files[0]);
        if(background_img.input.files[0] != undefined){
            formData.append('background_img',background_img.input.files[0]);
        }
        axios.post('/cms/admin/settings/{{$setting->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/settings';
            
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection