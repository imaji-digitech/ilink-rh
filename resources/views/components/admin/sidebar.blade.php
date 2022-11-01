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
                        <div>
                            <h6>General</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i><span> Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.calendar-direction') }}">
                            <i class="fas fa-home"></i><span> Calendar Semua</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.project-base.index') }}">
                            <i class="fas fa-calendar"></i><span> Project Base</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.journal.this-month') }}">
                            <i class="fa fa-book"></i><span> My Journal</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.journal') }}">
                            <i class="fa fa-book"></i><span> Journal Recap</span>
                        </a>
                    </li>
                    @if(auth()->user()->role==1 or auth()->user()->role==2 )
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.user.index') }}">
                            <i class="fas fa-users"></i><span> Users</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->id()==13 or auth()->id()==2 or auth()->id()==5 or auth()->id()==6or auth()->id()==26)
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.presence.index') }}">
                            <i class="fa fa-calendar-check-o"></i><span> Presensi</span>
                        </a>
                    </li>
                    @endif

                    <li class="sidebar-main-title">
                        <div>
                            <h6>Administration</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.mail.index') }}">
                            <i class="fas fa-envelope"></i><span> Mail</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.finance.index') }}">
                            <i class="fas fa-money-bill"></i><span> Finance</span>
                        </a>
                    </li>
                    @if(auth()->user()->role==1)
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.budget.index') }}">
                            <i class="fas fa-wallet"></i><span> Keuangan</span>
                        </a>
                    </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.invoice.index') }}">
                                <i class="fas fa-money-bill-alt"></i><span> Invoice</span>
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.proof-cash.index') }}">
                                <i class="fas fa-money-bill-alt"></i><span> Kwitansi</span>
                            </a>
                        </li>
                    @endif
                    @if(auth()->id()==5 or auth()->id()==6 or auth()->id()==14)
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.salary.index') }}">
                            <i class="fas fa-dollar-sign"></i><span> Salary</span>
                        </a>
                    </li>
                    @endif
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Blogging</h6>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.content.index') }}">
                            <i class="fas fa-blog"></i><span> Content</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.link.index') }}">
                            <i class="fas fa-link"></i><span> Imaji Link</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.on-news.index') }}">
                            <i class="fas fa-link"></i><span> Link Berita</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.article.index') }}">
                            <i class="fas fa-book"></i><span> Artikel</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.collaboration-file.index') }}">
                            <i class="fas fa-book"></i><span> File Kerjasama</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.download-link.index') }}">
                            <i class="fas fa-book"></i><span> Gdrive share</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.tag.index') }}">
                            <i class="fas fa-tag"></i><span> Tag</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.sosmed.index') }}">
                            <i class="fa fa-instagram"></i><span> Sosmed</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-square"></i><span> Campaign (under maintenance)</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-image"></i><span> Gallery (under maintenance)</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.vendor.index') }}">
                            <i class="fas fa-venus"></i><span> Vendor</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.faq.index') }}">
                            <i class="fas fa-question"></i><span> FAQ</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.partner.index') }}">
                            <i class="fa fa-handshake-o"></i><span> Partner</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.testimonial.index') }}">
                            <i class="fa fa-quote-left"></i><span> Testimonial</span>
                        </a>
                    </li>


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
