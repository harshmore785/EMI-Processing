<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>

        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row">
                                <img src="{{asset('img/logo.png')}}" class="logo">
                            </div>
                            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                                <img src="{{asset('img/company.png')}}" class="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form method="POST" class="mt-5" action="{{ route('post-login') }}">
                            @csrf
                            <div class="card2 card border-0 px-4 py-5">
                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">User Name</h6>
                                    </label>
                                    @error('username')
                                        <div class="text-danger w-100">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <input class="mb-4 @error('username') is-invalid @enderror" type="text" name="username" placeholder="Enter username"  id="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                </div>
                                <div class="row px-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Password</h6>
                                    </label>
                                    @error('password')
                                        <div class="text-danger w-100">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <input type="password" id="password" name="password" class=" @error('password') is-invalid @enderror" placeholder="Enter password" required autocomplete="off">
                                </div>
                                <div class="row mb-3 mt-2 px-3">
                                    <button type="submit" class="btn btn-blue text-center">
                                        Login
                                    </button>
                                </div>
                                {{-- <div class="row mb-4 px-3">
                                    <p class="font-weight-bold">Don't have an account? &nbsp;&nbsp;&nbsp;<a class="text-danger" href="{{url('/register')}}">Register</a></p>
                                </div> --}}

                                {{-- <div class="row px-3 mb-4">
                                    <div class="line"></div>
                                        <small class="or text-center">Or</small>
                                    <div class="line"></div>
                                </div> --}}

                                {{-- <div class="row mb-4 px-3 d-flex justify-content-center">
                                    <div class="facebook text-center mr-3"><div class="fa fa-facebook"></div></div>
                                    <div class="twitter text-center mr-3"><div class="fa fa-twitter"></div></div>
                                    <div class="linkedin text-center mr-3"><div class="fa fa-linkedin"></div></div>
                                </div> --}}


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>