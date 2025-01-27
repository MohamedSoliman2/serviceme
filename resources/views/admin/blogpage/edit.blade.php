@section('title', $title)
@section('description', $description)
@extends('layout.parentdash')
@section('content')
<style>  #im1{
    display: none;
      }
     
                .ck-editor__editable[role="textbox"] {
                    
                    min-height: 500px;
                }
                .ck-content .image {
                    
                    max-width: 80%;
                    margin: 20px auto;
                }
                .ck-reset {
        position: relative;
        width: 84%;
        margin-top: 75px;
    }
    #copes{
      border: 1px solid black;
        display: flex;
        align-items: center;
        padding: 20px;
        margin: 10px;
      display: none;
    }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                    <h4 class="text-capitalize">تعديل مقاله</h4>
                </div>
            </div>
        </div>
       <!-- <div class="card mb-50">
            <div class="row justify-content-center">
                <div class="col-sm-5 col-10">
                    <div class="mt-40 mb-50"> -->
                        <div class="container-fluid">
                        @if(Session::has('errer'))
                        <div class="alert-icon-big alert alert-warning " role="alert">
                         
                            <div class="alert-icon">
                                <img src="{{ asset('assets/img/svg/layers.svg') }}" alt="layers" class="svg">
                            </div>

                            <div class="alert-content">

                                <h6 class='alert-heading'>{{trans('Warning')}}</h6>
                                <p>{{Session::get('errer')}}</p>
                            </div>
                        </div>
                        @endif
                        <div class="card-body mt-2">
                        <form action="{{ route('admin.blog.page.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="account-profile d-flex align-items-center mb-4 " style="margin-left: 50px; justify-content:center;">
                                <div class="ap-img pro_img_wrapper">
                                    <input id="profile-picture" type="file" accept="image/*" name="photo" class="d-none image-upload-field" data-preview-element="profile-picture-preview">
                                    <!-- Profile picture image-->
                                    <label for="profile-picture">
                                        <img src="{{url('/')}}/../storage/app/public/{{$blog->image}}" alt="user" class="profile-picture-preview ap-img__main rounded-circle wh-120 bg-lighter d-flex">

                                        <span
                                            title="Pick an image"
                                            id="remove_pro_pic"
                                            class="cross clear-input-file-btn"
                                            data-input-has-file="0"
                                            data-pick-title="Pick an image"
                                            data-pick-icon="{{ asset('assets/img/svg/camera-white.svg' ) }}"
                                            data-clear-title="Remove"
                                            data-clear-icon="{{ asset('assets/img/svg/close-white.svg' ) }}"
                                            data-input-element-id="profile-picture"
                                            data-preview-element="profile-picture-preview"
                                            data-default-preview-image="{{ asset('assets/img/svg/user.svg' ) }}"
                                        >
                                            <img src="{{ asset('assets/img/svg/camera-white.svg' ) }}" alt="camera">
                                        </span>
                                    </label>
                                </div>
                                <div class="account-profile__title">
                                    <h6 class="fs-15 ms-20 fw-500 text-capitalize">صوره الخلفيه</h6>
                                </div>
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </div>
                          
                            <div class="row">
                                

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                    <label for="title" > العنوان <span
                                            class="text-danger">*</span></label>
                                    <input type="text"  class="form-control mt-2"
                                        name="title" value="{{$blog->title}}" id="title" placeholder="العنوان">
                                    @if ($errors->has('title'))
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                </div>
                            

                                
                              
                                 
                                
                              
                                <div class="button-group d-flex pt-25 justify-content-md-ceter justify-content-center" style="margin-bottom: 90px;">
                                    <button type="submit"
                                        class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">تعديل</button>
                                </div>

                            </div>
                        </form>
                   <!-- </div>
                </div>-->
                
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
    
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
              ckfinder:{
                uploadUrl:"{{route('upload',['_token'=>csrf_token()])}}"
              }
            } )
            .catch( error => {
                console.error( error );
            } );
    
            ClassicEditor
            .create( document.querySelector( '#edity' ),{
              ckfinder:{
                uploadUrl:"{{route('upload',['_token'=>csrf_token()])}}"
              }
            }  )
            .catch( error => {
                console.error( error );
            } );
     
    
    
    function  disapper (){
      $masa=document.querySelector('#notifydead');
      $masa.style.cssText="display:none";
    }
    img=document.querySelector('#image1');
        im=document.querySelector('#im1');
    function clicek(img,im){
        img.addEventListener('click',function () {
            im.click();
        img.setAttribute('src',im.value);
    });
    }
    clicek(img,im);
    </script>
@endsection