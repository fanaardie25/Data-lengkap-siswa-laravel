<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Dashcode - HTML Template</title>
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->
</head>

<body class=" font-inter skin-default">
    <!-- [if IE]> <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p> <![endif] -->

    <div class="loginwrapper">
        <div class="lg-inner-column">
            <div class="left-column relative z-[1]">
                <div class="max-w-[520px] pt-20 ltr:pl-20 rtl:pr-20">
                    <a href="index.html">
                        <img src="{{ asset('logo nusa blog.jpg') }}" alt="logo nusa blog" height="80px" width="80px">
                    </a>
                    <h4>
                        Unlock your Project
                        <span class="text-slate-800 dark:text-slate-400 font-bold">
                            performance
                        </span>
                    </h4>
                </div>
                <div class="absolute left-0 2xl:bottom-[-160px] bottom-[-130px] h-full w-full z-[-1]">
                    <img src="assets/images/auth/ils1.svg" alt="" class=" h-full w-full object-contain">
                </div>
            </div>
            <div class="right-column  relative">
                <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
                    <div class="auth-box h-full flex flex-col justify-center">
                        <div class="mobile-logo text-center mb-6 lg:hidden block">
                            <a href="index.html">
                                <img src="{ asset('logo nusa blog.jpg') }}" alt="" class="mb-10 white_logo">
                            </a>
                        </div>
                        <div class="text-center 2xl:mb-10 mb-4">
                            <h4 class="font-medium">Sign in</h4>
                            <div class="text-slate-500 text-base">
                                Sign in to your account to start using Dashcode
                            </div>
                        </div>
                        <!-- BEGIN: Login Form -->
                        <form class="space-y-4" action='{{ route('login.post') }}' method="POST">
                            @csrf
                            <div class="fromGroup">
                                <label class="block capitalize form-label">email</label>
                                <div class="relative ">
                                    <input type="email" name="email" class="  form-control py-2">
                                </div>
                            </div>
                            <div class="fromGroup       ">
                                <label class="block capitalize form-label  ">password</label>
                                <div class="relative "><input type="password" name="password"
                                        class="  form-control py-2   ">
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" class="hiddens">
                                    <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">Keep
                                        me signed in</span>
                                </label>
                                <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium"
                                    href="{{ route('password.request') }}">Forgot
                                    Password?
                                </a>
                            </div>
                            <button type="submit" class="btn btn-dark block w-full text-center">Sign in</button>
                        </form>
                        <!-- END: Login Form -->
                        <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                            <div
                                class="absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                    px-4 min-w-max text-sm text-slate-500 font-normal">
                                Or continue with
                            </div>
                        </div>
                        <!-- BEGIN: Social Log in Area -->
                        <div class="max-w-[242px] mx-auto mt-8 w-full ">
                        <ul class="flex justify-center gap-4">
                          {{-- login facebook --}}
                            <li>
                                <a href="{{ route('socialite.redirect','facebook') }}"
                                    class="inline-flex h-10 w-10 bg-[#395599] text-white text-2xl flex-col items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" id="facebook">
                                      <path fill="#1877f2" d="M1024,512C1024,229.23016,794.76978,0,512,0S0,229.23016,0,512c0,255.554,187.231,467.37012,432,505.77777V660H302V512H432V399.2C432,270.87982,508.43854,200,625.38922,200,681.40765,200,740,210,740,210V336H675.43713C611.83508,336,592,375.46667,592,415.95728V512H734L711.3,660H592v357.77777C836.769,979.37012,1024,767.554,1024,512Z"></path>
                                      <path fill="#fff" d="M711.3,660,734,512H592V415.95728C592,375.46667,611.83508,336,675.43713,336H740V210s-58.59235-10-114.61078-10C508.43854,200,432,270.87982,432,399.2V512H302V660H432v357.77777a517.39619,517.39619,0,0,0,160,0V660Z"></path>
                                    </svg>
                                </a>
                            </li>
                            {{-- login google --}}
                            <li >
                                <a href="{{ route('socialite.redirect','google') }}"
                                    class="inline-flex h-10 w-10 bg-[#EA4335] text-white text-2xl flex-col items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="google" viewBox="-380.2 274.7 65.7 65.8">
                                      <circle cx="-347.3" cy="307.6" r="32.9" style="fill:#e0e0e0"></circle>
                                      <circle cx="-347.3" cy="307.1" r="32.4" style="fill:#fff"></circle>
                                      <g>
                                        <defs>
                                          <path id="SVGID_1_" d="M-326.3 303.3h-20.5v8.5h11.8c-1.1 5.4-5.7 8.5-11.8 8.5-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4c-3.9-3.4-8.9-5.5-14.5-5.5-12.2 0-22 9.8-22 22s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"></path>
                                        </defs>
                                        <clipPath id="SVGID_2_">
                                          <use xlink:href="#SVGID_1_" overflow="visible"></use>
                                        </clipPath>
                                        <path d="M-370.8 320.3v-26l17 13z" style="clip-path:url(#SVGID_2_);fill:#fbbc05"></path>
                                        <defs>
                                          <path id="SVGID_3_" d="M-326.3 303.3h-20.5v8.5h11.8c-1.1 5.4-5.7 8.5-11.8 8.5-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4c-3.9-3.4-8.9-5.5-14.5-5.5-12.2 0-22 9.8-22 22s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"></path>
                                        </defs>
                                        <clipPath id="SVGID_4_">
                                          <use xlink:href="#SVGID_3_" overflow="visible"></use>
                                        </clipPath>
                                        <path d="M-370.8 294.3l17 13 7-6.1 24-3.9v-14h-48z" style="clip-path:url(#SVGID_4_);fill:#ea4335"></path>
                                        <g>
                                          <defs>
                                            <path id="SVGID_5_" d="M-326.3 303.3h-20.5v8.5h11.8c-1.1 5.4-5.7 8.5-11.8 8.5-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4c-3.9-3.4-8.9-5.5-14.5-5.5-12.2 0-22 9.8-22 22s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"></path>
                                          </defs>
                                          <clipPath id="SVGID_6_">
                                            <use xlink:href="#SVGID_5_" overflow="visible"></use>
                                          </clipPath>
                                          <path d="M-370.8 320.3l30-23 7.9 1 10.1-15v48h-48z" style="clip-path:url(#SVGID_6_);fill:#34a853"></path>
                                        </g>
                                        <g>
                                          <defs>
                                            <path id="SVGID_7_" d="M-326.3 303.3h-20.5v8.5h11.8c-1.1 5.4-5.7 8.5-11.8 8.5-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4c-3.9-3.4-8.9-5.5-14.5-5.5-12.2 0-22 9.8-22 22s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"></path>
                                          </defs>
                                          <clipPath id="SVGID_8_">
                                            <use xlink:href="#SVGID_7_" overflow="visible"></use>
                                          </clipPath>
                                          <path d="M-322.8 331.3l-31-24-4-3 35-10z" style="clip-path:url(#SVGID_8_);fill:#4285f4"></path>
                                        </g>
                                      </g>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                        </div>
                        <!-- END: Social Log In Area -->
                        <div
                            class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-12 uppercase text-sm">
                            Don’t have an account?
                            <a href="{{ route('register') }}"
                                class="text-slate-900 dark:text-white font-medium hover:underline">
                                Sign up
                            </a>
                        </div>
                    </div>
                    <div class="auth-footer text-center">
                        Copyright 2025, Nusa Blog All Rights Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/rt-plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (@session('success'))
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $item)


                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "{{ $item }}",
                });
            @endforeach
        @endif
    </script>
</body>

</html>
