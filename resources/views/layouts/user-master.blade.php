<!DOCTYPE html >
<html lang="{{ request()->segment(1) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}@isset($title) - {{ $title }}@endisset</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('user/images/logo.png')}}">
    <meta name="description" content="Imaji Sociopreneur lahir dari mimpi kami mewujudkan Sektor sosial ekonomi yang berkarakter kerakyatan dan kreatif, sebuah sistem dan model ekonomi baru." >
    <meta name="title" content="Imaji Sociopreneur | Aksikan mimpimoe ...!!!">
    <meta name="keywords" content="imaji, sociopreneur, ALP Village, program bina desa, desa maju, desaku, desa indah, pendidikan, woman em power" >
    <meta content="width=device-width, initial-scale=1" name="viewport">
    @isset($meta)
        {{ $meta }}
    @endisset
    <link rel="alternate" hreflang="en-ID" href="https://tools.cmlabs.co/en/page-title-meta-description-checker">
    <link rel=“stylesheet” href=“https://use.fontawesome.com/releases/v5.5.0/css/all.css”
          integrity=“sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU” crossorigin=“anonymous”>
    <script src="https://kit.fontawesome.com/3011883c39.js" crossorigin="anonymous"></script>
    <link href="{{asset('user/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/animations.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/fonts.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/main.css')}}" rel="stylesheet" class="color-switcher-link">
    <link rel="stylesheet" href="{{asset('user/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontpage/css/main-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontpage/css/responsive-style.css')}}">
    @isset($styles)
        {{ $styles }}
    @endisset
    <script src="{{asset('user/js/vendor/modernizr-2.6.2.min.js')}}"></script>
    <script src="{{asset('user/js/vendor/html5shiv.min.js')}}"></script>
    <script src="{{asset('user/js/vendor/respond.min.js')}}"></script>
    <script src="{{asset('user/js/vendor/jquery-1.12.4.min.js')}}"></script>


</head>

<body>


<!-- wrappers for visual page editor and boxed version of template -->
<div id="canvas">
    <div id="box_wrapper">

        <section class="page_topline cs two_color section_padding_top_5 section_padding_bottom_5 table_section">
            <div class="container-fluid" style="background-color: #161c29 !important;">
                <div class="row">
                    <div class="col-sm-6 text-center text-sm-left">
                        <p class="divided-content">
					<span class="medium black">
						Selamat datang di Imaji Sociopreneur
					</span>

                        </p>
                    </div>
                    <div class="col-sm-6 text-center text-sm-right">

                        <div class="widget widget_search">
                            <form action="{{route('search',Request::segment(1))}}" class="form-inline" method="post">
                                @csrf
                                <div class="form-group-wrap">
                                    <div class="form-group margin_0">
                                        <label class="sr-only" for="topline-search">Search for:</label>
                                        <input class="form-control" id="topline-search" name="search"
                                               placeholder="Search Keyword"
                                               type="text" value="">
                                    </div>
                                    <button class="theme_button" type="submit">Search</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        @include('partial-user.header')

        {{$slot}}
        <section class="ls page_copyright" style="background-color: #0f0f0f">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <p class="small-text small-spacing text-white" style="color: white">&copy; Copyright Imaji Sociopreneur 2020 All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- eof #box_wrapper -->
</div>
<!-- eof #canvas -->
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-analytics.js"></script>

<script>
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyB63nxhNlJLfIBLFSywiVzvzZin3-AD_R8",
        authDomain: "imaji-sociopreneur.firebaseapp.com",
        projectId: "imaji-sociopreneur",
        storageBucket: "imaji-sociopreneur.appspot.com",
        messagingSenderId: "236983384404",
        appId: "1:236983384404:web:19f117f377a6ae645af0c1",
        measurementId: "G-G0NS6DRWHS"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
<script src="{{asset('user/js/compressed.js')}}"></script>
<script src="{{asset('user/js/main.js')}}"></script>
<script src="{{asset('user/js/switcher.js')}}"></script>

@isset($script)
    {{ $script }}
@endisset
</body>
</html>
