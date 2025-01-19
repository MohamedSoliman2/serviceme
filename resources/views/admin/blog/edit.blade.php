@section('title', $title)
@section('description', $description)
@extends('layout.parentdash')
@section('content')
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
                        <form action="{{ route('admin.blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                           
                          
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                    <label for="title" >العنوان<span
                                            class="text-danger">*</span></label>
                                    <input type="text"  class="form-control mt-2"
                                        name="title" value="{{$blog->title}}" id="title" placeholder="الاسم">
                                    @if ($errors->has('title'))
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                    <label for="description" >التفاصيل</label>
                                    <textarea class="form-control mt-2" name="description" style="height: 175px;padding:20px;"
                                    id="editor" >{{$blog->description}}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @endif
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