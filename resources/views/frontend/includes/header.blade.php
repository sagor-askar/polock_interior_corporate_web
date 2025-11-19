<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container">
        <div class="container-fluid  position-relative d-flex align-items-center justify-content-between">

            <a href="" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/polock_interior.png') }}" alt="">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="" class="active">Home</a></li>
                    <li><a href="">Our Works</a></li>
                    <li><a href="">Events</a></li>
                    <li><a href="">Gallery</a></li>
                    <li><a href="">Reach Us</a></li>

                    <li><a href="{{ route('contact-us') }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </div>
</header>
