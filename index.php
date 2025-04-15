<?php

include('db_con.php');

$industries = [];
$industry_counts = [];

$industry_result = $con->query("SELECT industry_name, COUNT(*) as project_count FROM add_project WHERE status = 1 GROUP BY industry_name");
while ($row = $industry_result->fetch_assoc())
{
    $industries[] = $row['industry_name'];
    $industry_counts[$row['industry_name']] = $row['project_count'];
}
$king_count_result = $con->query("SELECT COUNT(*) AS total FROM add_project WHERE king_status = 1 AND status = 1");
$king_count = $king_count_result->fetch_assoc()['total'];

$feature_count_result = $con->query("SELECT COUNT(*) AS total FROM add_project WHERE feature_status = 1 AND status = 1");
$feature_count = $feature_count_result->fetch_assoc()['total'];



?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="x-ua-compatible" content="IE=edge">
<meta name="author" content="Auctech Portfolio">
<meta name="description" content="Auctech Portfolio">
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/font-icons.css">
<link rel="stylesheet" href="css/swiper.css">
<link rel="stylesheet" href="css/custom.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Auctech Portfolio</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap');

    :root {
        --cnvs-primary-font: "Work Sans", sans-serif;
        --cnvs-body-font: "Work Sans", sans-serif;
        --cnvs-themecolor: #1a73e8;
        --cnvs-themecolor-rgb: 26, 115, 232
    }

    .demos-text-rotator {
        font-size: 7vw
    }

    @media (min-width:992px) {
        .demos-text-rotator {
            font-size: 5vw
        }
    }

    @media (max-width:767.98px) {
        .slider-element .heading-block h1 small {
            font-size: 15px
        }
    }

    .testimonials-rating {
        color: gold;
        font-size: 18px;
        line-height: 1
    }

    #niche-demos .portfolio-item .portfolio-image .flexslider a {
        width: inherit
    }

    .more-link {
        border-bottom-width: 1px;
        font-style: normal;
        font-family: proxima-nova, sans-serif
    }

    .p-generator-video::before {
        content: "";
        position: absolute;
        display: block;
        top: 50%;
        left: 50%;
        width: 110%;
        height: 110%;
        background-size: 12px 12px;
        background-position: center;
        transform: translate(-50%, -50%);
        background-image: radial-gradient(#5c2ede 14%, transparent 14%);
        -webkit-mask-image: radial-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 0) 75%);
        mask-image: radial-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 0) 75%);
        z-index: -1
    }

    #section-blocks {
        background-image: linear-gradient(to bottom, #fff 36%, #000 36%)
    }

    .section-blocks-imgs img:first-child {
        width: 100%;
        max-width: 840px;
        height: auto;
        margin-left: 0
    }

    .section-blocks-imgs img:nth-child(2) {
        display: none;
        position: absolute;
        width: 480px;
        right: 0;
        bottom: -10px;
        border: 4px solid #fff
    }

    @media (min-width:1200px) {
        .demos-text-rotator {
            font-size: 3.5vw
        }

        #section-blocks {
            background-image: linear-gradient(to bottom, #fff 50%, #000 50%)
        }

        .section-blocks-imgs img:first-child {
            margin-left: 5%
        }

        .section-blocks-imgs img:nth-child(2) {
            right: 5%
        }
    }

    @media (min-width:992px) {
        .section-blocks-imgs img:nth-child(2) {
            display: block
        }
    }

    @-webkit-keyframes fadeInLeft {
        from {
            opacity: 0;
            -webkit-transform: translate3d(-7%, 0, 0);
            transform: translate3d(-7%, 0, 0)
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            -webkit-transform: translate3d(-4%, 0, 0);
            transform: translate3d(-4%, 0, 0)
        }
    }

    @-webkit-keyframes fadeInUp {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, 4%, 0);
            transform: translate3d(0, 4%, 0)
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            -webkit-transform: translate3d(0, 4%, 0);
            transform: translate3d(0, 4%, 0)
        }
    }

    .swiper-slide img.lazy {
        width: 100% !important;
        height: auto !important
    }

    .hero-description {
        padding-top: 4rem
    }

    #page-menu {
        height: 0;
        overflow: hidden;
        /* -webkit-backface-visibility: hidden */
    }

    #page-menu #page-menu-wrap {
        opacity: 0;
        pointer-events: none;
        -webkit-transition: all .4s ease;
        -o-transition: all .4s ease;
        transition: all .4s ease;
        -webkit-transform: translate3d(0, -44px, 0);
        -o-transform: translate3d(0, -44px, 0);
        transform: translate3d(0, -44px, 0);
        transform-style: preserve-3d;
        /* -webkit-backface-visibility: hidden */
    }

    #page-menu.sticky-page-menu {
        overflow: visible
    }

    #page-menu.sticky-page-menu #page-menu-wrap {
        opacity: 1;
        pointer-events: auto;
        -webkit-transform: translate3d(0, 0, 0);
        -o-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }

    body:not(.is-expanded-menu) #page-menu {
        display: none
    }

    .w-20 {
        width: 20%;
    }

    .tab-hover .nav-link {
        position: relative;
        display: block;
        color: var(--cnvs-contrast-700);
        font-size: 1.125rem;
        padding-left: 0;
        font-weight: 600;
        -webkit-transition: color .25s linear;
        -o-transition: color .25s linear;
        transition: color .25s linear;
    }

    .tab-hover .nav-link.active {
        color: var(--cnvs-themecolor);
    }

    .tab-hover .nav-link::after {
        content: '';
        opacity: 0;
        position: absolute;
        top: 50%;
        width: 40%;
        height: 2px;
        -ms-flex-positive: 1;
        flex-grow: 1;
        margin-left: 15px;
        margin-top: -1px;
        -ms-transform: translate(25%, -1px);
        transform: translate(25%, -1px);
        background: linear-gradient(to right, transparent 10%, var(--cnvs-themecolor) 50%);
        transition: all .4s ease-in-out;
        background-color: var(--cnvs-themecolor);
        /* -backface-visibility: hidden; */
    }

    .tab-hover .nav-link.active::after {
        opacity: 1;
        -ms-transform: translate(0, -1px);
        transform: translate(0, -1px)
    }

    @media (max-width: 767.98px) {
        .tab-hover .nav {
            border-bottom: 2px solid var(--cnvs-contrast-100);
            padding-bottom: 15px;
            margin-bottom: 50px;
        }

        .tab-hover .nav-link {
            padding: 8px;
        }

        .tab-hover .nav-link::after {
            display: none;
        }

        .w-20 {
            width: 33.333333%;
        }
    }

    .tab-hover h3 {
        font-size: 1rem;
        margin-bottom: 0.375rem;
    }

    body:not(.is-expanded-menu) #header {
        --cnvs-header-height: 80px
    }

    .is-expanded-menu #header:not(.sticky-header) #header-wrap {
        border-bottom: 0
    }

    .intro-hero-images-section {
        --cnvs-intro-hero-images-position: 0%
    }

    .intro-hero-images-section:first-child {
        left: var(--cnvs-intro-hero-images-position)
    }

    .intro-hero-images-section:last-child {
        right: var(--cnvs-intro-hero-images-position)
    }

    @media (max-width:991.98px) {
        .intro-hero-images-section {
            opacity: .1
        }
    }

    @media (min-width:992px) and (max-width:1199.98px) {
        .intro-hero-images-section {
            --cnvs-intro-hero-images-position: -10%
        }
    }

    @media (min-width:1200px) and (max-width:1399.98px) {
        .intro-hero-images-section {
            --cnvs-intro-hero-images-position: -7%
        }
    }

    @media (min-width:1400px) and (max-width:1700px) {
        .intro-hero-images-section {
            --cnvs-intro-hero-images-position: -5%
        }
    }

    @media (min-width:1200px) {

        #logo,
        .header-misc {
            width: auto
        }
    }

    @media (min-width:1300px) {

        #logo,
        .header-misc {
            width: 20%
        }
    }

    .lazy {
        opacity: 0.9;
    }

    .masonry-thumbs>*>img {
        display: block;
        width: 310px !important;
        height: 300px;
        border-radius: 30px !important;
        padding:10px;
    }

    .heading-block {
        margin-top: 70px;
    }
    p{
        text-align: justify;
    }
</style>

