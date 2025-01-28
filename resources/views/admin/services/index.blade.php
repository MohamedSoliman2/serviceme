@section('title', 'الخدمات')
@section('description', 'الخدمات')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">الخدمات</h4>
                        <div class="">
                            <a href="{{ route('services.create') }}" class="btn btn-primary">
                                <span class="uil uil-plus"></span>
                                إضافة خدمه
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
                                        <th>الخدمه</th>
                                        <th>الصورة</th>
                                        <th>المحافظة</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td><img src="{{ asset('storage/' . $service->image) }}"
                                                    alt="{{ $service->name }}" style="width: 50px; height: 50px;"></td>
                                            <td>{{ $service->governorate->name }}</td>
                                            <td class="d-flex gap-2">
                                                <a href="{{ route('services.edit', $service->id) }}"
                                                    class="btn btn-primary">تعديل</a>
                                                <form action="{{ route('services.destroy', $service->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center my-5">لا يوجد خدمات</td>
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