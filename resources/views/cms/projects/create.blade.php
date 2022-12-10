@extends('controlPanel.parent')

@section('page-name','Create Project')
@section('main-page','Content Management')
@section('sub-page','Projects')
@section('page-name-small','Create Project')

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
                    <h3 class="text-dark font-weight-bold mb-10">Projects</h3>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">Category:</label>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                                <select class="form-control selectpicker" data-size="7"  id="category_id"
                                    title="Choose one of the following..." tabindex="null" data-live-search="true">
                                    {{-- <option  value="-1">Select Category</option> --}}
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <span class="form-text text-muted">Please select category</span>
                        </div>
                    </div>
        
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Name :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name" placeholder="Enter Name Project" />
                            <span class="form-text text-muted">Please enter Name Project</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Client :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="client" placeholder="Enter Client name" />
                            <span class="form-text text-muted">Please enter Client</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Duration (MONTHES):</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="duration" placeholder="Enter Duration" />
                            <span class="form-text text-muted">Please enter Duration</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Budget (USD):</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="budget" placeholder="Enter Budget" />
                            <span class="form-text text-muted">Please enter Budget</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Technologies :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="technologies" placeholder="Enter used technologies" />
                            <span class="form-text text-muted">Please enter used technologies LIKE: ( HTML, JAVASCRIPT)</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">Github Url :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="url_website" placeholder="Enter Github Url" />
                            <span class="form-text text-muted">Please enter Github Url</span>
                        </div>
                    </div>
                    <div id="youtube_url_div" class="form-group row mt-4">
                        <label class="col-3 col-form-label">Youtube Url :</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="url_youtube" placeholder="Enter Youtube Url" />
                            <span class="form-text text-muted">Please enter Youtube Url</span>
                        </div>
                    </div>

                    <div id="slider_div" class="form-group row">
                        <label class="col-3 col-form-label">Images:</label>
                        <div class="col-3">
                            <div class="image-input image-input-empty image-input-outline" id="project_image_1"
                                style="background-image: url({{asset('controlPanel/assets/media/users/blank.png')}})">
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
                        <div class="col-3">
                            <div class="image-input image-input-empty image-input-outline" id="project_image_2"
                                style="background-image: url({{asset('controlPanel/assets/media/users/blank.png')}})">
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
                        <div class="col-3">
                            <div class="image-input image-input-empty image-input-outline" id="project_image_3"
                                style="background-image: url({{asset('controlPanel/assets/media/users/blank.png')}})">
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


                    <div id="image_div" class="form-group row">
                        <label class="col-3 col-form-label">Image:</label>
                        <div class="col-3">
                            <div class="image-input image-input-empty image-input-outline" id="image"
                                style="background-image: url({{asset('controlPanel/assets/media/users/blank.png')}})">
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

                    <div id ="video_div" class="form-group row">
                        <label class="col-3 col-form-label">Video:</label>

                        <input id= "video" name="file" type="file" class="form-control"><br/>
                        <div class="progress">
                            <div class="bar"></div >
                            <div class="percent">0%</div >
                        </div>
                        {{-- <br>
                        <input type="submit"  value="Submit" class="btn btn-primary"> --}}
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

$('#category_id').on('change',function(){
    
    if(this.value == 1){
        document.getElementById('image_div').hidden = false
        document.getElementById('slider_div').hidden = true
        document.getElementById('video_div').hidden = true
        document.getElementById('youtube_url_div').hidden = true

    }
    // alert(this.value);
        // console.log('sawsan')
    if(this.value == 2){

        document.getElementById('video_div').hidden = true
        document.getElementById('slider_div').hidden = true
        // document.getElementById('image_div').hidden = true
        document.getElementById('youtube_url_div').hidden = false
    }
    if(this.value == 3){
    document.getElementById('slider_div').hidden = false
        document.getElementById('video_div').hidden = true
        // document.getElementById('image_div').hidden = true
        document.getElementById('youtube_url_div').hidden = true

    }
    if(this.value == 4){
        document.getElementById('youtube_url_div').hidden = true
        document.getElementById('video_div').hidden = false
        // document.getElementById('image_div').hidden = true
        document.getElementById('slider_div').hidden = true

    }
    

    });

    // $(function () {
    //         $(document).ready(function () {
    //             $('#create-form').ajaxForm({
    //                 beforeSend: function () {
    //                     var percentage = '0';
    //                 },
    //                 uploadProgress: function (event, position, total, percentComplete) {
    //                     var percentage = percentComplete;
    //                     $('.progress .progress-bar').css("width", percentage+'%', function() {
    //                       return $(this).attr("aria-valuenow", percentage) + "%";
    //                     })
    //                 },
    //                 complete: function (xhr) {
    //                     console.log('File has uploaded');
    //                 }
    //             });
    //         });
    //     });


    var image = new KTImageInput('image');
    var image1 = new KTImageInput('project_image_1');
    var image2 = new KTImageInput('project_image_2');
    var image3 = new KTImageInput('project_image_3');  
    function performStore(){
        let formData = new FormData();
        formData.append('category_id',document.getElementById('category_id').value);
        formData.append('name',document.getElementById('name').value);
        formData.append('client',document.getElementById('client').value);
        formData.append('duration',document.getElementById('duration').value);
        formData.append('budget',document.getElementById('budget').value);
        formData.append('technologies',document.getElementById('technologies').value);
        formData.append('url_website',document.getElementById('url_website').value);
        formData.append('url_youtube',document.getElementById('url_youtube').value ?? '');
        formData.append('image_1',image1.input.files[0]);
        formData.append('image_2',image2.input.files[0]);
        formData.append('image_3',image3.input.files[0]);
        formData.append('image',image.input.files[0]);
        formData.append('video',document.getElementById('video').files[0] );
        axios.post('/cms/admin/projects',formData)
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

<script type="text/javascript">
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    alert('File Has Been Uploaded Successfully');
                }
              });
        }); 
     });
    </script>
@endsection