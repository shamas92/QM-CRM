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
                                    <img src="{{Vite::asset('resources/images/auth-cover.svg')}}" alt="auth-img">
                                    <h2 class="mt-5 text-white font-weight-bolder px-2">Start Your Journey With Us!</h2>
                                    <p class="text-white px-2">Experience our user-friendly CRM designed to streamline your workflow.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h2>Sign Up</h2>
                                            <p>Enter your details to register</p>
                                        </div>
                                        <div class="col-md-12">
                                        @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul style="margin: 0;">
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            <form method="POST" action="{{ route('signup') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control add-billing-address-input" required pattern="[A-Za-z\s]{1,}" title="Name should only contain letters and spaces.">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="tel" name="phone" class="form-control" required pattern="[0-9]{11}" title="Phone number should be 11 digits.">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control" required minlength="8">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" class="form-control" required minlength="8">
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-check form-check-primary form-check-inline">
                                                        <input class="form-check-input me-3" type="checkbox" id="form-check-default" required>
                                                        <label class="form-check-label" for="form-check-default">
                                                            I agree to the <a href="javascript:void(0);" class="text-primary">Terms and Conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-4">
                                                    <button type="submit" class="btn btn-secondary w-100">SIGN UP</button>
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
                                                <button class="btn btn-social-login w-100 ">
                                                    <img src="{{Vite::asset('resources/images/google-gmail.svg')}}" alt="" class="img-fluid">
                                                    <span class="btn-text-inner">Google</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-12">
                                            <div class="mb-4">
                                                <button class="btn btn-social-login w-100">
                                                    <img src="{{Vite::asset('resources/images/github-icon.svg')}}" alt="" class="img-fluid">
                                                    <span class="btn-text-inner">Github</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-sm-4 col-12">
                                            <div class="mb-4">
                                                <button class="btn btn-social-login w-100">
                                                    <img src="{{Vite::asset('resources/images/twitter.svg')}}" alt="" class="img-fluid">
                                                    <span class="btn-text-inner">Twitter</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="text-center">
                                                <p class="mb-0">Already have an account? <a href="/light-menu/authentication/cover/signin" class="text-warning">Sign in</a></p>
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