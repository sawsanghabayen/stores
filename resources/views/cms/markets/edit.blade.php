@extends('cms.parent')

@section('page-name','Update market')
@section('main-page','Content Management')
@section('sub-page','markets')
@section('page-name-small','Create market')

@section('styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
@endsection

@section('content')
<!--begin::Container-->
<div class="row">
    <div class="col-lg-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Horizontal Form Layout</h3>
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
                    <h3 class="text-dark font-weight-bold mb-10">markets</h3>
            
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Name :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" value="{{$market->name}}" />
                            <span class="form-text text-muted">Please enter Name market</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Address :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="address"  value="{{$market->address}}" />
                            <span class="form-text text-muted">Please enter Address</span>
                        </div>
                    </div>
              


                    <div id="image_div" class="form-group row">
                        <label class="col-3 col-form-label">Logo:</label>
                        <div class="col-3">
                            <div class="image-input image-input-empty image-input-outline" id="logo"
                                style="background-image: url({{Storage::url($market->logo)}})">
                                <div class="image-input-wrapper"></div>

                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="remove" data-toggle="tooltip" title="Remove avatar">
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
                            <button type="button" onclick="performUpdate()" class="btn btn-primary mr-2">Update</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
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
<script src="{{asset('cms/assets/js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>
<script src="{{asset('cms/assets/js/pages/crud/file-upload/image-input.js')}}"></script>

<script>



    function performUpdate(){
        let formData = new FormData();
        formData.append('_method','PUT');
        formData.append('name',document.getElementById('name').value);
        formData.append('address',document.getElementById('address').value);
        if(logo.input.files[0] != undefined) {
        formData.append('logo',logo.input.files[0]);

       }

        axios.post('/cms/admin/markets/{{$market->id}}',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/markets';
        
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection