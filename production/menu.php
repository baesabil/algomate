<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"> <span><center><b>Algomate</b></center></span></a>

        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="images/buz.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Hallo,</span>
                <h2><?= ucfirst($_SESSION['username']); ?></h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-edit"></i> Admin <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="admin.php">Data Admin</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Pengunjung <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="pengunjung.php"> Data Pengunjung</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Materi <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="materi.php">Data Materi</a></li>
                            <li><a href="kategori-materi.php">Kategori Materi</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-edit"></i> Soal <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="soal.php">Soal</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->


    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <!-- <img src="images/img.jpg" alt="">John Doe -->
                        Selamat Datang <?= ucfirst($_SESSION['username']); ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">

                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->