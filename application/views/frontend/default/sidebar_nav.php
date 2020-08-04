<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left bg-white" data-perfect-scrollbar>

            <div class="d-flex align-items-center sidebar-p-a sidebar-account flex-shrink-0">
                <a href="index.html" class="flex d-flex align-items-center text-underline-0">
                    <img src="<?php echo base_url() . 'uploads/system/logo-dark.png'; ?>" />
                </a>
            </div>

            <div class="sidebar-block p-0 mt-3">
                <ul class="sidebar-menu mt-0">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button <?php if ($page_name == "home") { ?>active<?php } ?>" href="<?php echo site_url(); ?>">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">home</i>
                            <span class="sidebar-menu-text">Home</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button <?php if ($page_name == "courses_page" and $_GET['category'] == "") { ?>active<?php } ?>" href="<?php echo site_url('home/courses'); ?>">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i>
                            <span class="sidebar-menu-text">Explore</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button tree-toggler <?php if ($_GET['category'] == "business") { ?>active<?php } ?>" href="<?php echo site_url('home/courses?category=business'); ?>">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">card_travel</i>
                            <span class="sidebar-menu-text">Business</span>
                        </a>
                        <!--
                        <ul class="nav nav-list tree">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                        </ul>-->
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button tree-toggler <?php if ($_GET['category'] == "development") { ?>active<?php } ?>" href="<?php echo site_url('home/courses?category=developmet'); ?>">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">supervisor_account</i>
                            <span class="sidebar-menu-text">Development</span>
                        </a>
                        <!--
                        <ul class="nav nav-list tree">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                        </ul>
                        </ul>-->
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button <?php if ($_GET['category'] == "information-technology") { ?>active<?php } ?>" href="<?php echo site_url('home/courses?category=information-technology'); ?>">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">important_devices</i>
                            <span class="sidebar-menu-text">Information Technology</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button <?php if ($_GET['category'] == "photography") { ?>active<?php } ?>" href="<?php echo site_url('home/courses?category=photography'); ?>">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">monochrome_photos</i>
                            <span class="sidebar-menu-text">Photography</span>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="sidebar-heading">Other</div>
            <div class="sidebar-block p-0">
                <ul class="sidebar-menu mt-0">
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i>
                            <span class="sidebar-menu-text">Help</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">verified_user</i>
                            <span class="sidebar-menu-text">Tentang Kami</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="#">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">group</i>
                            <span class="sidebar-menu-text">Kemitraan</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>