<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - EDY PAY</title>
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
                                <img class="light" src="{{ asset('assets/img/450a6baf-ecc1-446f-89de-0dc00f1a4434-removebg-preview (1).png') }}" alt="" width="260px">
                                <img class="dark" src="{{ asset('assets/img/1.png') }}" alt="">
                            </div>
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>Forgot Password?</h6>
                                    </div>
                                </div>
                                <form action="{{route('returnpassword')}}" method="post">
                                    @csrf
                                    @if(Session::has('massage'))
                                    <div class="alert-icon-big alert alert-warning " role="alert">
                                        <div class="alert-icon">
                                            <img src="{{ asset('assets/img/svg/layers.svg') }}" alt="layers" class="svg">
                                        </div>
                                        <div class="alert-content">
                                            <h6 class='alert-heading'>warning Tips</h6>
                                            <p>{{Session::get('massage')}}</p>
                                        </div>
                                    </div>
                                    @endif
                                <div class="card-body">
                                    <div class="edit-profile__body">
                                        <p>Enter the phone you used when you joined and we'll send you number to reset your password.</p>
                                        <div class="form-group mb-20">
                                            <label for="email">phone number</label>
                                            <input type="text" class="form-control" name="phone" id="email" placeholder="************" required>
                                            @if($errors->has('phone'))
                                                  <p class="text-danger">{{ $errors->first('phone') }}</p>
                                                @endif
                                        </div>
                                        <div class="d-flex">
                                            <button class="btn btn-primary btn-default btn-squared text-capitalize lh-normal px-md-50 py-15 signIn-createBtn">
                                                reset password 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </form>
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
