<!-- Page Sidebar Start-->
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="#">
                <img class="img-fluid for-light" src="{{asset('assets/images/logo/logo.png')}}" alt="">
                <img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"></i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="#">
                <img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="#">
                            <img class="img-fluid" src="{{asset('assets/images/logo/logo-icon.png')}}" alt="">
                        </a>
                        <div class="mobile-back text-end"><span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div><h6>General</h6></div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                            <i class="fas fa-home"></i><span> Dashboard</span>
                        </a>
                    </li>
                    @if(auth()->id()!=6)
{{--                        <li class="sidebar-list">--}}
{{--                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('report.index') }}">--}}
{{--                                <i class="fas fa-home"></i><span> Report bulanan</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="sidebar-main-title">
                            <div><h6>Pengolahan</h6></div>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('material.index') }}">
                                <i class="fas fa-recycle"></i><span> Material</span>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('material-mutation') }}">
                                <i class="fas fa-recycle"></i><span> Mutasi material</span>
                            </a>
                        </li>
                        <li class="sidebar-main-title">
                            <div><h6>Surat & keuangan</h6></div>
                        </li>
{{--                        <li class="sidebar-list">--}}
{{--                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('invoice.index') }}">--}}
{{--                                <i class="fas fa-inbox"></i><span> Invoice</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="sidebar-list">--}}
{{--                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('receipt.index') }}">--}}
{{--                                <i class="fas fa-file-archive"></i><span> Kwitansi</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('travel-permit.index') }}">
                                <i class="fas fa-truck"></i><span> Surat jalan</span>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('good-receipt.index') }}">
                                <i class="fas fa-box"></i><span> Terima barang</span>
                            </a>
                        </li>
                    @endif

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav">

                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav">

                        </a>
                    </li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
