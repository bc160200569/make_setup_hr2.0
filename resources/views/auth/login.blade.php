<x-guest-layout>


    <div class="auth-wrapper align-items-stretch aut-bg-img">
        <div class="flex-grow-1">
            <div class="h-100 d-md-flex align-items-center auth-side-img">
                <div class="col-sm-10 auth-content w-auto">
                    <img src="{{asset('images/auth-logo.png')}}" alt="" class="img-fluid">
                    <h1 class="text-white my-4">Welcome Back!</h1>
                    <h4 class="text-white font-weight-normal">Signin to your account and get explore the Gradient able Dashboard Template.<br/>Do not forget to play with live customizer</h4>
                </div>
            </div>
            <div class="auth-side-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div class=" auth-content">
                        <img src="{{asset('images/auth-logo-dark.png')}}" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none">
                        <h3 class="mb-4 f-w-400">Signin</h3>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="feather icon-mail"></i></span>
                            <input id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" type="email" name="email" :value="old('email')" autofocus />
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text"><i class="feather icon-lock"></i></span>
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="current-password" placeholder="Password" />
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        {{--<!-- <div class="form-group text-left mt-2">
                            <div class="checkbox checkbox-primary d-inline">
                                <input id="remember_me" type="checkbox" name="remember">
                                <label for="remember_me" class="cr">Save credentials</label>
                            </div>
                        </div> -->--}}
                        <button class="btn btn-block btn-primary mt-2 mb-0">Signin</button>
                        {{--<div class="text-center">
                            <div class="saprator my-4"><span>OR</span></div>
                            <button class="btn text-white bg-facebook mb-2 me-2  wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-facebook-f"></i></button>
                            <button class="btn text-white bg-googleplus mb-2 me-2 wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-google-plus-g"></i></button>
                            <button class="btn text-white bg-twitter mb-2  wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-twitter"></i></button>
                            <!--<p class="mb-2 mt-4 text-muted">Forgot password? <a href="auth-reset-password-img-side.html" class="f-w-400">Reset</a></p>-->
                            <!--<p class="mb-0 text-muted">Don�t have an account? <a href="auth-signup-img-side.html" class="f-w-400">Signup</a></p>-->
                        </div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>




    {{--
        <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!--Session Status--> 
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!--Validation Errors--> 
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!--Email Address--> 
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!--Password--> 
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="current-password" />
            </div>

            <!--Remember Me--> 
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    --}}
</x-guest-layout>
