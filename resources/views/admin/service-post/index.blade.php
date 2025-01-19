@section('title', 'منشورات الخدمات')
@section('description', 'منشورات الخدمات')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">منشورات الخدمات</h4>
                        <div class="">
                            <a href="{{ route('service-posts.create') }}" class="btn btn-primary">
                                <span class="uil uil-plus"></span>
                                إضافة منشور
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
                            <table class="table mb-0 table-borderless">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title">#</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">الخدمه</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">العنوان</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">الصورة</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">الإجراءات</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($servicePosts as $servicePost)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $servicePost->service->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $servicePost->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    @if ($servicePost->image)
                                                        <img src="{{ asset('storage/' . $servicePost->image) }}"
                                                            alt="{{ $servicePost->service->name }}"
                                                            style="width: 50px; height: 50px;">
                                                    @else
                                                        <span class="text-danger">لا يوجد صورة</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-flex gap-2">
                                                    <a href="{{ route('service-posts.edit', $servicePost->id) }}"
                                                        class="btn btn-primary">تعديل</a>
                                                    <form action="{{ route('service-posts.destroy', $servicePost->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center my-5">لا يوجد منشورات</td>
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
