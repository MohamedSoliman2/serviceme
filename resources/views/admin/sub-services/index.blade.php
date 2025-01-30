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
                            <table class="table mb-0 table-borderless">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title">#</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">الخدمه الرئيسية</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">الخدمه الفرعية</span>
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
                                    @forelse ($subservices as $subservice)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $subservice->parent->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $subservice->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    <img src="{{ asset('storage/' . $subservice->image) }}"
                                                        alt="{{ $subservice->name }}" style="width: 50px; height: 50px;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-flex gap-2">
                                                    <a href="{{ route('sub-services.edit', $subservice->id) }}"
                                                        class="btn btn-primary">تعديل</a>
                                                    <form action="{{ route('sub-services.destroy', $subservice->id) }}"
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
                                            <td colspan="6" class="text-center my-5">لا يوجد خدمات فرعية</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="pagination-container d-flex justify-content-end pt-25">
                                {{ $subservices->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
