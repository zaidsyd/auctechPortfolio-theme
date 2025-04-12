<style>
    .quixnav .metismenu > li:hover > a, .quixnav .metismenu > li:focus > a, .quixnav .metismenu > li.mm-active > a {
    background-color:rgb(0, 0, 0);
    color: orange;
}
.quixnav .metismenu > li > a {
    color: orange;
}
.quixnav .metismenu ul a:hover, .quixnav .metismenu ul a:focus, .quixnav .metismenu ul a.mm-active {
    text-decoration: none;
    color: orangered;
}
</style>
<!--*******************
        Preloader start
    ********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
        Preloader end
    ********************-->


<!--**********************************
        Main wrapper start
    ***********************************-->
<div id="main-wrapper">

    <!--**********************************
            Nav header start
        ***********************************-->
    <div class="nav-header"n style="background:black">
        <a href="index.php" class="brand-logo">
            <img class="logo-abbr" src="./images/favicon-1.png" alt="" style="max-width:120px;">
            <!-- <img class="logo-compact" src="./images/logo-text.png" alt="">
            <img class="brand-title" src="./images/logo-text.png" alt=""> -->
        </a>

        <div class="nav-control text-danger">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
            Nav header end
        ***********************************-->

    <!--**********************************
            Header start
        ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">
                            <!-- <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                <i class="mdi mdi-magnify"></i>
                            </span> -->
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <img class="logo-abbr" src="./images/favicon-1.png" alt="" style="max-width:120px;">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./logout.php" class="dropdown-item">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <div class="quixnav" style="background:black;">
        <div class="quixnav-scroll">
            <ul class="metismenu text-danger" id="menu">
                <li class="mt-2"><a href="dashboard.php" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FD7E14/dashboard.png" alt="dashboard"/> <span
                            class="nav-text fw-bold">Dashboard</span></a>
                </li>
                <li class="mt-2"><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/metro/26/FD7E14/plus-1year.png" alt="plus-1year"/> <span class="nav-text ml-2"> Year Master</span></a>
                    <ul aria-expanded="false">
                        <li> <a href="./add_year.php"> Add Year</a></li>
                        <li> <a href="./year_master_list.php"> Year List</a></li>
                    </ul>
                </li>
                <li class="mt-2"><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/material/24/FD7E14/country.png" alt="country"/> <span class="nav-text ml-2"> Country Master</span></a>
                    <ul aria-expanded="false">
                        <li> <a href="./add_country.php"> Add Country</a></li>
                        <li> <a href="./country_list.php"> Country List</a></li>
                    </ul>
                </li>
                <li class="mt-2"><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/metro/26/FD7E14/factory.png" alt="factory"/> <span class="nav-text ml-2"> Industry Master</span></a>
                    <ul aria-expanded="false">
                        <li> <a href="./add_industry.php"> Add Industry</a></li>
                        <li> <a href="./industry_master_list.php"> Industry List</a></li>
                    </ul>
                </li>
                
                <li class="mt-2"><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/glyph-neue/64/FD7E14/requirements.png" alt="requirements"/> <span class="nav-text ml-2">Project Master</span></a>
                    <ul aria-expanded="false">
                        <li> <a href="./add_project_category.php"> Add Project Category</a></li>
                        <li> <a href="./project_category_list.php"> Project Category List</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/glyph-neue/64/FD7E14/requirements.png" alt="requirements"/> <span class="nav-text ml-2">Project</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./add_project.php">Add Project</a></li>
                        <li><a href="./project_list.php">Project List</a></li>
                    </ul>
                </li>
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/glyph-neue/64/FD7E14/requirements.png" alt="requirements"/> <span class="nav-text ml-2">Add Project Video</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./add_videos.php">Add Video</a></li>
                        <li><a href="./videos_list.php">Video List</a></li>
                    </ul>
                </li>
                <li class="mt-2"><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/external-xnimrodx-lineal-xnimrodx/64/FD7E14/external-banner-infographic-and-chart-xnimrodx-lineal-xnimrodx-2.png" alt="external-banner-infographic-and-chart-xnimrodx-lineal-xnimrodx-2"/> <span class="nav-text ml-2"> Banner</span></a>
                    <ul aria-expanded="false">
                        <li> <a href="./add_banner.php"> Add Banner</a></li>
                        <li> <a href="./banner_list.php"> Banner List</a></li>
                    </ul>
                </li>
                
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FD7E14/group-of-projects.png" alt="group-of-projects"/><span class="nav-text ml-2">Client FeedBack</span></a>
                    <ul aria-expanded="false">
                        <li><a href="./add_client_feedback.php">Add Client Feedback</a></li>
                        <li><a href="./client_feedback_list.php">Client Feedback List</a></li>
                    </ul>
                </li>
                
                <li><a href="./contact_list.php"><img width="20" height="20" src="https://img.icons8.com/sf-black/64/FD7E14/list.png" alt="list"/> </i><span class="nav-text ml-2">Query</span></a>
                   
                </li>
            </ul>
        </div>
    </div>