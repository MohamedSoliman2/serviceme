@section('title', 'اضافه منشور')
@section('description', 'اضافه منشور')
@extends('layout.parentdash')
@section('content')
    <style>
        #im1 {
            display: none;
        }

        .ck-editor__editable[role="textbox"] {

            min-height: 200px;
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

        #copes {
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
                    <h4 class="text-capitalize">اضافه منشور</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @if (Session::has('errer'))
                <div class="alert-icon-big alert alert-warning " role="alert">

                    <div class="alert-icon">
                        <img src="{{ asset('assets/img/svg/layers.svg') }}" alt="layers" class="svg">
                    </div>

                    <div class="alert-content">

                        <h6 class='alert-heading'>{{ trans('Warning') }}</h6>
                        <p>{{ Session::get('errer') }}</p>
                    </div>
                </div>
            @endif
            <div class="card-body mt-2">
                <form action="{{ route('home-posts.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <div class="row flex flex-column justify-content-center">
                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                                <label for="title">العنوان<span class="text-danger">*</span></label>
                                <input type="text" class="form-control mt-2" name="title" value="{{ old('title') }}"
                                    id="title" placeholder="الاسم">
                                @if ($errors->has('title'))
                                    <p class="text-danger">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                                <label for="description">التفاصيل</label>
                                <textarea class="form-control mt-2" name="description" style="height: 375px;padding:20px;" id="editor">{{ old('description') }}</textarea>
                            </div>
                            @if ($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                            @endif
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mt-2">
                                <label for="image">الصورة</label>
                                <input type="file" class="form-control mt-2" name="image" id="image">
                            </div>
                        </div>

                        <div class="button-group d-flex pt-25 justify-content-md-ceter justify-content-center"
                            style="margin-bottom: 90px;">
                            <button type="submit"
                                class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">اضافه</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#edity'), {
                ckfinder: {
                    uploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}"
                }
            })
            .catch(error => {
                console.error(error);
            });



        function disapper() {
            $masa = document.querySelector('#notifydead');
            $masa.style.cssText = "display:none";
        }
        img = document.querySelector('#image1');
        im = document.querySelector('#im1');

        function clicek(img, im) {
            img.addEventListener('click', function() {
                im.click();
                img.setAttribute('src', im.value);
            });
        }
        clicek(img, im);
    </script>
@endsection
