@section('title', $title)
@section('description', $description)
@extends('layout.parentdash')
@section('content')
<div class="crm mb-25">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">لوحه التحكم</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i> المسئول</a></li>
                                <li class="breadcrumb-item active" aria-current="page">لوحه التحكم</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @include('components.dashboard.demo_one.analisiys')
            
            
        </div>
    </div>
</div>
@endsection