<body class="stretched is-expanded-menu" data-loader-color="theme" data-loader-timeout="5000"
    data-menu-breakpoint="1200">

    <div id="wrapper">

        <header id="header" class="transparent-header">
            <div id="header-wrap">
                <div class="container-fluid px-4 px-xl-5">
                    <div class="header-row">
                        <div id="logo" class="me-xl-0"><a href="index.html" class="w-auto">
                                <img class="logo-default" style="height: 70px;"
                                    src="https://www.auctech.in/assets/img/logo-footer.png" alt="Canvas Logo">
                                <img class="logo-dark" src="https://www.auctech.in/assets/img/logo-footer.png"
                                    alt="Canvas Logo"></a>
                        </div>
                        <div class="primary-menu-trigger"><button class="cnvs-hamburger" type="button"
                                title="Open Mobile Menu"><span class="cnvs-hamburger-box"><span
                                        class="cnvs-hamburger-inner"></span></span></button></div>
                        <nav class="primary-menu mobile-menu-off-canvas ms-auto me-auto">
                            <ul class="menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="index.html#niche-demos">
                                        <div>Home</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index.html#niche-demos">
                                        <div>About Us</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index.html#niche-demos">
                                        <div>Our Creations</div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <a href="#"
                            class="button button-3d button-text-effect button-text-flip-y mx-3 me-xl-0 d-none d-sm-inline-block">Contact
                            Us</a>
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header>
        <section id="slider" class="slider-element min-vh-75 h-auto scroll-detect include-header bg-contrast-100">
            <div class="py-6 mt-xl-6 position-relative z-2">
                <div class="container">
                    <div class="justify-content-center row align-items-center col-mb-80 mb-0">
                        <div class="text-center col-12 pt-4 pb-0">
                            <style>
                                .has-plugin-textrotator .textrotator-placeholder {
                                    display: none
                                }
                            </style>
                            <h1 class="mb-4 display-4 mx-auto nott" style="max-width:900px"><span
                                    class="nocolor d-block font-secondary fs-4 mb-3">Crafting Digital Excellence with
                                    Vision. </span>
                                <span class="nocolor fw-bold text-rotater ls-1" data-backdelay="1800" data-loop="true"
                                    data-rotate="fadeIn" data-separator="|" data-shuffle="true" data-speed="60"
                                    data-typed="true"><span
                                        class="text-uppercase t-rotate">Corporate|Portfolio|Business|Real
                                        Estate|Medical|Construction|Store|COVID|Freelancer|Burger|Yoga|Hostel|Beauty|Crowdfunding|CoWorking|Recipes|SEO|App
                                        Landing|One-Page|Travel|e-Commerce|Articles|Course|Packers &
                                        Movers|Cleaner|Beauty
                                        Kit|Conference|Non-Profit|Hosting|Gym|Photography|Blog|Magazine|Resume|Restaurant|Cafe|Spa|Wedding|Ajax|Media
                                        Agency|Shop|Events|Rental|News|Music|Car
                                        Listing|Barber|Pets|Forums|Community|Finance|Therapy|Furniture|NFT|Marketplace|Skincare|Jewellery|Boutique|SAAS|Podcast|Insurance|Speaker|Drone|Academic|Wine|Home|Football
                                        Club|Videography|Supplements|Project|Doctors|eBook|Gaming|Personals|CV</span>
                                </span><span class="nocolor fw-bold text-rotater text-uppercase textrotator-placeholder"
                                    title="Canvas Template">Canvas</span>
                            </h1>
                        </div>
                        <div class="text-center col-lg-7 pb-3">
                            <p class="mb-5 fs-4 lead">Your trusted partner for next-gen web solutions, branding, and
                                strategy. <span class="fw-semibold color counter counter-inherit"><span
                                        data-speed="1000" data-from="99" data-refresh-interval="50"
                                        data-to="1400"></span>+</span> Demo Layouts & <span
                                    class="fw-semibold color counter counter-inherit"><span data-speed="1000"
                                        data-from="99" data-refresh-interval="50" data-to="2000"></span>+</span> UI
                                Features.
                            <div class="align-items-center justify-content-center row g-4 mx-auto mb-5"
                                style=max-width:600px>
                                <div class="col-sm-6 col-lg-5"><a
                                        class="w-100 button button-large m-0 rounded shadow-sm"
                                        data-scrollto=#section-alldemoshref="#" style="padding:.75rem 2rem"><i
                                            class="uil uil-images" style=position:relative;top:1px;margin-right:5px></i>
                                        View Demos</a></div>
                                <div class="col-sm-6 col-lg-5"><a
                                        class="w-100 button button-large m-0 rounded bg-contrast-900 h-bg-color text-white"
                                        target="_blank"
                                        href="https://1.envato.market/c/1309643/480739/4415?u=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F9228123"
                                        style="padding:.75rem 2rem"><i class="bi-magic me-2"></i> Start Creating</a>
                                </div>
                                <div class="col-sm-auto d-none d-lg-block"><a
                                        class="align-items-center all-ts d-flex text-white justify-content-center rounded-circle square h-op-08"
                                        style="background:url(images/intro/new/video-button.jpg) center center / cover;--cnvs-square-size:3rem"
                                        data-lightbox=iframe href="https://www.youtube.com/watch?v=P3Huse9K6Xs"><i
                                            class="fa-solid fa-play fs-6 m-0 position-relative" style=left:1px></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center col-md-10 col-xl-9" style="font-size:.875rem"><span
                                class="d-inline-block mb-3 me-3" data-animate="fadeInUpSmall" data-delay="333"><i
                                    class="position-relative fa-solid me-1 fa-check text-success" style=top:1px></i>
                                Ready to Use</span> <span class="d-inline-block mb-3 me-3" data-animate="fadeInUpSmall"
                                data-delay="444"><i class="position-relative fa-solid me-1 fa-check text-success"
                                    style=top:1px></i> #1 Template of all Time</span> <span
                                class="d-inline-block mb-3 me-3" data-animate="fadeInUpSmall" data-delay="555"><i
                                    class="position-relative fa-solid me-1 fa-star text-warning"></i> 2900+ 5-Star
                                Reviews</span> <span class="d-inline-block mb-3 me-3" data-animate="fadeInUpSmall"
                                data-delay="666"><i class="position-relative fa-solid me-1 fa-check text-success"
                                    style=top:1px></i> 9+ Years of Development</span> <span class="d-inline-block mb-3"
                                data-animate="fadeInUpSmall" data-delay="777"><i
                                    class="position-relative fa-solid me-1 fa-check text-success" style=top:1px></i>
                                Lifetime Free Updates</span></div>
                    </div>
                </div>
            </div>
            <div class="w-100 h-100 position-absolute py-5 start-0 top-0 z-1">
                <div class="w-100 d-flex mt-6 pt-5 px-4">
                    <div class="position-relative intro-hero-images-section w-50">
                        <div class="position-relative d-flex" data-animate=fadeInDownSmall style=width:35%;left:1%><img
                                alt="Classic Demo" class="lazy rounded shadow w-50"
                                data-src=images/intro/niche/new/classic.jpg height=159
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                width=221>
                            <div class=position-absolute data-animate=fadeInRightSmall
                                style=width:65%;right:-14.5%;top:-50% data-delay=550><img alt="Construction Demo"
                                    class="lazy rounded shadow w-100 ms-4"
                                    data-src=images/intro/niche/new/construction.jpg height=159
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                    style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                    width=221></div>
                        </div>
                        <div class="position-relative mt-4" data-animate=fadeInLeft style=width:37%;left:-18%
                            data-delay=250><img alt="Real Estate Demo" class="lazy rounded shadow w-100"
                                data-src=images/intro/niche/new/real-estate.jpg height=159
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                width=221>
                            <div class=position-absolute data-animate=zoomIn style=width:50%;right:-57%;top:-9%
                                data-delay=800><img alt="App Landing Demo" class="lazy rounded shadow w-100"
                                    data-src=images/intro/niche/new/app-landing.jpg height=159
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                    style=transform:translate3d(calc(var(--cnvs-scroll-end)*30%),calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                    width=221></div>
                            <div class=position-absolute data-animate=zoomIn style=width:48%;right:-55%;top:51.5%
                                data-delay=1000><img alt="News Demo" class="lazy rounded shadow w-100"
                                    data-src=images/intro/niche/new/news.jpg height=159
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                    style=transform:translate3d(calc(var(--cnvs-scroll-end)*50%),calc(var(--cnvs-scroll-end)*200%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                    width=221></div>
                        </div>
                        <div class="position-relative mt-4" data-animate=fadeInUp style=width:38%;left:3%
                            data-delay=500><img alt="Supplements Demo" class="lazy rounded shadow w-100"
                                data-src=images/intro/niche/new/skincare.jpg height=159
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                width=221></div>
                    </div>
                    <div class="position-relative d-flex align-items-end flex-column intro-hero-images-section w-50">
                        <div class="position-relative d-flex" data-animate=fadeInDownSmall style=width:35%;right:1%><img
                                alt="Conference Demo" class="lazy rounded shadow ms-auto w-50"
                                data-src=images/intro/niche/new/conference.jpg height=159
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                width=221>
                            <div class=position-absolute data-animate=fadeInLeftSmall style=width:65%;left:-30%;top:-50%
                                data-delay=550><img alt="Freelancer Demo" class="lazy rounded shadow w-100 ms-4"
                                    data-src=images/intro/niche/new/freelancer.jpg height=159
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                    style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                    width=221></div>
                        </div>
                        <div class="position-relative mt-4" data-animate=fadeInRightSmall style=width:37%;right:-18%
                            data-delay=250><img alt="CoWorking Demo" class="lazy rounded shadow w-100 ms-auto"
                                data-src=images/intro/niche/new/coworking.jpg height=159
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                width=221>
                            <div class=position-absolute data-animate=zoomIn style=width:50%;left:-57%;top:-9%
                                data-delay=800><img alt="Furniture Demo" class="lazy rounded w-100"
                                    data-src=images/intro/niche/new/furniture.jpg height=159
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                    style=transform:translate3d(calc(-1*var(--cnvs-scroll-end)*30%),calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                    width=221></div>
                            <div class=position-absolute data-animate=zoomIn style=width:48%;left:-55%;top:51.5%
                                data-delay=1000><img alt="Skincare Demo" class="lazy rounded shadow w-100"
                                    data-src=images/intro/niche/new/skincare.jpg height=159
                                    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                    style=transform:translate3d(calc(-1*var(--cnvs-scroll-end)*50%),calc(var(--cnvs-scroll-end)*200%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                    width=221></div>
                        </div>
                        <div class="position-relative mt-4" data-animate=fadeInUp style=width:38%;right:3%
                            data-delay=500><img alt="SEO Demo" class="lazy rounded shadow w-100"
                                data-src=images/intro/niche/new/seo.jpg height=159
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 221 159'%3E%3C/svg%3E"
                                style=transform:translate3d(0,calc(var(--cnvs-scroll-end)*100%),0);opacity:calc(var(--cnvs-scroll-ratio)*1)
                                width=221></div>
                    </div>
                </div>
            </div>
            <div class="shape-divider shape-divider-complete z-2" data-height="75" data-position="bottom"
                data-shape="wave"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100"
                    preserveAspectRatio="none" class="op-ts op-1">
                    <path class="shape-divider-fill"
                        d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z">
                    </path>
                </svg></div>
        </section>
        <section id="slider" class="slider-element swiper_wrapper h-auto" style="height: 734px;">
            <div class="slider-inner">
                <div class="swiper swiper-parent swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-b3512104e01ec5520" aria-live="off"
                        style="cursor: grab; transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); transition-delay: 0ms; height: auto;">

                        <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 2"
                            style="width: 1905px;">
                            <div class="container">
                                <div class="row align-items-center mt-5">
                                    <div class="col-xl-6 pe-0 pe-xl-5 col-md-5 col-sm-11 col-12 mb-5 mb-lg-0">
                                        <div class="heading-block border-bottom-0 mb-4">
                                            <h2 class="fw-bold ls-0 text-transform-none">Choosing the Right Platform for
                                                Your E-commerce Startup</h2>
                                        </div>
                                        <p>When starting an e-commerce business, one of the most important decisions
                                            you'll make is choosing the right platform to build your online store. The
                                            platform you choose will affect how your website looks, works, performs, and
                                            grows in the future.</p>

                                        <a href="#" class="button button-large text-transform-none ms-0"><i
                                                class="bi-cart"></i> Explore More</a>
                                    </div>
                                    <div class="col-xl-2 col-md-3 col-4 parallax" data-0="transform: translateY(0px);"
                                        data-600="transform: translateY(-30px);">
                                        <img src="https://canvastemplate.com/demos/articles/images/articles/1/1.png"
                                            alt="Image" class="rounded faster fadeInLeft animated"
                                            data-animate="fadeInLeft">
                                        <div class="card mt-3 d-none d-sm-block faster fadeInLeft animated"
                                            data-animate="fadeInLeft" data-delay="100">
                                            <div class="card-body rounded bg-color dark" data-bs-theme="dark">
                                                <h4 class="mb-2 font-body">Demo Heading</h4>
                                                <p class="mb-0">Sunt, laborum, nemo. Aperiam. Lorem ipsum dolor sit
                                                    consectetur adipisicing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-4 p-0 parallax" data-0="transform: translateY(0);"
                                        data-600="transform: translateY(20px);">
                                        <img src="https://canvastemplate.com/demos/articles/images/articles/1/4.png"
                                            alt="Image" class="faster rounded fadeInLeft animated"
                                            data-animate="fadeInLeft" data-delay="200">
                                        <img src="https://canvastemplate.com/demos/articles/images/articles/1/2.png"
                                            alt="Image" class="faster rounded mt-3 fadeInLeft animated"
                                            data-animate="fadeInLeft" data-delay="300">
                                    </div>
                                    <div class="col-xl-2 col-md-2 col-4 parallax" data-0="transform: translateY(0px);"
                                        data-600="transform: translateY(-20px);">
                                        <img src="https://canvastemplate.com/demos/articles/images/articles/1/3.png"
                                            alt="Image" class="faster rounded fadeInLeft animated"
                                            data-animate="fadeInLeft" data-delay="400">
                                        <img src="https://canvastemplate.com/demos/articles/images/articles/1/5.png"
                                            alt="Image" class="faster rounded mt-3 fadeInLeft animated"
                                            data-animate="fadeInLeft" data-delay="500">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide swiper-slide-next" role="group" aria-label="2 / 2"
                            style="width: 1905px;">
                            <div class="container">
                                <div class="row align-items-center mt-5">
                                    <div class="col-xl-6 pe-0 pe-xl-5 col-md-6 col-sm-11 col-12 mb-5 mb-lg-0">
                                        <div class="heading-block border-bottom-0 mb-4">
                                            <div class="before-heading mb-2">16 March 2021 <span
                                                    class="badge bg-secondary ms-1">Featured</span></div>
                                            <h2 class="fw-bold ls-0 text-transform-none">The Darkness of the Flame</h2>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam ipsa harum
                                            obcaecati, et quo facilis itaque minima tempore voluptates suscipit.</p>
                                        <div
                                            class="article-info mb-4 d-flex align-items-center justify-content-between">
                                            <div class="rating-stars ms-1"><i class="bi-star-fill"></i><i
                                                    class="bi-star-fill"></i><i class="bi-star-fill"></i><i
                                                    class="bi-star-fill"></i><i class="bi-star-fill"></i></div>
                                            <h5>by: <a href="#">Hans Down</a></h5>
                                            <span class="article-price fw-bold ms-1"><del>$60.00</del> $49.99</span>
                                        </div>
                                        <a href="#" class="button button-large text-transform-none ms-0"><i
                                                class="bi-cart"></i> Add to Cart</a>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-6 parallax" data-0="transform: translateY(0px);"
                                        data-600="transform: translateY(-30px);">
                                        <img src="demos/articles/images/articles/2/1.png" alt="Image"
                                            class="rounded not-animated" data-animate="faster fadeInLeft">
                                        <div class="card mt-3 not-animated" data-animate="faster fadeInLeft"
                                            data-delay="100">
                                            <div class="card-body rounded bg-color dark" data-bs-theme="dark">
                                                <h4 class="mb-2 font-body">Demo Heading</h4>
                                                <p class="mb-0">Sunt, laborum, nemo. Aperiam. Lorem ipsum dolor sit
                                                    consectetur adipisicing elit.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-6 p-0 parallax" data-0="transform: translateY(0);"
                                        data-600="transform: translateY(40px);">
                                        <img src="demos/articles/images/articles/2/2.png" alt="Image"
                                            class="rounded not-animated" data-animate="faster fadeInLeft"
                                            data-delay="200">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-arrow-left swiper-button-disabled" tabindex="-1" role="button"
                        aria-label="Previous slide" aria-controls="swiper-wrapper-b3512104e01ec5520"
                        aria-disabled="true"><i class="uil uil-angle-left-b"></i></div>
                    <div class="slider-arrow-right" tabindex="0" role="button" aria-label="Next slide"
                        aria-controls="swiper-wrapper-b3512104e01ec5520" aria-disabled="false"><i
                            class="uil uil-angle-right-b"></i></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </section>
        <section id="content">

            <div class="content-wrap py-0">

                <!-- Section About
                ============================================= -->
                <div id="about" class="section m-0 page-section" style="rgba(var(--bs-light-rgb), var(--bs-bg-opacity)"
                    data-onepage-settings="{&quot;offset&quot;:0,&quot;speed&quot;:1250,&quot;easing&quot;:&quot;easeInOutExpo&quot;}">
                    <div class="container">



                        <div class="row mb-5">

                            <div class="col-xl-6 col-sm-5 d-md-none d-xl-block mb-5 mb-sm-0">
                                <div class="masonry-thumbs masonry-gap-lg row row-cols-2 grid-container has-init-isotope"
                                    data-lightbox="gallery" style="position: relative; height: 358.782px;">
                                    <a class="grid-item"
                                        href="https://canvastemplate.com/demos/beauty/images/others/2.jpg"
                                        data-lightbox="gallery-item"
                                        style="position: absolute; left: 0%; top: 0px;"><img
                                            src="https://canvastemplate.com/demos/beauty/images/others/2.jpg"
                                            alt="Gallery Thumb 1"></a>
                                    <a class="grid-item"
                                        href="https://canvastemplate.com/demos/beauty/images/others/2.jpg"
                                        data-lightbox="gallery-item"
                                        style="position: absolute; left: 50%; top: 0px;"><img
                                            src="https://canvastemplate.com/demos/beauty/images/others/2.jpg"
                                            alt="Gallery Thumb 2"></a>
                                    <a class="grid-item"
                                        href="https://canvastemplate.com/demos/beauty/images/others/2.jpg"
                                        data-lightbox="gallery-item"
                                        style="position: absolute; left: 0%; top: 179.314px;"><img
                                            src="https://canvastemplate.com/demos/beauty/images/others/2.jpg"
                                            alt="Gallery Thumb 3"></a>
                                    <a class="grid-item" href="demos/beauty/images/others/7.jpg"
                                        data-lightbox="gallery-item"
                                        style="position: absolute; left: 50%; top: 179.314px;"><img
                                            src="https://canvastemplate.com/demos/beauty/images/others/2.jpg"
                                            alt="Gallery Thumb 4"></a>
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-7 mb-5 mb-md-0">
                                <!-- Heading -->
                                <div class="heading-block border-bottom-0 mb-4">

                                    <h2 class="text-transform-none ls-1 fw-bold" style="font-size: 34px">What we do?
                                    </h2>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio veritatis qui
                                    asperiores, quae beatae autem repudiandae praesentium reiciendis illum minus fugiat
                                    animi molestiae nobis! Harum atque quod, similique maiores itaque dolorum sequi,
                                    expedita. Omnis, ex!</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio veritatis qui
                                    asperiores, quae beatae autem repudiandae praesentium reiciendis illum minus fugiat
                                    animi molestiae nobis! Harum atque quod, similique maiores itaque dolorum sequi,
                                    expedita. Omnis, ex!</p>
                                <a href="#" data-scrollto="#price"
                                    class="button button-circle text-transform-none fw-normal" data-offset="85"
                                    data-easing="easeInOutExpo" data-speed="1250">Price <i
                                        class="bi-caret-right-fill m-0"></i></a>
                            </div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>

            </div>
        </section>
        <section id="slider" class="slider-element include-header"
            style="background: linear-gradient(90deg, rgba(34, 193, 195, 0.06), rgba(253, 187, 45, 0.1));">
            <div class="container mt-lg-6">
                <div class="row justify-content-between align-items-center py-lg-6 py-5">
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <img src="https://canvastemplate.com/demos/doctors/images/icons/wave.svg" alt="..."
                            class="position-absolute top-0 start-0 translate-middle d-none d-md-block" width="50">
                        <h2 class="display-3 fw-bold color all-ts">Real Estate Investment <span
                                class="underliner nocolor viewport-detect" data-delay="1000">Strategies</u></span> That
                            Actually Work <img class="position-relative" style="top: -5px;"
                                src="https://canvastemplate.com/demos/doctors/images/icons/smile.svg" alt="..."
                                width="50"></h2>
                        <p>Discover proven strategies that successful investors use to grow their wealth through
                            real estate. From rental properties to flipping homes, learn what really works in
                            today's market.</p>
                        <a href="#" class="button py-3 px-4 bg-color-2 color h-bg-color h-text-light rounded mx-0"
                            style="color: #fff !important;">View More<i class="bi-arrow-right ms-2 me-0"></i></a>
                    </div>
                    <div class="col-lg-6">
                        <!-- Gallery -->
                        <div class="row align-items-center g-4">
                            <div class="col-6">
                                <img src="https://canvastemplate.com/demos/doctors/images/hero/3.jpg" alt="Image"
                                    class="object-cover rounded-6">
                            </div>
                            <div class="col-6">
                                <img src="https://canvastemplate.com/demos/doctors/images/hero/2.jpg" alt="Image"
                                    class="object-cover rounded-6 mb-4">
                                <img src="https://canvastemplate.com/demos/doctors/images/hero/1.jpg" alt="Image"
                                    class="object-cover rounded-6">
                            </div>
                        </div>
                        <!-- Gallery -->

                        <img src="https://canvastemplate.com/demos/doctors/images/icons/wave.svg" alt=".."
                            class="position-absolute z-1 top-0 mt-3 op-01" width="70" style="left: -90px;">
                    </div>
                </div>
            </div>

        </section>
        <section id="content">
            <div class="content-wrap pb-0">
                <div id=page-menu>
                    <div id=page-menu-wrap>
                        <div class="container-fluid px-4 px-xl-5">
                            <div class=page-menu-row>
                                <div class=page-menu-title>Explore <span>CANVAS</span></div>
                                <nav class="one-page-menu page-menu-nav" data-offset=100>
                                    <ul class=page-menu-container>
                                        <li class=page-menu-item><a data-href=#niche-demos-grid-containerhref="#"
                                                data-offset=220>
                                                <div>Niche Demos</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-homepagehref="#">
                                                <div>Multi-Page</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-onepagehref="#">
                                                <div>One-Page</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-featureshref="#">
                                                <div>Features</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-blockshref="#">
                                                <div>Blocks</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-formshref="#" data-offset=100>
                                                <div>Forms</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-shortcodeshref="#">
                                                <div>Shortcodes</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-testimonialshref="#">
                                                <div>Reviews</div>
                                            </a>
                                        <li class=page-menu-item><a data-href=#section-purchasehref="#" data-offset=0>
                                                <div>Purchase</div>
                                            </a>
                                    </ul>
                                </nav>
                                <div id=page-menu-trigger><i class=bi-list></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section page-section bg-transparent mb-0 mt-4">
                    <div class="container-fluid px-5">
                        <div class="heading-block text-center border-bottom-0 text-center">
                            <h2 class="text-transform-none"
                                style="font-size: 2.25rem; line-height: 1.2; letter-spacing: -1px;">
                                <span>Prebuilt</span> Website Demos
                            </h2>
                        </div>
                        <div class="row" id="niche-demos-grid-container">
                            <div class="col-12">
                                <div id="niche-demos-grid-filter" class="grid-filter-wrap">
                                    <ul class="grid-filter style-2" data-container="#niche-demos-grid">
                                        <li class="activeFilter"><a data-filter="*" href="#">All Projects</a></li>

                                        <!-- Static Filters -->
                                        <li><a data-filter=".nd-kingproject" href="#">King Project
                                                <span>(<?php echo $king_count; ?>)</span></a></li>
                                        <li><a data-filter=".nd-featureproject" href="#">Feature Project
                                                <span>(<?php echo $feature_count; ?>)</span></a></li>

                                        <!-- Dynamic Industry Filters -->
                                        <?php foreach ($industries as $industry):
                                            $class = 'nd-' . strtolower(preg_replace('/[^a-z0-9]/i', '', str_replace(' ', '', $industry)));
                                            $project_count = isset($industry_counts[$industry]) ? $industry_counts[$industry] : 0;
                                            ?>
                                            <li><a data-filter=".<?php echo $class; ?>"
                                                    href="#"><?php echo htmlspecialchars($industry); ?>
                                                    <span>(<?php echo $project_count; ?>)</span></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                            </div>

                            <?php
                            include('db_con.php');

                            $projects = [];

                            $sql = "SELECT ap.*, pi.project_image 
                            FROM add_project ap
                            LEFT JOIN (
                                SELECT project_id, project_image 
                                FROM project_image 
                                GROUP BY project_id
                            ) pi ON ap.id = pi.project_id
                            WHERE ap.status = 1";

                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc())
                            {
                                $projects[] = $row;
                            }
                            ?>

                            <div class="col-12">

                                <div id="niche-demos-grid" class="row g-4 text-center grid-container overflow-visible"
                                    data-layout="fitRows">
                                    <?php foreach ($projects as $project):
                                        $industry_class = 'nd-' . strtolower(preg_replace('/[^a-z0-9]/i', '', str_replace(' ', '', $project['industry_name'])));
                                        $feature_class = ($project['feature_status'] == 1) ? 'nd-featureproject' : '';
                                        $king_class = ($project['king_status'] == 1) ? 'nd-kingproject' : '';
                                        $pro_url = strtolower(str_replace(' ', '-', $project['pro_tile']));
                                        ?>
                                        <div
                                            class="col-xl-3 col-lg-4 col-sm-6 nd-portfolio <?php echo "$industry_class $feature_class $king_class"; ?>">
                                            <div class="portfolio-item p-2">
                                                <div class="portfolio-image shadow-lg rounded">
                                                    <a href="project/<?php echo htmlspecialchars($project['pro_url']); ?>"
                                                        target="_blank">
                                                        <img class="lazy"
                                                            src="project/project_upload/<?php echo $project['project_image'] ?? 'default.jpg'; ?>"
                                                            height="242" alt="Live Preview">
                                                    </a>
                                                </div>
                                                <div class="portfolio-desc text-center pt-4 pb-0">
                                                    <h3>
                                                        <a href="project/<?php echo htmlspecialchars($project['pro_url']); ?>"
                                                            target="_blank"
                                                            class="d-flex align-items-center justify-content-center">
                                                            <?php echo htmlspecialchars($project['pro_tile']); ?>
                                                        </a>
                                                    </h3>
                                                    <span><?php echo htmlspecialchars($project['industry_name']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div id="loader" class="text-center my-4" style="display: none;">
                                    <img src="images/loader.gif" alt="Loading..." style="width: 50px;">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 py-6 section" id=section-homepage>
                    <div class="container-fluid px-5">
                        <div class="text-center text-center border-bottom-0 heading-block">
                            <h2 class=text-transform-none style=font-size:2rem;line-height:1.2;letter-spacing:-1px>
                                <span>Home-Page</span> Demos
                            </h2>
                        </div>
                        <div class="g-5 row">
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow"><a href=index-corporate.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage2.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-corporate.html target=_blank>Corporate 1</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow"><a href=index-corporate-2.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage3.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-corporate-2.html target=_blank>Corporate 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow"><a href=index-corporate-3.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage30.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-corporate-3.html target=_blank>Corporate 3</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow"><a href=index-corporate-4.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage4.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-corporate-4.html target=_blank>Corporate 4</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow"><a href=index-portfolio-2.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage5.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-portfolio-2.html target=_blank>Portfolio 1</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-portfolio-3.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage6.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-portfolio-3.html target=_blank>Portfolio 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-portfolio-4.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage7.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-portfolio-4.html target=_blank>Portfolio 3</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-blog.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage8.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-blog.html target=_blank>Home Blog</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-shop.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage9.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-shop.html target=_blank>eCommerce 1</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-shop-2.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage10.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-shop-2.html target=_blank>eCommerce 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-magazine-3.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage11.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-magazine-3.html target=_blank>Magazine 1</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-magazine.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage12.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-magazine.html target=_blank>Magazine 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-magazine-2.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage13.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-magazine-2.html target=_blank>Magazine 3</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-onepage.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage18.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-onepage.html target=_blank>OnePage Default</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-onepage-2.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage19.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-onepage-2.html target=_blank>OnePage SubMenu</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-onepage-3.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage20.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-onepage-3.html target=_blank>OnePage Dots Menu</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-wedding.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage21.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-wedding.html target=_blank>Wedding</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-restaurant.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage22.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-restaurant.html target=_blank>Restaurant</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-events.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage23.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-events.html target=_blank>Events</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-parallax.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage24.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-parallax.html target=_blank>Parallax</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-app-showcase.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage25.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-app-showcase.html target=_blank>App Showcase</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=landing.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage14.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=landing.html target=_blank>Landing 1</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=landing-2.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage15.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=landing-2.html target=_blank>Landing 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=landing-4.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage16.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=landing-4.html target=_blank>Landing 3</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=landing-5.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage17.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=landing-5.html target=_blank>Landing 4</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=header-floating.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage26.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=header-floating.html target=_blank>Floating Header</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=coming-soon-2.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage27.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=coming-soon-2.html target=_blank>Coming Soon 1</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=coming-soon.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage28.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=coming-soon.html target=_blank>Coming Soon 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-rtl.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage30.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-rtl.html target=_blank>RTL</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=index-dark.html
                                            target=_blank><img alt="Live Preview" class=lazy
                                                data-src=images/intro/multipage/homepage1.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=index-dark.html target=_blank>Dark</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 py-6 section bg-transparent" id=section-onepage>
                    <div class="container-fluid px-5">
                        <div class="text-center text-center border-bottom-0 heading-block">
                            <h2 class=text-transform-none style=font-size:2rem;line-height:1.2;letter-spacing:-1px>
                                <span>One-Page</span> Demos
                            </h2>
                        </div>
                        <div class="g-5 row">
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-index.html
                                            target=_blank><img alt=Default class=lazy
                                                data-src=images/intro/onepage/homepage1.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-index.html target=_blank>Default</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-designer.html
                                            target=_blank><img alt=Designer class=lazy
                                                data-src=images/intro/onepage/designer.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-designer.html target=_blank>Designer</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-parallax.html
                                            target=_blank><img alt=Parallax class=lazy
                                                data-src=images/intro/onepage/parallax.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-parallax.html target=_blank>Parallax</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-tourism.html
                                            target=_blank><img alt=Tourism class=lazy
                                                data-src=images/intro/onepage/tourism.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-tourism.html target=_blank>Tourism</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-developer.html
                                            target=_blank><img alt=Developer class=lazy
                                                data-src=images/intro/onepage/developer.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-developer.html target=_blank>Developer</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-pet.html
                                            target=_blank><img alt=Pet class=lazy data-src=images/intro/onepage/pet.jpg
                                                height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-pet.html target=_blank>Pet</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-yoga.html
                                            target=_blank><img alt=Yoga class=lazy
                                                data-src=images/intro/onepage/yoga.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-yoga.html target=_blank>Yoga</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-portrait.html
                                            target=_blank><img alt=Portrait class=lazy
                                                data-src=images/intro/onepage/portrait.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-portrait.html target=_blank>Portrait</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-articles.html
                                            target=_blank><img alt=Articles class=lazy
                                                data-src=images/intro/onepage/articles.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-articles.html target=_blank>Articles</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-plan-subscription.html
                                            target=_blank><img alt="Plan Subscription" class=lazy
                                                data-src=images/intro/onepage/plan-subscription.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-plan-subscription.html target=_blank>Plan Subscription</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-interior.html
                                            target=_blank><img alt=Interior class=lazy
                                                data-src=images/intro/onepage/interior.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-interior.html target=_blank>Interior</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-watch.html
                                            target=_blank><img alt=Watch class=lazy
                                                data-src=images/intro/onepage/watch.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-watch.html target=_blank>Watch</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-subscription-section.html target=_blank><img
                                                alt="Subscription Section" class=lazy
                                                data-src=images/intro/onepage/subscription.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-subscription-section.html target=_blank>Subscription Section</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-apartment.html
                                            target=_blank><img alt=Apartment class=lazy
                                                data-src=images/intro/onepage/apartment.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-apartment.html target=_blank>Apartment</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-outdoors.html
                                            target=_blank><img alt=Outdoors class=lazy
                                                data-src=images/intro/onepage/outdoors.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-outdoors.html target=_blank>Outdoors</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-frame.html
                                            target=_blank><img alt=Frame class=lazy
                                                data-src=images/intro/onepage/frame.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-frame.html target=_blank>Frame</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-holiday.html
                                            target=_blank><img alt=Holiday class=lazy
                                                data-src=images/intro/onepage/homepage42.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-holiday.html target=_blank>Holiday</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-personal.html
                                            target=_blank><img alt=Personal class=lazy
                                                data-src=images/intro/onepage/homepage44.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-personal.html target=_blank>Personal</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-carousel.html
                                            target=_blank><img alt=Services class=lazy
                                                data-src=images/intro/onepage/homepage43.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-carousel.html target=_blank>Services</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-pricing.html
                                            target=_blank><img alt=Pricing class=lazy
                                                data-src=images/intro/onepage/homepage45.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-pricing.html target=_blank>Pricing</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-subscription.html
                                            target=_blank><img alt="Simple Subscription" class=lazy
                                                data-src=images/intro/onepage/homepage31.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-subscription.html target=_blank>Subscription Page</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-register.html
                                            target=_blank><img alt="Register Form" class=lazy
                                                data-src=images/intro/onepage/homepage32.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-register.html target=_blank>Register Form</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-register-2.html
                                            target=_blank><img alt="Register Form 2" class=lazy
                                                data-src=images/intro/onepage/homepage33.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-register-2.html target=_blank>Register Form 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-device.html
                                            target=_blank><img alt="Landing Page" class=lazy
                                                data-src=images/intro/onepage/homepage34.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-device.html target=_blank>Landing Page</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-browser.html
                                            target=_blank><img alt="Browser Slide" class=lazy
                                                data-src=images/intro/onepage/homepage35.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-browser.html target=_blank>Browser Slide</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-register-testimonials.html target=_blank><img
                                                alt="Testimonials Register Form" class=lazy
                                                data-src=images/intro/onepage/homepage36.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-register-testimonials.html target=_blank>Testimonials Form</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-event.html
                                            target=_blank><img alt="Event Slider" class=lazy
                                                data-src=images/intro/onepage/homepage37.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-event.html target=_blank>Event Slide</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-video-event-form.html
                                            target=_blank><img alt="Video Event" class=lazy
                                                data-src=images/intro/onepage/homepage38.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-video-event-form.html target=_blank>Video Event</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-chart.html
                                            target=_blank><img alt=Chart class=lazy
                                                data-src=images/intro/onepage/homepage39.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-chart.html target=_blank>Chart Slide</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-section-2.html
                                            target=_blank><img alt="Slider Section" class=lazy
                                                data-src=images/intro/onepage/homepage40.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-section-2.html target=_blank>Slider Section</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-section.html
                                            target=_blank><img alt="Text Rotator Section" class=lazy
                                                data-src=images/intro/onepage/homepage41.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=one-page/index-section.html target=_blank>Text Rotator Section</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=one-page/index-dark.html
                                            target=_blank><img alt="Dark Scheme" class=lazy
                                                data-src=images/intro/onepage/homepage2.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=one-page/index-dark.html target=_blank>Dark Scheme</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-big-text.html
                                            target=_blank><img alt="Big Text Slider" class=lazy
                                                data-src=images/intro/onepage/homepage3.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-big-text.html target=_blank>Big Text Slider</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-canvas-slider.html
                                            target=_blank><img alt="Canvas Slider" class=lazy
                                                data-src=images/intro/onepage/homepage4.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-canvas-slider.html target=_blank>Canvas Slider</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-canvas-fade-slider.html
                                            target=_blank><img alt="Canvas Fade Slider" class=lazy
                                                data-src=images/intro/onepage/homepage5.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-canvas-fade-slider.html target=_blank>Canvas Fade Slider</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-video-event.html
                                            target=_blank><img alt="HTML5 Video Play Event" class=lazy
                                                data-src=images/intro/onepage/homepage28.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-video-event.html target=_blank>HTML5 Video Play Event</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-counter.html
                                            target=_blank><img alt="Hero Counter" class=lazy
                                                data-src=images/intro/onepage/homepage7.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-counter.html target=_blank>Hero Counter</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-counter-2.html
                                            target=_blank><img alt="Hero Counter 2" class=lazy
                                                data-src=images/intro/onepage/homepage6.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-counter-2.html target=_blank>Hero Counter 2</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-dots.html
                                            target=_blank><img alt="Dots Menu" class=lazy
                                                data-src=images/intro/onepage/homepage8.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-dots.html target=_blank>Dots Menu</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-html5-video-dark.html
                                            target=_blank><img alt="HTML5 Video Dark" class=lazy
                                                data-src=images/intro/onepage/homepage9.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-html5-video-dark.html target=_blank>HTML5 Video Dark</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-html5-video-light.html
                                            target=_blank><img alt="HTML5 Video Light" class=lazy
                                                data-src=images/intro/onepage/homepage10.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-html5-video-light.html target=_blank>HTML5 Video Light</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-image-grid-video-lightbox.html target=_blank><img
                                                alt="Split Grid Video Lightbox" class=lazy
                                                data-src=images/intro/onepage/homepage11.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-image-grid-video-lightbox.html target=_blank>Split Grid Video
                                                Lightbox</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-lightbox-video.html
                                            target=_blank><img alt="Video Lightbox Button" class=lazy
                                                data-src=images/intro/onepage/homepage12.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-lightbox-video.html target=_blank>Video Lightbox Button</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-owl-slider-video.html
                                            target=_blank><img alt="Video Carousel" class=lazy
                                                data-src=images/intro/onepage/homepage13.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-owl-slider-video.html target=_blank>Video Carousel</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-owl-slider.html
                                            target=_blank><img alt="Image Carousel" class=lazy
                                                data-src=images/intro/onepage/homepage14.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-owl-slider.html target=_blank>Image Carousel</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-parallax-dark-image-full.html target=_blank><img
                                                alt="Fullscreen Parallax Dark" class=lazy
                                                data-src=images/intro/onepage/homepage15.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-parallax-dark-image-full.html target=_blank>Fullscreen Parallax
                                                Dark</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-parallax-dark-image-fullwidth.html target=_blank><img
                                                alt="Fullwidth Parallax Dark" class=lazy
                                                data-src=images/intro/onepage/homepage16.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-parallax-dark-image-fullwidth.html target=_blank>Fullwidth
                                                Parallax Dark</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-parallax-light-image-full.html target=_blank><img
                                                alt="Fullscreen Parallax Light" class=lazy
                                                data-src=images/intro/onepage/homepage17.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-parallax-dark-image-full.html target=_blank>Fullscreen Parallax
                                                Light</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-parallax-light-image-fullwidth.html target=_blank><img
                                                alt="Fullwidth Parallax Light" class=lazy
                                                data-src=images/intro/onepage/homepage18.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-parallax-light-image-fullwidth.html target=_blank>Fullwidth
                                                Parallax Light</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-portfolio.html
                                            target=_blank><img alt="Portfolio Agency" class=lazy
                                                data-src=images/intro/onepage/homepage20.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-portfolio.html target=_blank>Portfolio Agency</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-portfolio-side-header.html target=_blank><img
                                                alt="Portfolio Side Header" class=lazy
                                                data-src=images/intro/onepage/homepage19.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-portfolio-side-header.html target=_blank>Portfolio Side
                                                Header</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-revolution-fullscreen.html target=_blank><img
                                                alt="Fullscreen Revolution" class=lazy
                                                data-src=images/intro/onepage/homepage21.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-revolution-fullscreen.html target=_blank>Fullscreen
                                                Revolution</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a
                                            href=op-revolution-fullwidth.html target=_blank><img
                                                alt="Fullwidth Revolution" class=lazy
                                                data-src=images/intro/onepage/homepage22.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-revolution-fullwidth.html target=_blank>Fullwidth Revolution</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-side-header.html
                                            target=_blank><img alt="Side Header Menu" class=lazy
                                                data-src=images/intro/onepage/homepage23.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-side-header.html target=_blank>Side Header Menu</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-tr-blank-dark.html
                                            target=_blank><img alt="Text Rotator Dark" class=lazy
                                                data-src=images/intro/onepage/homepage24.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-tr-blank-dark.html target=_blank>Text Rotator Dark</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-tr-blank.html
                                            target=_blank><img alt="Text Rotator Light" class=lazy
                                                data-src=images/intro/onepage/homepage25.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-tr-blank.html target=_blank>Text Rotator Light</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-tr-image-dark.html
                                            target=_blank><img alt="Text Rotator Image Dark" class=lazy
                                                data-src=images/intro/onepage/homepage26.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-tr-image-dark.html target=_blank>Text Rotator Image Dark</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-tr-image-light.html
                                            target=_blank><img alt="Text Rotator Image Light" class=lazy
                                                data-src=images/intro/onepage/homepage27.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-tr-image-light.html target=_blank>Text Rotator Image Light</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-video-grid-2.html
                                            target=_blank><img alt="Video Grid Hover Play" class=lazy
                                                data-src=images/intro/onepage/homepage29.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-video-grid-2.html target=_blank>Video Grid Hover Play</a></h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1-5 col-lg-3 col-sm-6">
                                <div class=portfolio-item>
                                    <div class="portfolio-image rounded-3 shadow-lg"><a href=op-video-grid.html
                                            target=_blank><img alt="Video Grid 2 Hover Play" class=lazy
                                                data-src=images/intro/onepage/homepage30.jpg height=172
                                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 135 86'%3E%3C/svg%3E"
                                                width=270></a></div>
                                    <div class="text-center pb-0 portfolio-desc">
                                        <h3><a href=op-video-grid.html target=_blank>Video Grid 2 Hover Play</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 py-6 section" id=section-features>
                    <div class=shape-divider data-height=36 data-shape=wave></div>
                    <div class=shape-divider data-height=36 data-shape=wave data-position=bottom></div>
                    <div class="container mb-6">
                        <div class="mb-5 pb-3 text-center">
                            <h2 class="fw-semibold fs-1 mb-1">Core Features</h2><span class="fs-5 fw-light">Features
                                that make <strong class=color>Canvas</strong> stand out from the Crowd</span>
                        </div>
                        <div class="mb-5 align-items-stretch g-4 justify-content-center row">
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-magic></i></div>
                                    <h3 class="fs-5 mb-2">180+ Main Demos</h3>
                                    <p class="fw-light mb-4">Beautiful Category Specific Prebuilt Websites with distinct
                                        features and layouts.</p><span class=mt-auto><a class="more-link px-0" href="#"
                                            section-niche data-scrollto=#section-niche>Browse Demos</a></span>
                                    <div class="color bg-icon bi-layout-wtf"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-palette></i></div>
                                    <h3 class="fs-5 mb-2">Super Customizable</h3>
                                    <p class="fw-light mb-4">Your Website any way with powerful features like SCSS & CSS
                                        Variables included.</p><span class=mt-auto><a class="more-link px-0" href="#"
                                            cnvs-style-switcher aria-controls=cnvs-style-switcher
                                            data-bs-target=#cnvs-style-switcher data-bs-toggle=offcanvas>Use
                                            Customizer</a></span>
                                    <div class="color bg-icon bi-gear"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-ui-checks></i></div>
                                    <h3 class="fs-5 mb-2">Powerful Forms</h3>
                                    <p class="fw-light mb-4">Dyncamic Forms Processor with SPAM Protection,
                                        Auto-Responders & reCaptcha.</p><span class=mt-auto><a class="more-link px-0"
                                            href="#" section-forms data-scrollto=#section-forms
                                            data-offset="100">Explore
                                            Forms</a></span>
                                    <div class="color bg-icon bi-shield-check"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-speedometer></i></div>
                                    <h3 class="fs-5 mb-2">Ultra High Performance</h3>
                                    <p class="fw-light mb-4">Canvas has been optimized to deliver your Websites quickly
                                        to your Visitors.</p><span class=mt-auto><a class="more-link px-0"
                                            href="https://pagespeed.web.dev/report?url=https%3A%2F%2Fcanvastemplate.com%2Fdemo-app-landing.html&amp;form_factor=desktop"
                                            target=_blank>Get Live Score</a></span>
                                    <div class="color bg-icon bi-wind"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-lightbulb></i> <i
                                            class="ms-3 bi-view-stacked"></i></div>
                                    <h3 class="fs-5 mb-2">Tons of Elements</h3>
                                    <p class="fw-light mb-4">80+ Elements & 2000+ UI Features included to create an
                                        Attractive Website.</p><span class=mt-auto><a class="more-link px-0" href="#"
                                            section-shortcodes data-scrollto=#section-shortcodes
                                            data-offset="-70">Browse All Elements</a></span>
                                    <div class="color bg-icon bi-lightbulb"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-phone></i> <i
                                            class="ms-3 bi-display"></i></div>
                                    <h3 class="fs-5 mb-2">Custom Breakpoints</h3>
                                    <p class="fw-light mb-4">Flexible Custom Breakpoints for Responsive Menus in just
                                        One Line of Code.</p><span class=mt-auto><a class="more-link px-0"
                                            href=https://docs.semicolonweb.com/docs/header/mobile-menus/
                                            target=_blank>Read Documentation</a></span>
                                    <div class="color bg-icon bi-phone"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-circle-half></i> <i
                                            class="ms-3 bi-toggle-off"></i></div>
                                    <h3 class="fs-5 mb-2">Dark Mode</h3>
                                    <p class="fw-light mb-4">Canvas supports dynamic & Nested Dark Modes on any Element
                                        or Sections.</p><span class=mt-auto><a class="more-link body-scheme-toggle"
                                            href="#" data-bodyclass-toggle=dark>Enable Dark Mode</a></span>
                                    <div class="color bg-icon bi-circle-half"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-translate></i></div>
                                    <h3 class="fs-5 mb-2">RTL Compatibility</h3>
                                    <p class="fw-light mb-4">Canvas is fully Compatible with RTL Languages & Styles for
                                        RTL Layouts are included.</p><span class=mt-auto><a class="more-link px-0"
                                            href=http://support.semicolonweb.com/forums/forum/canvas-html/
                                            target=_blank>Check RTL Layout</a></span>
                                    <div class="color bg-icon bi-translate"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class="fa-brands fa-node"></i> <i
                                            class="ms-3 fa-brands fa-gulp"></i></div>
                                    <h3 class="fs-5 mb-2">Gulp & NodeJS</h3>
                                    <p class="fw-light mb-4">Get Production Ready with Gulp & NodeJS Workflow and
                                        Optimize Everything.</p><span class=mt-auto><a class="more-link px-0"
                                            href=http://support.semicolonweb.com/forums/forum/canvas-html/
                                            target=_blank>Start with Gulp.js</a></span>
                                    <div class="color bg-icon fa-brands fa-sass"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-stars></i> <span
                                            class="d-inline-block ms-1">5.0</span></div>
                                    <h3 class="fs-5 mb-2">5-Star Reviews</h3>
                                    <p class="fw-light mb-4">Highly Rated by Our Customers who find Canvas easy-to-use &
                                        customize.</p><span class=mt-auto><a class="more-link px-0" href="#"
                                            section-testimonials data-scrollto=#section-testimonials>Read
                                            Reviews</a></span>
                                    <div class="color bg-icon bi-stars"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-hand-thumbs-up></i> <i
                                            class="ms-3 bi-emoji-smile"></i></div>
                                    <h3 class="fs-5 mb-2">Stellar Support</h3>
                                    <p class="fw-light mb-4">Our Support Team has got you covered, 12000+ Support
                                        Tickets/Comments resolved.</p><span class=mt-auto><a class="more-link px-0"
                                            href=http://support.semicolonweb.com/forums/forum/canvas-html/
                                            target=_blank>Get Support</a></span>
                                    <div class="color bg-icon bi-emoji-smile"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xl-3">
                                <div class="d-flex all-ts bg-contrast-0 border border-default flex-column grid-inner h-100 h-shadow-sm h-translate-y p-5 rounded-6"
                                    data-class=dark:bg-contrast-100>
                                    <div class="color d-flex fs-1 mb-3"><i class=bi-clock-history></i> <span
                                            class="ms-3 d-inline-block">9+</span></div>
                                    <h3 class="fs-5 mb-2">Lifetime Free Updates</h3>
                                    <p class="fw-light mb-4">Canvas has been evolving since almost 9 Years & is the #1
                                        Template on the Market.</p><span class=mt-auto><a class="more-link px-0"
                                            href=https://docs.semicolonweb.com/docs-group/changelog/ target=_blank>Check
                                            Changelogs</a></span>
                                    <div class="color bg-icon bi-clock-history"
                                        style=opacity:.05;bottom:-85px;right:-70px;z-index:-1></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=container>
                        <h2 class="text-center mb-6">See what's included in <span class=fw-bold>Canvas</span>:</h2>
                        <div class="row tab-hover">
                            <div class=col-md-3>
                                <div class="flex-md-column justify-content-around justify-content-lg-start nav"><a
                                        href="#" intro-features-tab class="nav-link active">More Features</a> <a
                                        href="#" intro-headers-tab class=nav-link>Headers</a>
                                    <ahref="#"intro-portfolios-tab class=nav-link>Portfolios</a>
                                        <ahref="#"intro-blogs-tab class=nav-link>Blogs</a>
                                            <ahref="#"intro-shops-tab class=nav-link>Shops</a>
                                </div>
                            </div>
                            <div class=col-md-9>
                                <div class=intro-showcase-section id=intro-features-tab>
                                    <div class="d-flex flex-wrap">
                                        <div class="mb-4 text-center px-2 w-20"><img alt="Retina Ready"
                                                src=images/intro/targets/features/retina.png height=60>
                                            <h3>Retina Ready</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/sliders.png height=60>
                                            <h3>Premium Sliders</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/side-panel.png height=60>
                                            <h3>Side Panels</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/headers.png height=60>
                                            <h3>Unique Headers</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/responsive.png height=60>
                                            <h3>100% Responsive</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/widgets.png height=60>
                                            <h3>Functional Widgets</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/menu.png height=60>
                                            <h3>25+ Menu Styles</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/ajax.png height=60>
                                            <h3>Ajax Form & Portfolio</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/footer.png height=60>
                                            <h3>12+ Footers Styles</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/rtl.png height=60>
                                            <h3>RTL Available</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/templates.png height=60>
                                            <h3>1400+ Templates</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/parallax.png height=60>
                                            <h3>Parallax Integration</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/wide-boxed.png height=60>
                                            <h3>Wide & Boxed Layout</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/color.png height=60>
                                            <h3>Unlimited Colors</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/seo.png height=60>
                                            <h3>SEO Optimized</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/font.png height=60>
                                            <h3>Google Fonts</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/plugins.png height=60>
                                            <h3>Premium Plugins</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/updates.png height=60>
                                            <h3>Free Updates</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/alternate-logo.png height=60>
                                            <h3>Alt. Logo for Mobile</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/ecommerce.png height=60>
                                            <h3>Ecommerce Templates</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/megamenu.png height=60>
                                            <h3>Mega Menu</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/lightbox.png height=60>
                                            <h3>Lightbox Integration</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/videos.png height=60>
                                            <h3>Tutorial Videos</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/documentation.png height=60>
                                            <h3>Documentation</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/charts.png height=60>
                                            <h3>Chart Variations</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/modal.png height=60>
                                            <h3>Modal Popover</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/loader.png height=60>
                                            <h3>14+ Page Loaders</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/bootstrap4.png height=60>
                                            <h3>Bootstrap 5.x</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/dark.png height=60>
                                            <h3>Dark Version</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/less.png height=60>
                                            <h3>Sass Available</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/event-calendar.png height=60>
                                            <h3>Event Calendar</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/range-slider.png height=60>
                                            <h3>Range Slider</h3>
                                        </div>
                                        <div class="mb-4 text-center px-2 w-20"><img alt=Image
                                                src=images/intro/targets/features/sticky-sidebar.png height=60>
                                            <h3>Sticky Sidebar</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class=intro-showcase-section id=intro-headers-tab>
                                    <div class=row><a href=header-light.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/1.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Classic</h3>
                                        </a><a href=header-dark.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/25.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Dark</h3>
                                        </a><a href=index-restaurant.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/2.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Bottom</h3>
                                        </a><a href=op-apartment.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/3.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Left Aligned</h3>
                                        </a><a href=index-corporate-4.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/4.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Transparent</h3>
                                        </a><a href=demo-car.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/21.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Right Logo</h3>
                                        </a><a href=header-semi-transparent.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/26.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Semi Transparent</h3>
                                        </a><a href=index-parallax.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/6.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Bottom Transparent</h3>
                                        </a><a href=index-shop.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/5.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Top-Bar</h3>
                                        </a><a href=index-magazine-3.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/7.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Left Bottom</h3>
                                        </a><a href=demo-construction.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/8.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Bottom Extras</h3>
                                        </a><a href=index-blog.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/9.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Center Bottom</h3>
                                        </a><a href=demo-real-estate.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/10.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Transparent Top-Bar</h3>
                                        </a><a href=demo-app-landing.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/11.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Center</h3>
                                        </a><a href=demo-course.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/20.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Flex Bottom</h3>
                                        </a><a href=demo-ecommerce.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/22.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Bordered</h3>
                                        </a><a href=demo-bike.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/12.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Modern</h3>
                                        </a><a href=demo-resume.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/23.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">With Icons</h3>
                                        </a><a href=demo-barber.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/24.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Section text-Center</h3>
                                        </a><a href=op-side-header.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/13.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Left Sidebar</h3>
                                        </a><a href=header-side-right.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/14.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Right Sidebar</h3>
                                        </a><a href=header-side-right-open.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/15.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Push Open</h3>
                                        </a><a href=header-floating.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/16.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Floating</h3>
                                        </a><a href=op-frame.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/17.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Framed</h3>
                                        </a><a href=menu-10.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/18.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Overlay</h3>
                                        </a><a href=static-sticky.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/27.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Static Sticky</h3>
                                        </a><a href=responsive-sticky.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/28.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Responsive Sticky</h3>
                                        </a><a href=logo-changer.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/1.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Sticky Different Logo</h3>
                                        </a><a href=alternate-mobile-menu.html class="mb-4 text-center col-3 col-md-2"
                                            target=_blank><img alt=Image src=images/intro/targets/headers/29.png
                                                style="max-width:100px;height:auto">
                                            <h3 class="fw-medium mt-2">Alternate Mobile Menu</h3>
                                        </a></div>
                                </div>
                                <div class=intro-showcase-section id=intro-portfolios-tab>
                                    <div class="row mb-5">
                                        <div class=col-md-4><a href=portfolio-mixed-masonry.html><img alt=Image
                                                    src=images/intro/targets/portfolio/4.jpg
                                                    class="rounded shadow"></a><a
                                                href=portfolio-single-thumbs-fullwidth.html class="d-block mt-4"><img
                                                    alt=Image src=images/intro/targets/portfolio/7.jpg
                                                    class="rounded shadow"></a></div>
                                        <div class=col-md-4><a href=portfolio-ajax.html class=d-block><img alt=Image
                                                    src=images/intro/targets/portfolio/2.jpg
                                                    class="rounded shadow"></a><a href=portfolio.html
                                                class="d-block mt-4"><img alt=Image
                                                    src=images/intro/targets/portfolio/5.jpg class="rounded shadow"></a>
                                        </div>
                                        <div class=col-md-4><a href=portfolio-1.html class="mb-4 d-block"><img alt=Image
                                                    src=images/intro/targets/portfolio/3.jpg
                                                    class="rounded shadow"></a><a href=portfolio-3-masonry.html
                                                class="d-block my-4"><img alt=Image
                                                    src=images/intro/targets/portfolio/6.jpg
                                                    class="rounded shadow"></a><a href=portfolio.html
                                                class="fw-medium bg-color btn button-rounded m-0 shadow-sm text-white w-100"
                                                style="padding:10px 22px">Browse More <i
                                                    class="bi-arrow-right position-relative" style=top:1px></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class=intro-showcase-section id=intro-blogs-tab>
                                    <div class="row mb-5">
                                        <div class=col-md-9><img alt=Image src=images/intro/targets/blogs/1.jpg
                                                class="rounded shadow"></div>
                                        <div class=col-md-3><a href=blog-masonry-full.html class="mb-4 d-block"><img
                                                    alt=Image src=images/intro/targets/blogs/2.jpg
                                                    class="rounded shadow"></a><a href=demo-modern-blog.html
                                                class="mb-4 d-block"><img alt=Image src=images/intro/targets/blogs/3.jpg
                                                    class="rounded shadow"></a><a href=blog.html
                                                class="fw-medium bg-color btn button-rounded m-0 shadow-sm text-white w-100"
                                                style="padding:10px 22px">Browse More <i
                                                    class="bi-arrow-right position-relative" style=top:1px></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class=intro-showcase-section id=intro-shops-tab>
                                    <div class="row mb-5">
                                        <div class=col-md-9><a href=demo-shop.html><img alt=Image
                                                    src=images/intro/targets/shops/1.jpg class="rounded shadow"></a>
                                        </div>
                                        <div class=col-md-3><a href=demo-ecommerce.html class="mb-4 d-block"><img
                                                    alt=Image src=images/intro/targets/shops/2.jpg
                                                    class="rounded shadow"></a><a href=shop-3.html
                                                class="mb-4 d-block"><img alt=Image src=images/intro/targets/shops/3.jpg
                                                    class="rounded shadow"></a><a href=shop.html
                                                class="fw-medium bg-color btn button-rounded m-0 shadow-sm text-white w-100"
                                                style="padding:10px 22px">Browse More <i
                                                    class="bi-arrow-right position-relative" style=top:1px></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="section-blocks" class="section page-section bg-transparent my-0" style="padding: 100px 0;">
                    <div class="container">
                        <div class="heading-block text-center border-bottom-0 mw-xs mx-auto">
                            <h2 class="text-transform-none mb-4 text-dark"
                                style="font-size: calc( 1.75rem + 1.7vw ); letter-spacing: -1px;">Blocks</h2>
                            <p class="lead mb-5 text-dark">Get Started with Canvas quickly using the premade Section
                                Blocks. Just Copy, Paste and Assemble.
                        </div>
                        <div class="d-xl-flex justify-content-xl-start position-relative section-blocks-imgs"><img
                                width="840" height="530"
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 84 53'%3E%3C/svg%3E"
                                data-src="images/intro/blocks/1.png" alt="Image" class="lazy rounded"
                                data-animate="fadeInLeft"> <img width="472" height="307"
                                src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 472 307'%3E%3C/svg%3E"
                                data-src="images/intro/blocks/2.png" alt="Image" class="lazy position-absolute"
                                data-animate="fadeInUp" data-delay="500"></div>
                        <div class="row justify-content-center col-mb-50 gutter-50 mt-6 mw-md mx-auto dark pt-4">
                            <div class="col-6 col-lg-4 text-center px-lg-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="42" height="42" fill="#FFFFFF" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none"></rect>
                                    <rect x="48" y="48" width="64" height="64" opacity="0.2"></rect>
                                    <rect x="144" y="48" width="64" height="64" opacity="0.2"></rect>
                                    <rect x="48" y="144" width="64" height="64" opacity="0.2"></rect>
                                    <rect x="144" y="144" width="64" height="64" opacity="0.2"></rect>
                                    <rect x="144" y="144" width="64" height="64" stroke-width="16" stroke="#FFFFFF"
                                        stroke-linecap="round" stroke-linejoin="round" fill="none"></rect>
                                    <rect x="48" y="48" width="64" height="64" stroke-width="16" stroke="#FFFFFF"
                                        stroke-linecap="round" stroke-linejoin="round" fill="none"></rect>
                                    <rect x="144" y="48" width="64" height="64" stroke-width="16" stroke="#FFFFFF"
                                        stroke-linecap="round" stroke-linejoin="round" fill="none"></rect>
                                    <rect x="48" y="144" width="64" height="64" stroke-width="16" stroke="#FFFFFF"
                                        stroke-linecap="round" stroke-linejoin="round" fill="none"></rect>
                                </svg>
                                <h4 class="my-3">Many Options</h4>
                                <p class="fw-normal op-06">Includes 220+ Pre-built Blocks across categories.
                            </div>
                            <div class="col-6 col-lg-4 text-center px-lg-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="42" height="42" fill="#FFFFFF" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none"></rect>
                                    <rect x="39.98633" y="71.99512" width="144.00586" height="144" opacity="0.2"></rect>
                                    <polyline points="215.993 183.995 215.993 39.994 71.986 39.994" fill="none"
                                        stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16"></polyline>
                                    <rect x="39.98633" y="71.99512" width="144.00586" height="144" stroke-width="16"
                                        stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round" fill="none">
                                    </rect>
                                </svg>
                                <h4 class="my-3">Easy Setup</h4>
                                <p class="fw-normal op-06">Just Copy, Paste &amp; Assemble on any Template or Section.
                            </div>
                            <div class="col-6 col-lg-4 text-center px-lg-5"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="42" height="42" fill="#FFFFFF" viewBox="0 0 256 256">
                                    <rect width="256" height="256" fill="none"></rect>
                                    <path
                                        d="M63.99986,216a8,8,0,0,1-8-8.00009l.00053-42.69468a28,28,0,1,1,0-50.61044L55.99988,72.0001A8,8,0,0,1,64,64l46.69456.00053a27.99993,27.99993,0,1,1,50.61031,0L207.99939,64a8,8,0,0,1,8.00007,7.9999L216,114.69478a28,28,0,1,0,0,50.61044l-.00053,42.69487a8,8,0,0,1-8,7.9999Z"
                                        opacity="0.2"></path>
                                    <path
                                        d="M63.99986,216a8,8,0,0,1-8-8.00009l.00053-42.69468a28,28,0,1,1,0-50.61044L55.99988,72.0001A8,8,0,0,1,64,64l46.69456.00053a27.99993,27.99993,0,1,1,50.61031,0L207.99939,64a8,8,0,0,1,8.00007,7.9999L216,114.69478a28,28,0,1,0,0,50.61044l-.00053,42.69487a8,8,0,0,1-8,7.9999Z"
                                        fill="none" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="16"></path>
                                </svg>
                                <h4 class="my-3">Customizable</h4>
                                <p class="fw-normal op-06">Easily modify the Blocks or extend it further.
                            </div>
                        </div>
                        <div class="text-center"><a href="blocks.html" target="_blank"
                                class="button button-white button-light button-large mt-5">Explore Now</a></div>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <div class="col-lg-3 col-md-6 text-center col-padding"
                        style="background-color:rgba(var(--cnvs-contrast-rgb),0.15);">
                        <div><i class="i-plain i-xlarge mx-auto mb-3 bi-images"></i>
                            <div class="counter"><span data-from="10" data-to="170" data-refresh-interval="50"
                                    data-speed="2000"></span>+</div>
                            <h5>Portfolio Layouts</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center col-padding"
                        style="background-color:rgba(var(--cnvs-contrast-rgb),0.12);">
                        <div><i class="i-plain i-xlarge mx-auto mb-3 bi-pencil"></i>
                            <div class="counter"><span data-from="10" data-to="50" data-refresh-interval="50"
                                    data-speed="2500"></span>+</div>
                            <h5>Blog Templates</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center col-padding"
                        style="background-color:rgba(var(--cnvs-contrast-rgb),0.09);">
                        <div><i class="i-plain i-xlarge mx-auto mb-3 bi-puzzle"></i>
                            <div class="counter"><span data-from="10" data-to="70" data-refresh-interval="25"
                                    data-speed="3000"></span>+</div>
                            <h5>Shortcodes</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center col-padding"
                        style="background-color:rgba(var(--cnvs-contrast-rgb),0.06);">
                        <div><i class="i-plain i-xlarge mx-auto mb-3 bi-file-earmark-richtext"></i>
                            <div class="counter"><span data-from="10" data-to="100" data-refresh-interval="30"
                                    data-speed="2700"></span>+</div>
                            <h5>PSD Files</h5>
                        </div>
                    </div>
                </div>
                <div class="section dark my-0">
                    <div class="container">
                        <div class="heading-block text-center border-bottom-0 mb-0">
                            <h3 class="fw-medium text-transform-none" style="font-size: 32px;"><span
                                    class="fw-bold nocolor">1400+</span> Templates to minimize your Development Time!
                            </h3>
                        </div>
                    </div>
                </div>
                <div id="section-forms" class="section page-section bg-transparent my-0">
                    <div class="container">
                        <div class="heading-block text-center border-bottom-0">
                            <h2 class="text-transform-none"
                                style="font-size: 36px; line-height: 1.2; letter-spacing: -1px;">Canvas
                                <span>Forms</span>
                            </h2><span>The Ultimate Form Processor</span>
                        </div><video class="mx-auto my-6 d-block mw-100 lazy"
                            data-poster="images/intro/new/canvas-forms-processor-poster.jpg" preload="auto" loop
                            autoplay muted style="width: 720px;">
                            <source data-src="images/intro/new/canvas-forms-processor.mp4" type="video/mp4">
                        </video>
                        <div class="row">
                            <div class="col-lg-4 px-4 py-3"><i
                                    class="fa-brands fa-wpforms color ms-0 mb-4 i-xlarge i-plain d-block float-none"></i>
                                <h4 class="mb-2">Any Form<span>.</span> Any Field<span>.</span></h4>
                                <p class="text-muted">Add any Field to your Custom Form. Canvas's inbuilt Forms
                                    Processor will handle the rest. You will never have to touch any PHP Codes.
                            </div>
                            <div class="col-lg-4 px-4 py-3"><i
                                    class="fa-solid fa-infinity color ms-0 mb-4 i-xlarge i-plain d-block float-none"></i>
                                <h4 class="mb-2">Unlimited Customizations</h4>
                                <p class="text-muted">Customize anything within the Form, the Fields, the Loaders or the
                                    Messages. You now have complete control over what you want to display.
                            </div>
                            <div class="col-lg-4 px-4 py-3"><i
                                    class="bi-envelope-fill color ms-0 mb-4 i-xlarge i-plain d-block float-none"></i>
                                <h4 class="mb-2">Email Templates</h4>
                                <p class="text-muted">For the First Time ever, Canvas supports Email Templates which
                                    makes your Form Responses super easy to read and organize.
                            </div>
                            <div class="col-lg-4 px-4 py-3"><i
                                    class="fa-solid fa-user-shield color ms-0 mb-4 i-xlarge i-plain d-block float-none"></i>
                                <h4 class="mb-2">reCaptcha & Bot Protection</h4>
                                <p class="text-muted">All the Forms are supported by Bot Protection and Optional
                                    reCaptcha Protection on top of the very secure PHPMailer Engine.
                            </div>
                            <div class="col-lg-4 px-4 py-3"><i
                                    class="fa-solid fa-plug-circle-plus color ms-0 mb-4 i-xlarge i-plain d-block float-none"></i>
                                <h4 class="mb-2">Component Support</h4>
                                <p class="text-muted">All the Components included now works with Canvas Forms.
                                    Datepicker, Range Slider, File Uploads etc. all just work fine.
                            </div>
                            <div class="col-lg-4 px-4 py-3"><i
                                    class="fa-solid fa-envelopes-bulk color ms-0 mb-4 i-xlarge i-plain d-block float-none"></i>
                                <h4 class="mb-2">Auto-Responder &amp; Personalization</h4>
                                <p class="text-muted">Send Auto-Responders to your Form Submitters with Automatic
                                    Personalization. Like "<em>Hey <strong>John</strong>, Thanks for your
                                        Message!</em>".
                            </div>
                        </div>
                        <div class="text-center my-5"><a href="forms.html" target="_blank"
                                class="button button-rounded button-dark button-xlarge">Explore Forms</a></div>
                    </div>
                </div>
                <div id="section-shortcodes" class="overflow-hidden page-section w-100">
                    <div class="section m-0 bg-color text-center">
                        <h2 class="mb-0 text-white">Shortcodes &amp; Components</h2>
                    </div>
                    <div class="container-fluid px-5 py-6">
                        <style>
                            .material-symbols-outlined {
                                display: block;
                                font-size: 3rem;
                            }
                        </style><button type="button" data-ajax-loader="include/ajax/more-elements.html"
                            data-ajax-container="#ajax-more-elements-container" data-ajax-insertion="append"
                            data-ajax-trigger-type="load"
                            data-ajax-loadcss='[{"file":"https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,200,0,0","id":"canvas-material-icons-css"}]'
                            class="btn btn-secondary d-none">Load More Elements</button>
                        <div id="ajax-more-elements-container"></div>
                    </div>
                    <div class="section m-0 bg-dark text-center">
                        <h2 class="mb-0 text-light fw-medium">With more than <span class="fw-bold nocolor">2000+</span>
                            UI Features included</h2>
                    </div>
                </div>
                <div id="section-p-generator" class="section page-section my-0 py-6"
                    style="background-color: rgba(74,117,214,0.06);">
                    <div class="container text-center">
                        <p class="titular-sub-title ls-2 color text-opacity-75 fw-normal mb-2">We know the value of Your
                            Time
                        <h2 class="text-transform-none fw-bold"
                            style="font-size: 42px; line-height: 1.2; letter-spacing: -1px;">Package
                            <span>Generator</span><small class="rounded-2 bg-contrast-200 ms-2 fw-medium ls-0 color"
                                style="font-size: 11px; vertical-align: top; padding: 1px 6px;">Beta</small>
                        </h2>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <p class="">Create a Custom Package by only selecting the Files you need for your
                                    Project. This will help you get started super-quickly without needing to Browse
                                    through the Huge Package we provide by default and then sort the Files you need
                                    manually.</p><a
                                    href="http://docs.semicolonweb.com/docs/getting-started/installation/"
                                    class="button button-large button-light bg-white color rounded text-transform-none fw-semibold ls-0 shadow-sm">View
                                    In Documentation</a>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-lg-7 p-generator-video"><video
                                    class="mt-5 mb-4 shadow rounded-3 position-relative d-block mw-100 lazy"
                                    preload="auto" loop autoplay muted>
                                    <source data-src="images/intro/new/p-generator.mp4" type="video/mp4">
                                </video></div>
                        </div>
                    </div>
                </div>
                <div id="section-hero" class="section parallax scroll-detect page-section m-0 not-dark"
                    style="padding: 150px 0;"><img data-src="images/intro/new/rev-intro.jpg" class="parallax-bg lazy"
                        alt="Revolution Hero Sliders">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 offset-lg-7 col-md-10">
                                <div class="emphasis-title"><span class="before-heading fs-4"
                                        style="font-size: 24px;"><em>Get Started with</em></span>
                                    <h2 class="text-capitalize fw-semibold display-6">140+ Revolution Hero Templates.
                                    </h2>
                                </div><a href="rs-demos.html" target="_blank"
                                    class="button rounded-pill button-border button-large button-black button-fill m-0 text-end"><span>Browse
                                        Now <i class="bi-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="video-wrap d-xl-none d-lg-none">
                        <div class="video-overlay" style="background: rgba(255,255,255,0.9);"></div>
                    </div>
                    <div class="shape-divider" data-shape="wave-4" data-position="bottom" data-height="150"></div>
                </div>
                <div id="section-testimonials" class="section page-section bg-transparent">
                    <div class="container">
                        <div class="heading-block mb-5 text-center border-bottom-0">
                            <h2 class="text-transform-none"
                                style="font-size: 40px; line-height: 1.2; letter-spacing: -1px;">Customer
                                <span>Ratings</span> <span class="nocolor"
                                    style="font-family: 'Playfair Display', serif !important;">&amp;</span>
                                <span>Reviews</span>
                            </h2>
                        </div>
                        <style>
                            .user-testimonials .card {
                                border-color: var(--bs-gray-200);
                            }

                            .user-testimonials .card-body {
                                padding: 2rem;
                            }
                        </style>
                        <div class="row grid-container user-testimonials col-mb-30 mb-5">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Great website template!!!
                                            Does anything you need!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">KennethLeoHodges</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">It's an amazing collection
                                            of templates to build website faster than ever. Clear and simple to use!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">Karsp</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Code quality also customer
                                            support five stars ! A real help that gets us out of isolation. This is the
                                            advantage of pro developers who do the job with passion. Thank you!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">DcRod</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Best buy so far. The
                                            designs are very SEO friendly and neat
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">Jeloblis</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">This is a very flexible
                                            product, and the ability to choose pieces from different templates to build
                                            a whole new creation with minimal fixes is incredible.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">jokele</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">If I could select more
                                            than on main reason for 5 stars i would have. These cats have thought of
                                            everything just about. Plus they are good people. Buy this template. You
                                            wont regret it.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">jqualey</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Great support, great
                                            documentation and you guys done a fantastic job in commenting everything,
                                            makes it very easy to customize, so thank you.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">SmileyDot</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">I wish that I could choose
                                            more than one reason for my 5-star rating! The Design is great, the features
                                            are fantastic, the documentation top-notch, and from what I've read in the
                                            support forum the customer support is great. This is a great template.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">georgewhoffman</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Excellent Template really
                                            versatile and well documented. Makes anyone look like a design professional.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">georgeuser077</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">This is the most robust
                                            template I've ever worked with. So much can be done with this multi-purpose
                                            package. Regular updates and enhancements add tremendous value.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">rmandaro</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">I've been using Canvas for
                                            months now and it has exceeded my expectations. Their support has been great
                                            too.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">kwelch2</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">I like Canvas because of
                                            all the features and their variations, such as the Portfolio. I can do so
                                            many different things with this theme, and I am already using it for my
                                            fourth website.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">vanhove</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">It has almost everything.
                                            Have a feature in mind? Just search for it in this theme, you will
                                            definitely find it. Amazing support as well.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">varunD</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Great customer support. It
                                            is amazing to be on top of these many comments and they are doing it very
                                            well. It is a great addon on top of their amazing template. Thank you.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">PrintAndWeb</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">WOW! Unbelievable amount
                                            of features. Extremely well documented. SUPER easy to customize... there's
                                            just so much to say... it's awesome!!!!!!!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">ktpher</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">It is very convenient that
                                            i can make a lot of pages from my site with uniform design. Code perfectly
                                            described in the documentation. Excellent professional and modern design.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">MoshkovEV</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">The template is very
                                            useful if you want to work on Prototyping of any project before you start!!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">creintech</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Great Design, Features and
                                            Latest Update is Fantastic!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">pauldowling</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">Fast response, whole lot
                                            of features, updates are always there. Keep up the good work! Really glad I
                                            bought it.
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">gunpla</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">This template lives up to
                                            its name, truly a 'Canvas' for your ideas. The versatility and design are
                                            truly exceptional, not to mention the great Support SemiColonWeb provides on
                                            its comments section. Keep up the great work!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">ModularCollective</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="card shadow-sm overflow-hidden">
                                    <div class="card-body">
                                        <p class="text-medium mb-4 font-secondary text-muted">This is excellent! A most
                                            amazing suite of fully customisable options which at times almost presents
                                            too much choice! Ace!
                                        <div class="d-flex mt-2 align-items-center justify-content-between">
                                            <h5 class="fs-6 mb-0 op-08">jcarlisle1966</h5>
                                            <div class="testimonials-rating"><i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i> <i
                                                    class="bi-star-fill"></i> <i class="bi-star-fill"></i></div>
                                        </div>
                                    </div>
                                    <div class="bg-icon bi-star-fill op-03"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><a
                                href="https://themeforest.net/item/canvas-the-multipurpose-html5-template/reviews/9228123?utf8=%E2%9C%93&amp;reviews_controls%5Bsort%5D=ratings_descending"
                                target="_blank" class="btn btn-lg btn-secondary">Check More Reviews</a></div>
                    </div>
                </div>
                <div class="row align-items-stretch grid-border border-top border-default mx-0 mt-6">
                    <div class="col-md-4 p-0 text-center">
                        <div class="grid-inner h-bg-contrast-200"><a
                                href="http://support.semicolonweb.com/forums/forum/canvas-html/" class="d-block py-5"
                                target="_blank"><i class="bi-emoji-smile display-6 mt-2 mb-2 mx-auto d-block"></i> <span
                                    class="fs-5 text-contrast-900 h-text-color fw-medium d-block mb-2">Dedicated
                                    Support</span></a></div>
                    </div>
                    <div class="col-md-4 p-0 text-center">
                        <div class="grid-inner h-bg-contrast-200"><a href="http://docs.semicolonweb.com/"
                                class="d-block py-5" target="_blank"><i
                                    class="bi-book display-6 mt-2 mb-2 mx-auto d-block"></i> <span
                                    class="fs-5 text-contrast-900 h-text-color fw-medium d-block mb-2">Extensive
                                    Documentation</span></a></div>
                    </div>
                    <div class="col-md-4 p-0 text-center">
                        <div class="grid-inner h-bg-contrast-200"><a
                                href="http://docs.semicolonweb.com/docs/getting-started/walkthrough-videos/"
                                class="d-block py-5" target="_blank"><i
                                    class="bi-film display-6 mt-2 mb-2 mx-auto d-block"></i> <span
                                    class="fs-5 text-contrast-900 h-text-color fw-medium d-block mb-2">Walkthrough
                                    Videos</span></a></div>
                    </div>
                </div>
                <div id="section-purchase" class="section m-0 text-center dark"
                    style="padding: 150px 0; background: url('images/intro/bg.jpg') no-repeat center center; background-size: cover;">
                    <div class="container">
                        <h2 class="display-4 fw-semibold font-secondary lh-base mb-5">Create Beautiful & Powerful
                            Websites<br>Get Canvas for <strong>$16</strong> only!</h2><a
                            href="https://1.envato.market/c/1309643/480739/4415?u=https%3A%2F%2Fthemeforest.net%2Fcart%2Fconfigure_before_adding%2F9228123"
                            class="button button-circle button-xlarge button-reveal text-end ls-0 m-0"
                            style="padding-left: 60px;padding-right: 60px;"><span>Purchase License</span><i
                                class="bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <footer id="footer" class="dark">
            <div id="copyrights">
                <div class="container text-center">
                    <p class="mb-1">Copyrights &copy; 2023 All Rights Reserved by SemiColonWeb
                    <div class="copyright-links"><a
                            href="https://1.envato.market/c/1309643/480739/4415?u=http%3A%2F%2Fthemeforest.net%2Fuser%2Fsemicolonweb%2Fportfolio"
                            target="_blank">Portfolio</a> / <a href="http://support.semicolonweb.com/"
                            target="_blank">Support</a></div>
                </div>
            </div>
        </footer>
    </div>
    <div id="gotoTop" class="uil uil-angle-up rounded" data-mobile="true"
        style="--cnvs-gotoTop-bg:var(--cnvs-contrast-800)"></div>
    <script src="js/plugins.min.js"></script>
    <script src="js/functions.bundle.js"></script>
    <script>
        let page = 1;
        let loading = false;
        let noMoreData = false;

        function loadMoreProjects() {
            if (loading || noMoreData) return;
            loading = true;
            $('#loader').show();

            $.ajax({
                url: 'fetch_projects.php',
                type: 'GET',
                data: { page: page },
                success: function (data) {
                    if ($.trim(data) === '') {
                        noMoreData = true;
                    } else {
                        $('#niche-demos-grid').append(data);
                        page++;
                    }
                },
                complete: function () {
                    $('#loader').hide();
                    loading = false;
                }
            });
        }

        $(window).on('scroll', function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200) {
                loadMoreProjects();
            }
        });
    </script>



</body>

</html>