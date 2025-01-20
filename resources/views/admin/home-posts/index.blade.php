@section('title', 'منشورات الصفحه الرئيسية')
@section('description', 'منشورات الصفحه الرئيسية')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">منشورات الصفحه الرئيسية</h4>
                        <div class="">
                            <a href="{{ route('home-posts.create') }}" class="btn btn-primary">
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
                                            <span class="userDatatable-title">المنشور</span>
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
                                    @forelse ($posts as $post)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $post->title }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    @if ($post->image)
                                                        <img src="{{ asset('storage/' . $post->image) }}"
                                                            alt="{{ $post->title }}" style="width: 50px; height: 50px;">
                                                    @else
                                                        <p class="text-danger">لا يوجد صورة</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-flex gap-2">
                                                    <a href="{{ route('home-posts.edit', $post->id) }}"
                                                        class="btn btn-primary">تعديل</a>
                                                    <form action="{{ route('home-posts.destroy', $post->id) }}"
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
                                            <td colspan="5" class="text-center my-5">لا يوجد منشورات</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="pagination-container d-flex justify-content-end pt-25">
                                {{ $posts->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
