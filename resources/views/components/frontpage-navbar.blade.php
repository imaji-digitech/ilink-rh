<!-- header start -->
<header class="header">
    <div class="header-wrapper">
        <!--sidebar menu toggler start -->
        <div class="toggle-sidebar material-button">
            <i class="material-icons">&#xE5D2;</i>
        </div>
        <!--sidebar menu toggler end -->
        <!--logo start -->
        <div class="logo-box">
            <h1>
                <a href="{{route('index',request()->segment(1))}}" class="logo"></a>
            </h1>
        </div>
        <!--logo end -->
        <div class="header-menu">

            <!-- header left menu start -->
            <ul class="header-navigation" data-show-menu-on-mobile>
                <li>
                    <a href="{{route('index',request()->segment(1))}}"
                       class="material-button">{{__('general.home')}}</a>
                </li>
                <li>
                    <a href="#" class="material-button submenu-toggle">{{__('general.feature')}}<i
                            class="material-icons">&#xE313;</i></a>
                    <div class="header-submenu">
                        <ul>
                            <li><a href="https://imajisociopreneur.com">Sociopreneur Community</a></li>
                            <li>
                                <a href="{{ route('content.show',[request()->segment(1),'imaji-academy-2021-kami-mengajar-kami-belajar']) }}">
                                    Imaji Academy
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('content.show',[request()->segment(1),'imaji-lingkungan-ubah-sampah-jadi-berkah']) }}">
                                    Imaji Lingkungan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('content.show',[request()->segment(1),'alp-village-hapus-pekerja-anak-dan-wujudkan-kemandirian-di-desa']) }}">
                                    ALP Village
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{route('event.index',request()->segment(1))}}"
                       class="material-button">{{__('general.event')}}</a>
                </li>
                <li>
                    <a href="{{ route('imaji-sociopreneur',request()->segment(1))  }}"
                       class="material-button ">{{__('general.about-us')}}</a>
                </li>

                <li>
                    <a href="{{route('on-news',request()->segment(1))}}#"
                       class="material-button">{{__('general.on-new')}}</a>
                </li>

                <li>
                    <a href="#" class="material-button submenu-toggle">
                        Artikel <i class="material-icons mx-auto">&#xE313;</i>
                    </a>
                    <div class="header-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('blog.index',request()->segment(1)) }}"
                                   class="material-button">
                                    {{__('general.blog')}}</a>
                            </li>
                            <li>
                                <a href="{{ route('project.index',request()->segment(1)) }}"
                                   class="material-button">{{__('general.project')}}</a>
                            </li>
                            <li>
                                <a href="{{ route('faq',request()->segment(1)) }}"
                                   class="material-button">{{__('general.faq')}}</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="material-button submenu-toggle">
                        File Download <i class="material-icons mx-auto">&#xE313;</i>
                    </a>
                    <div class="header-submenu">
                        <ul>
                            <li>
                                <a class="material-button" href="{{ route('collaboration-file',request()->segment(1)) }}">
                                    Surat Kerjasama
                                </a>
                            </li>
                            <li>
                                <a class="material-button" href="{{ route('article',request()->segment(1)) }}">
                                    Apresiasi
                                </a>
                            </li>
                            <li>
                                <a class="material-button" href="{{ route('documentation-request',request()->segment(1)) }}">
                                    Dokumentasi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#" class="material-button submenu-toggle" style="vertical-align: center">
                        {{request()->segment(1)}}
                        <img src="{{asset('assets/'.request()->segment(1).'.svg')}}" alt=""
                             style="width: 25px; vertical-align: center"> <i class="material-icons mx-auto">&#xE313;</i>
                    </a>
                    <div class="header-submenu">
                        <ul>
                            <li>
                                <a href="{{route('index','id') }}"><img
                                        src="{{asset('assets/id.svg')}}" alt="" style="width: 20px"> Indonesia
                                </a>
                            </li>
                            <li>
                                <a href="{{route('index','en') }}"><img
                                        src="{{asset('assets/en.svg')}}" alt="" style="width: 20px"> English
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="header-right with-seperator">
            <ul class="header-navigation">
                {{--                <li>--}}
                {{--                    <a href="" class="material-button search-toggle"><i class="material-icons">&#xE8B6;</i></a>--}}
                {{--                </li>--}}
                <li>
                    <a href="" class="material-button submenu-toggle"><i class="material-icons">&#xE7FD;</i> <span
                            class="hide-on-tablet">Account</span></a>
                    <div class="header-submenu">
                        <ul>
                            <li><a href="{{route('login')}}">Login</a></li>
                            {{--                            <li><a href="index2.html#" data-modal="registerModal">Register</a></li>--}}
                        </ul>
                    </div>
                </li>
                {{--                <li class="hide-on-mobile"><a href="index2.html#" class="material-button"--}}
                {{--                                              data-modal="newsletterModal"><i class="material-icons">&#xE0E1;</i></a>--}}
                {{--                </li>--}}
            </ul>
            <!-- header right menu end -->

        </div>

        <!--header search panel start -->
        <div class="search-bar">
            <form class="search-form">
                <div class="search-input-wrapper">
                    <input type="text" name="qq" placeholder="search something..." class="search-input">
                    <button type="submit" name="search" class="search-submit"><i class="material-icons">&#xE5C8;</i>
                    </button>
                </div>
                <span class="search-close search-toggle">
						<i class="material-icons">&#xE5CD;</i>
					</span>
            </form>
        </div>
        <!--header search panel end -->

    </div>
</header>
<!-- header end -->
