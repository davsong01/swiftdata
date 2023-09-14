<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="homepage/assets/img/logo.jpeg" alt="">
            <h1 style="text-transform: uppercase;"><?php echo $sitename; ?></h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="<?php echo $mainpage; ?>/login">Sign In</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav><!-- .navbar -->


    </div>
</header><!-- End Header -->
<!-- End Header -->