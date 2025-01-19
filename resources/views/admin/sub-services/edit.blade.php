@section('title', 'تعديل خدمه فرعيه')
@section('description', 'تعديل خدمه فرعيه')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">تعديل خدمه فرعيه</h4>
                        <div class="">
                            <a href="{{ route('sub-services.index') }}" class="btn btn-primary">
                                <span class="uil uil-arrow-left"></span>
                                العوده الى الخدمات الفرعيه
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
                            <form action="{{ route('sub-services.update', $subservice->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">اسم الخدمه</label>
                                    <input placeholder="اسم الخدمه" type="text" name="name" id="name"
                                        value="{{ $subservice->name }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">وصف الخدمه</label>
                                    <textarea placeholder="وصف الخدمه" name="description" id="description" rows="4"
                                        class="form-control @error('description') is-invalid @enderror">{{ $subservice->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="parent_id" class="form-label">الخدمه الرئيسية</label>
                                    <select name="parent_id" id="parent_id"
                                        class="form-control @error('parent_id') is-invalid @enderror">
                                        <option value="">اختر الخدمه الرئيسية</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}"
                                                {{ $subservice->parent_id == $service->id ? 'selected' : '' }}>
                                                {{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">صورة الخدمه</label>
                                    <input type="file" name="image" id="image" value="{{ $subservice->image }}"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
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
