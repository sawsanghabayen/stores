@extends('cms.parent')

@section('page-name','Create product')
@section('main-page','Content Management')
@section('sub-page','markets')
@section('page-name-small','Create product')

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
                    <h3 class="text-dark font-weight-bold mb-10">Stores</h3>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">Store Name:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7"  id="market_id"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    {{-- <option  value="-1">Select Category</option> --}}
                                    @foreach ($markets as $market)
                                    <option value="{{$market->id}}">{{$market->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">Please select Store</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Name :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name Product" />
                            <span class="form-text text-muted">Please enter Name Product</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">description :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="description" placeholder="Enter description Product" />
                            <span class="form-text text-muted">Please enter description Product</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Price :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="price" placeholder="Enter Name Price" />
                            <span class="form-text text-muted">Please enter Name Price</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Discount Price :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="discount_price" placeholder="Enter Name Discount Price" />
                            <span class="form-text text-muted">Please enter Name Discount Price</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.discount_status')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    <input type="checkbox"  id="discount">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                   
              
                    <div id="image_div" class="form-group row">
                        <label class="col-3 col-form-label">Image:</label>
                        <div class="col-3">
                            <div class="image-input image-input-empty image-input-outline" id="image"
                                style="background-image: url({{asset('cms/assets/media/users/blank.png')}})">
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
                            <button type="button" onclick="performStore()" class="btn btn-primary mr-2">Submit</button>
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


    var image = new KTImageInput('image');

    function performStore(){
        let formData = new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('market_id',document.getElementById('market_id').value);
        formData.append('description',document.getElementById('description').value);
        formData.append('price',document.getElementById('price').value);
        formData.append('discount_price',document.getElementById('discount_price').value);
        formData.append('discount',document.getElementById('discount').checked ? 1 : 0);
        formData.append('image',image.input.files[0]);
        axios.post('/cms/admin/products',formData)
        .then(function (response) {
            console.log(response);
            toastr.success(response.data.message);
            document.getElementById('create-form').reset();
        
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>

@endsection