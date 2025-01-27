<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register - Beauty</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/variables.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.0/css/line.css">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/1.png') }}">
</head>
<body>
    <main class="main-content">
        <div class="admin" style="background-image:url({{ asset('assets/img/admin-bg-light.png') }});">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                        <div class="edit-profile">
                            <div class="edit-profile__logos">
                              <h3>Beauty </h3>
                            </div>
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
         <h6>Sign Up Beauty</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="edit-profile__body">
                                         


                                            <div class="form-group mb-20">
                                                <label for="name">name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="full name" value="{{old('name')}}" required>
                                                @if($errors->has('name'))
                                                <p class="text-danger">{{ $errors->first('name') }}</p>  
                                                @endif
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="city">city</label>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="city" value="{{old('city')}}" required>
                                                @if($errors->has('city'))
                                                <p class="text-danger">{{ $errors->first('city') }}</p>  
                                                @endif
                                            </div>
                                            <div class="form-group mb-20" >
                                                <label for="national_id">national id</label>
                                                <input type="number" class="form-control" name="national_id" id="national_id" placeholder="national_id" value="{{old('national_id')}}" required >
                                                @if($errors->has('national_id'))
                                                  <p class="text-danger">{{ $errors->first('national_id') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mb-20" style="position: relative;">
                                                <label for="phone">phone number</label>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" value="{{old('phone')}}" required style="padding-left: 72px;">
                                                <p style="background-color: #ffffff;color: blue;padding: 7px 12px;position: absolute;top: 44%;left: 1%;height: 40px;">+970</p>
                                                @if($errors->has('phone'))
                                                  <p class="text-danger">{{ $errors->first('phone') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mb-20">
                                                <label for="email">Email Adress</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address" value="{{old('email')}}" required>
                                                @if($errors->has('email'))
                                                  <p class="text-danger">{{ $errors->first('email') }}</p>
                                                @endif
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password-field">password</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}" required>
                                                    <span toggle="#password-field" class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2"></span>
                                                </div>
                                                @if($errors->has('password'))
                                                  <p class="text-danger">{{ $errors->first('password') }}</p>
                                                @endif
                                            </div>
                                            
                                        
                                            <div class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                    Create Account
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              
                                <div class="admin-topbar">
                                    <p class="mb-0">
                                        Have An Account?
                                        <a href="{{ route('login') }}" class="color-primary">
                                            Sign In
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="overlayer">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>
    <div class="enable-dark-mode dark-trigger">
        <ul>
            <li>
                <a href="#">
                    <i class="uil uil-moon"></i>
                </a>
            </li>
        </ul>
    </div>
    <script src="{{ asset('assets/js/plugins.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.min.js') }}"></script>
</body>
</html>
