@section('title', 'الاسئله الشائعه')
@section('description', 'الاسئله الشائعه')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">الاسئله الشائعه</h4>
                        <div class="">
                            <a href="{{ route('faqs.create') }}" class="btn btn-primary">
                                <span class="uil uil-plus"></span>
                                إضافة اسئله
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
                                            <span class="userDatatable-title">السؤال</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">الإجراءات</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($faqs as $faq)
                                        <tr>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    {{ $faq->question }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content d-flex gap-2">
                                                    <a href="{{ route('faqs.edit', $faq->id) }}"
                                                        class="btn btn-primary">تعديل</a>
                                                    <form action="{{ route('faqs.destroy', $faq->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">لا يوجد اسئله</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="pagination-container d-flex justify-content-end pt-25">
                                {{ $faqs->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
