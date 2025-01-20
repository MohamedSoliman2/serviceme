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
                                <h4 class="text-capitalize fw-500 breadcrumb-title">صفحه عنا</h4>
                                <span class="sub-title ms-sm-25 ps-sm-25"></span>
                            </div>
                            @if (count($about)==0)
                            <div class="action-btn mt-sm-0 mt-15">
                                <a href="{{ route('about.create') }}" class="btn px-20 btn-primary ">
                                    <i class="las la-plus fs-16"></i>اضافه صفحه عنا
                                </a>

                            </div>
                            @endif
                          
                           
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="card">
                    <div class="card-header color-dark fw-500">
                        صفحه عنا
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
                                                <span class="userDatatable-title"> عنا</span>
                                            </th>
    
                                            <th>
                                                <span class="userDatatable-title float-end">التحكم</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($about) == 0)
                                            <tr>
                                                <td colspan="7">
                                                    <p class="text-center">{{trans('قم باضافه صفحه عنا')}}</p>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($about as $one)
                                             
                                                <tr>
                                                   
                                                    <td>
                                                        <div class="userDatatable-content" style="width: 750px;overflow: hidden;max-height: 90px;">
                                                            {!! $one->description !!} 
                                                        </div>
                                                    </td>
                                                   

                                                  

                                                    
                                                    <td>
                                                        <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                            
                                                          

                                                            <li>
                                                                <a href="{{ route('about.edit', $one->id) }}"
                                                                    class="edit">
                                                                    <i class="uil uil-edit"></i>
                                                                </a>

                                                                 <li>
                                                                <a
                                                                    href="#"
                                                                    class="remove"
                                                                    onclick="
                                                                        event.preventDefault();
                                                                        if ( confirm('Are you sure you want to delete ?') ) {
                                                                            document.getElementById( 'delete-{{ $one->id }}' ).submit();
                                                                        }
                                                                    "
                                                                >
                                                                    <i class="uil uil-trash-alt"></i>
                                                                </a>

                                                                <form style="display:none;" id="delete-{{ $one->id }}"
                                                                    action="{{ route('about.delete',$one->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('post')
                                                                </form>
                                                            </li>
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

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
