@section('title', $title)
@section('description', $description)
@extends('layout.parentdash')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                    <h4 class="text-capitalize">اضافه فوتر</h4>
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
                        <form action="{{ route('admin.end.footer.store') }}" method="POST" enctype="multipart/form-data">
                            
                            @csrf
                           
                            <div class="account-profile d-flex align-items-center mb-4 " style="margin-left: 50px; justify-content:center;">
                                <div class="ap-img pro_img_wrapper">
                                    <input id="profile-picture" type="file" accept="image/*" name="photo" class="d-none image-upload-field" data-preview-element="profile-picture-preview">
                                    <!-- Profile picture image-->
                                    <label for="profile-picture">
                                        <img src="{{ asset( 'assets/img/svg/user.svg' ) }}" alt="user" class="profile-picture-preview ap-img__main rounded-circle wh-120 bg-lighter d-flex">

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
                                    <h6 class="fs-15 ms-20 fw-500 text-capitalize">صوره اللوجو</h6>
                                </div>
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                    <label for="name" > العنوان<span
                                            class="text-danger">*</span></label>
                                    <input type="text"  class="form-control mt-2"
                                        name="title" value="{{ old('name') }}" id="name" placeholder="العنوان">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="governorate_id" class="form-label">اختار الصفحه</label>
                                    <select name="page" id="page"
                                        class="form-control">
                                        <option value="">اختر الصفحه التي  تريد وضع فيها المربع</option>
                                        <option value="home">الصفحه الرئسيه</option>
                                        <option value="about">عنا</option>
                                        <option value="services">خدمات</option>
                                        <option value="subservice">خدمه فرعيه</option>
                                        <option value="locations"> العناوين</option>
                                        <option value="terms"> صفحه الشروط والاحكام</option>
                                    </select>
                                    @error('governorate_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                               
                            
 <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                    <label for="link" >لينك<span
                                            class="text-danger">*</span></label>
                                    <input type="text"  class="form-control mt-2"
                                        name="link" value="{{ old('link') }}" id="link" placeholder="لينك">
                                    @if ($errors->has('link'))
                                        <p class="text-danger">{{ $errors->first('link') }}</p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                    <label for="phone" >رقم الهاتف<span
                                            class="text-danger">*</span></label>
                                    <input type="text"  class="form-control mt-2"
                                        name="phone" value="{{ old('phone') }}" id="phone" placeholder="الهاتف">
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                </div>
                               
                              
                                
                                <div class="col-sm-6">
                                    <div class="form-group mt-2">
                                    <label for="description" >وصف  الفوتر</label>
                                    <textarea class="form-control mt-2" name="description" style="height: 175px;padding:20px;"
                                        id="description" >{{ old('description') }}</textarea>
                                </div>
                                @if ($errors->has('description'))
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                                
                              
                                <div class="button-group d-flex pt-25 justify-content-md-ceter justify-content-center" style="margin-bottom: 90px;">
                                    <button type="submit"
                                        class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">اضافه</button>
                                </div>

                            </div>
                        </form>
                   <!-- </div>
                </div>-->
                
            </div>
        </div>
    </div>
@endsection