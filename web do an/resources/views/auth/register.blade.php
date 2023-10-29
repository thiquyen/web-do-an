<!DOCTYPE html>
<html lang="en">
    <!-- Custom fonts for this template-->
    <link href=" {{ asset('/admin12/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('/admin12/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin12/css/sb-admin-2.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <x-guest-layout>
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- Name -->
                                <div class="form-group">
                                        <input class="form-control form-control-user"  id="name"  type="text" name="name" :value="old('name')"
                                            placeholder="Full Name"  required autofocus>
                                </div>

                                <!-- Email Address -->
                                <div class="form-group">
                                    <input class="form-control form-control-user" id="email" name="email" :value="old('email')" required id="email" type="text" name="email" :value="old('email')" required 
                                        placeholder="Email Address">
                                </div>

                                <!-- Password -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input class="form-control form-control-user"id="password"type="password" name="password" required autocomplete="new-password" placeholder="Password">
                                    </div>
                                    <!-- Confirm Password -->
                                    <div class="col-sm-6">
                                        <input class="form-control form-control-user" id="password_confirmation" type="password" name="password_confirmation" placeholder="Repeat Password" required >
                                    </div>
                                </div>
                                <x-button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Register') }}</x-button>
                            </form>
                            </x-guest-layout>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}"> Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/admin12/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin12/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/admin12/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/admin12/js/sb-admin-2.min.js') }}"></script>

</body>

</html>


                               
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

