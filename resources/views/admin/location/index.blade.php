@section('title', 'منشورات صفحه العناوين')
@section('description', 'منشورات صفحه العناوين')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title" >منشورات صفحه العناوين </h4>
                        
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
                                   @if ($post)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    1
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
                                                        <img src="{{url('/').'/../storage/app/public/'.$post->image}}"
                                                            alt="{{ $post->title }}" style="width: 50px; height: 50px;">
                                                    @else
                                                        <p class="text-danger">لا يوجد صورة</p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-flex gap-2">
                                                    <a href="{{ route('location.edit', $post->id) }}"
                                                        class="btn btn-primary">تعديل</a>
                                                   
                                                </div>
                                            </td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td colspan="4" style="text-align:center;">
لا يوجد اي منشور
                                            </td>
                                        </tr>
                                   @endif
                                </tbody>
                            </table>
                          
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
