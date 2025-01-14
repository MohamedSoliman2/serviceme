@section('title', $title)
@section('description', $description)
@extends('layout.parentdash')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-breadcrumb">
                    <div class="breadcrumb-main add-contact justify-content-sm-between ">
                        <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center add-contact__title justify-content-center me-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">كل الخدمات
                                </h4>
                                <span class="sub-title ms-sm-25 ps-sm-25"></span>
                            </div>
                            <div class="action-btn mt-sm-0 mt-15">
                                <a href="{{ route('services.create') }}" class="btn px-20 btn-primary ">
                                    <i class="las la-plus fs-16"></i>اضافه خدمه
                                </a>

                            </div>
                          
                           
                        </div>
                        <div class="breadcrumb-main__wrapper">

                            <form action="{{route('customer.search')}}" class="d-flex align-items-center add-contact__form my-sm-0 my-2">
                                <img src="{{ asset('assets/img/svg/search.svg') }}" alt="search" class="svg">
                                <input class="form-control me-sm-2 border-0 box-shadow-none" type="search"
                                    placeholder="ابحث ب الرقم القومي" aria-label="Search" name="search">
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="card">
                    <div class="card-header color-dark fw-500">
                      كل الخدمات
                    </div>
                    <div class="card-body">
                        <div class="userDatatable global-shadow border-light-0 w-100">
                            <div class="table-responsive">
                                @if(Session::has('massage'))
                                <div class="alert-icon-big alert alert-success " role="alert">
                                    <div class="alert-icon">
                                        <img src="{{ asset('assets/img/svg/layers.svg') }}" alt="layers" class="svg">
                                    </div>
                                    <div class="alert-content">
                                        <h6 class='alert-heading'>{{trans('Success Tips')}}</h6>
                                        <p>{{trans(Session::get('massage'))}}</p>
                                    </div>
                                </div>
                                @endif
                                
                                @if(Session::has('warning'))
                                <div class="alert-icon-big alert alert-warning" role="alert">
                                    <div class="alert-icon">
                                        <img src="{{ asset('assets/img/svg/layers.svg') }}" alt="layers" class="svg">
                                    </div>
                                    <div class="alert-content">
                                        <h6 class='alert-heading'>{{trans('warning Tips')}}</h6>
                                        <p>{{trans(Session::get('warning'))}}</p>
                                    </div>
                                </div>
                                @endif
                                <table class="table mb-0 table-borderless">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            
                                            <th>
                                                <span class="userDatatable-title">اسم الخدمه</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">السعر</span>
                                            </th>
                                           
                                            <th>
                                                <span class="userDatatable-title">الحاله</span>
                                            </th>
                                           

                                            <th>
                                                <span class="userDatatable-title float-end">التحكم</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($services) == 0)
                                            <tr>
                                                <td colspan="7">
                                                    <p class="text-center">{{trans('No listings Found !')}}</p>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($services as $servic)
                                                @php
                                                    $has_profile_picture = ! empty( $servic->photo );
                                                @endphp
                                                <tr>
                                                   
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{    $servic->name }} 
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="userDatatable-content">
                                                            {{    $servic->price }}  
                                                        </div>
                                                    </td>
                                                    

                                                    <td>
                                                        <div class="userDatatable-content" style="color:{{$servic->status=='public'?'green':'red'}}">
                                                         {{$servic->status=="public"?"مفعل":"غير مفعل" }}
                                                        </div>
                                                    </td>

                                                  

                                                    
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            
                                                          

                                                            <li>
                                                                <a href="{{ route('services.edit', $servic->id) }}"
                                                                    class="edit">
                                                                    <i class="uil uil-edit"></i>
                                                                </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination-container d-flex justify-content-end pt-25">
                            {{ $services->links( 'pagination::bootstrap-5' ) }}

                            <ul class="dm-pagination d-flex">
                                <li class="dm-pagination__item">
                                    <div class="paging-option">
                                        <select name="page-number" class="page-selection" onchange="updatePagination( event )">
                                            <option value="20" {{ 20 == $services->perPage() ? 'selected' : '' }}>20/page</option>
                                            <option value="40" {{ 40 == $services->perPage() ? 'selected' : '' }}>40/page</option>
                                            <option value="60" {{ 60 == $services->perPage() ? 'selected' : '' }}>60/page</option>
                                        </select>
                                        <a href="/pagination-per-page/20" class="d-none per-page-pagination"></a>
                                    </div>
                                </li>
                            </ul>

                            <script>
                                function updatePagination( event ) {
                                    var per_page = event.target.value;

                                    const per_page_link = document.querySelector( '.per-page-pagination' );
                                    per_page_link.setAttribute( 'href', '/pagination-per-page/' + per_page  );

                                    per_page_link.click();
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
