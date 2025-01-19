@section('title', 'الخدمات الفرعية')
@section('description', 'الخدمات الفرعية')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">الخدمات الفرعية</h4>
                        <div class="">
                            <a href="{{ route('sub-services.create') }}" class="btn btn-primary">
                                <span class="uil uil-plus"></span>
                                إضافة خدمه فرعية
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الخدمه الرئيسية</th>
                                        <th>الخدمه الفرعية</th>
                                        <th>الصورة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subservices as $subservice)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $subservice->name }}</td>
                                            <td>{{ $subservice->name }}</td>
                                            <td><img src="{{ asset('storage/' . $subservice->image) }}"
                                                    alt="{{ $subservice->name }}" style="width: 50px; height: 50px;"></td>
                                            <td class="d-flex gap-2">
                                                <a href="{{ route('sub-services.edit', $subservice->id) }}"
                                                    class="btn btn-primary">تعديل</a>
                                                <form action="{{ route('sub-services.destroy', $subservice->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center my-5">لا يوجد خدمات فرعية</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
