@section('title', 'تعديل محافظه')
@section('description', 'تعديل محافظه')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">تعديل محافظه</h4>
                        <div class="">
                            <a href="{{ route('governorates.index') }}" class="btn btn-primary">
                                <span class="uil uil-arrow-left"></span>
                                العوده الى المحافظات
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
                            <form action="{{ route('governorates.update', $governorate->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="form-label">المحافظه</label>
                                    <input type="text" name="name" id="name" placeholder="اسم المحافظه"
                                        class="form-control" value="{{ $governorate->name }}">
                                    @error('name')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">تعديل</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection