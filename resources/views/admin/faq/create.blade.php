@section('title', 'إضافة اسئله')
@section('description', 'إضافة اسئله')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">إضافة اسئله</h4>
                        <div class="">
                            <a href="{{ route('faqs.index') }}" class="btn btn-primary">
                                <span class="uil uil-arrow-left"></span>
                                العوده الى الاسئله
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('faqs.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="question" class="form-label">السؤال</label>
                                    <input type="text" name="question" id="question" placeholder="السؤال"
                                        class="form-control">
                                    @error('question')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="answer" class="form-label">الاجابه</label>
                                    <textarea name="answer" id="answer" placeholder="الاجابه" class="form-control"></textarea>
                                    @error('answer')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">إضافة</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
