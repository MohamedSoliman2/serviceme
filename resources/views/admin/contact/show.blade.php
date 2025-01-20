@section('title', 'عرض الرساله')
@section('description', 'عرض الرساله')
@extends('layout.parentdash')
@section('content')
    <div class="crm mb-25">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-12 flex justify-content-between">
                    <div class="breadcrumb-main flex justify-content-between">
                        <h4 class="text-capitalize breadcrumb-title">عرض الرساله</h4>
                        <a href="{{ route('contacts.index') }}" class="btn btn-primary">الرسائل التي تم ارسالها</a>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="contact-details p-4">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <h5 class="text-muted mb-2">الاسم</h5>
                                            <p class="fs-5">{{ $contact->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <h5 class="text-muted mb-2">البريد الإلكتروني</h5>
                                            <p class="fs-5">{{ $contact->email }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="detail-item mb-4">
                                    <h5 class="text-muted mb-2">الموضوع</h5>
                                    <p class="fs-5">{{ $contact->subject }}</p>
                                </div>

                                <div class="detail-item">
                                    <h5 class="text-muted mb-2">الرسالة</h5>
                                    <div class="message-content p-3 bg-light rounded">
                                        <p class="fs-5">{{ $contact->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
