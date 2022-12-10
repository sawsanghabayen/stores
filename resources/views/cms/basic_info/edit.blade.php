@extends('controlPanel.parent')

@section('page-name',__('cms.infos'))
@section('main-page',__('cms.infos'))
@section('sub-page',__('cms.infos'))
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
                        <label class="col-3 col-form-label">{{__('cms.f_name')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="f_name" value="{{$info->f_name}}"
                                placeholder="Enter first name" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.f_name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.l_name')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="l_name" value="{{$info->l_name}}"
                                placeholder="Enter user last name" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.l_name')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.birthdate')}}:</label>
                        <div class="col-9">
                            <input type="date" class="form-control" id="birthdate" value="{{$info->birthdate ,date('Y-m-d')}}"
                                placeholder="Enter birthdate" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.birthdate')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.mobile')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="mobile" value="{{$info->mobile}}"
                                placeholder="Enter user name" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.mobile')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.nationality')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="nationality" value="{{$info->nationality}}"
                                placeholder="Enter nationality " />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.nationality')}}</span>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.experience')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="experience" value="{{$info->experience}}"
                                placeholder="Enter experience " />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.experience')}}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.email')}}:</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="email" value="{{$info->email}}"
                                placeholder="Enter email" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.email')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.location')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="location" value="{{$info->location}}"
                                placeholder="Enter full location" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.location')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.job')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="job" value="{{$info->job}}"
                                placeholder="Enter full job" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.job')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.facebook_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="facebook_url" value="{{$info->facebook_url}}"
                                placeholder="Enter facebook_url" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.facebook_url')}}</span>
                        </div>
                    </div>    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.youtube_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="youtube_url" value="{{$info->youtube_url}}"
                                placeholder="Enter youtube_url" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.youtube_url')}}</span>
                        </div>
                    </div>    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.twitter_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="twitter_url" value="{{$info->twitter_url}}"
                                placeholder="Enter twitter_url" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.twitter_url')}}</span>
                        </div>
                    </div>    
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.skybe_url')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="skybe" value="{{$info->skybe}}"
                                placeholder="Enter skybe" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.skybe')}}</span>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <label class="col-3 col-form-label">{{__('cms.dribbble')}}:</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="dribbble" value="{{$info->dribbble}}"
                                placeholder="Enter dribbble" />
                            <span class="form-text text-muted">{{__('cms.please_enter')}} {{__('cms.dribbble')}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.freelance_status')}}</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    {{-- <input type="checkbox"  checked="checked"  id="freelance_active"> --}}
                                    <input type="checkbox" @if($info->active_status == 'Active') checked="checked" @endif  id="freelance_active">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
              {{-- {{(Gettype($info->languages));}} --}}

              
            {{-- //   dd(explode(',', $info->languages)); --}}
            {{-- {{ dd($array[0] == "arabic") }} --}}
                    <div class="form-group row">
                        <label class="col-3 col-form-label" >Select Languages :</label><br/>
                        <div class="col-lg-4 col-md-9 col-sm-12">
                            <div class="dropdown bootstrap-select form-control dropup">
                        <select class="form-control selectpicker" name="languages[]" data-size="7" multiple data-live-search="true" id ='languages'>
                            @foreach ($languages as $language)
                            <option value="{{$language->lang_code}}" @if(in_array($language->lang_code, $array)) selected @endif>{{$language->lang_name}}</option>
                            @endforeach
                       
                    
                          
                        </select>
                    </div>
                    <span class="form-text text-muted">Please select Languages</span>
                </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label">{{__('cms.image')}}:</label>
                        <div class="col-9">
                            <div class="image-input image-input-empty image-input-outline" id="image"
                            style="background-image: url({{Storage::url($info->image)}})">
                            <div class="image-input-wrapper"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="Change image">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="profile_image_remove" />
                            </label>

                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel image">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>

                          
                        </div>
                        </div>
                    </div>

                <div id ="cv_div" class="form-group row">
                        <label class="col-3 col-form-label">CV:</label>

                        <input id= "cv" name="file" type="file" class="form-control"><br/>
                        <div class="progress">
                            <div class="bar"></div >
                            <div class="percent">0%</div >
                        </div> 
                         <br>
                    </div>
             
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-3">

                        </div>
                        <div class="col-9">
                            <button type="button" onclick="performUpdate('{{$info->id}}')"
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
        formData.append('f_name',document.getElementById('f_name').value);
        formData.append('l_name',document.getElementById('l_name').value);
        formData.append('email',document.getElementById('email').value);
        formData.append('mobile',document.getElementById('mobile').value);
        formData.append('location',document.getElementById('location').value);
        formData.append('experience',document.getElementById('experience').value);
        formData.append('languages',Array.from(document.querySelectorAll('#languages option:checked')).map(el => el.value));
        formData.append('nationality',document.getElementById('nationality').value);
        formData.append('birthdate',document.getElementById('birthdate').value);
        formData.append('job',document.getElementById('job').value);
        formData.append('freelance_active',document.getElementById('freelance_active').checked);
        formData.append('facebook_url',document.getElementById('facebook_url').value);
        formData.append('youtube_url',document.getElementById('youtube_url').value);
        formData.append('twitter_url',document.getElementById('twitter_url').value);
        formData.append('dribbble',document.getElementById('dribbble').value);
        formData.append('skybe',document.getElementById('skybe').value);
        formData.append('image',image.input.files[0]);
        formData.append('cv',document.getElementById('cv').files[0]);
        if(image.input.files[0] != undefined){
            formData.append('image',image.input.files[0]);

        
        }

        // console.log(document.getElementById('languages').value);
        
        axios.post('/cms/admin/infos/{{$info->id}}',formData)
        .then(function (response) {
        //     const selected = document.querySelectorAll('#languages option:checked');
        // const values = Array.from(selected).map(el => el.value);
        //  console.log($info->languages);

            console.log(response);
            toastr.success(response.data.message);
            window.location.href = '/cms/admin/infos';
            
        })
        .catch(function (error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>

@endsection