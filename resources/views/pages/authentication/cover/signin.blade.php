<x-base-layout :scrollspy="false">
    <x-slot:pageTitle>
        {{$title}}
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/authentication/auth-cover.scss'])
        @vite(['resources/scss/dark/assets/authentication/auth-cover.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">

            <div class="row">

                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>

                    <div class="auth-cover">
                        <div class="position-relative">
                            <img src="{{ Vite::asset('resources/images/auth-cover.svg') }}" alt="auth-img">
                            <h2 class="mt-5 text-white font-weight-bolder px-2">Welcome Back!</h2>
                            <p class="text-white px-2">Continue to simplify your tasks with our efficient CRM.</p>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <h2>Sign In</h2>
                                    <p>Enter your email and password to login</p>
                                </div>
                                <div class="col-md-12">
                                @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul style="margin: 0;">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('signin') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check form-check-primary form-check-inline">
                                                <input class="form-check-input me-3" type="checkbox" id="form-check-default" name="remember">
                                                <label class="form-check-label" for="form-check-default">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-12 mb-4">
                                    <div class="">
                                        <div class="seperator">
                                            <hr>
                                            <div class="seperator-text"> <span>Or continue with</span></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-social-login w-100">
                                            <img src="{{ Vite::asset('resources/images/google-gmail.svg') }}" alt="" class="img-fluid">
                                            <span class="btn-text-inner">Google</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-social-login w-100">
                                            <img src="{{ Vite::asset('resources/images/github-icon.svg') }}" alt="" class="img-fluid">
                                            <span class="btn-text-inner">Github</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-12">
                                    <div class="mb-4">
                                        <button class="btn btn-social-login w-100">
                                            <img src="{{ Vite::asset('resources/images/twitter.svg') }}" alt="" class="img-fluid">
                                            <span class="btn-text-inner">Twitter</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="text-center">
                                        <p class="mb-0">Don't have an account? <a href="/light-menu/authentication/cover/signup" class="text-warning">Sign Up</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        <!-- Add any custom scripts if necessary -->
    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>
