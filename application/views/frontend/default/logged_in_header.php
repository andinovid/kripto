<div id="header" class="mdk-header js-mdk-header m-0" data-fixed data-effects="waterfall" data-retarget-mouse-scroll="false">
    <div class="mdk-header__content">
        <div class="navbar navbar-expand-sm navbar-main navbar-light bg-white pl-md-0 pr-0" id="navbar" data-primary>
            <div class="container-fluid page__container pr-0">
                <button class="navbar-toggler navbar-toggler-custom  d-lg-none d-flex mr-navbar" type="button" data-toggle="sidebar">
                    <span class="material-icons icon-14pt">menu</span>
                </button>
                <div class="navbar-collapse collapse" id="navbarsExample03">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pilih Kategori</a>
                            <div class="dropdown-menu">
                                <?php
                                $categories = $this->crud_model->get_categories()->result_array();
                                foreach ($categories as $key => $category) : ?>
                                    <a class="dropdown-item" href="<?php echo site_url('home/courses?category=' . $category['slug']); ?>"><?php echo $category['name']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                        <li>

                    </ul>
                    <form class="search-form search-form--light d-none d-sm-flex flex" action="index.html">
                        <input type="text" class="form-control" placeholder="Search">
                        <button class="btn" type="submit"><i class="material-icons">search</i></button>
                    </form>
                </div>

                <ul class="nav navbar-nav d-none d-md-flex">

                    <li class="nav-item dropdown">
                        <?php include 'cart_items.php'; ?>
                    </li>
                    <li class="nav-item dropdown">
                        <?php include 'wishlist_items.php'; ?>
                    </li>
                </ul>
                <div class="d-sm-flex" style="margin-right: 20px;">
                    <div class="cart-box menu-icon-box" id="cart_items">
                    </div>

                    <?php if (get_settings('allow_instructor') == 1) : ?>
                        <a href="<?php echo site_url('user'); ?>" class="btn btn-light mr-2"><?php echo site_phrase('instructor'); ?></a>
                    <?php endif; ?>
                    <a href="<?php echo site_url('home/my_courses'); ?>" class="btn btn-light"><?php echo site_phrase('my_courses'); ?></a>



                </div>
                <div class="d-sm-flex" style="margin-right: 20px;">

                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar">
                            <?php
                            if (file_exists('uploads/user_image/' . $user_details['id'] . '.jpg')) : ?>
                                <img src="<?php echo base_url() . 'uploads/user_image/' . $user_details['id'] . '.jpg'; ?>" alt="" class="img-fluid" width="40" height="40">
                            <?php else : ?>
                                <img src="<?php echo base_url() . 'uploads/user_image/placeholder.png'; ?>" alt="" class="img-fluid" width="40" height="40">
                            <?php endif; ?>
                        </a>
                        <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                            <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">

                                <span class="mr-3">
                                    <?php if (file_exists('uploads/user_image/' . $user_details['id'] . '.jpg')) : ?>
                                        <img src="<?php echo base_url() . 'uploads/user_image/' . $user_details['id'] . '.jpg'; ?>" alt="" width="43" height="43">
                                    <?php else : ?>
                                        <img src="<?php echo base_url() . 'uploads/user_image/placeholder.png'; ?>" alt="" width="43" height="43">
                                    <?php endif; ?>
                                </span>
                                <span class="flex d-flex flex-column">
                                    <strong class="h5 m-0"><span class="hi"><?php echo site_phrase('hi'); ?>,</span>
                                        <?php echo $user_details['first_name'] . ' ' . $user_details['last_name']; ?></strong>
                                    <small class="text-muted"><?php echo $user_details['email']; ?></small>
                                </span>

                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item d-flex align-items-center py-2" href="<?php echo site_url('home/my_courses'); ?>">
                                <i class="far fa-gem mr-2"></i> <?php echo site_phrase('my_courses'); ?>
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="<?php echo site_url('home/my_wishlist'); ?>">
                                <i class="far fa-heart mr-2"></i> <?php echo site_phrase('my_wishlist'); ?>
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="<?php echo site_url('home/my_messages'); ?>">
                                <i class="far fa-envelope mr-2"></i> <?php echo site_phrase('my_messages'); ?>
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="<?php echo site_url('home/purchase_history'); ?>">
                                <i class="fas fa-shopping-cart mr-2"></i> <?php echo site_phrase('purchase_history'); ?>
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="<?php echo site_url('home/profile/user_profile'); ?>">
                                <i class="fas fa-user mr-2"></i> <?php echo site_phrase('user_profile'); ?>
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="<?php echo site_url('login/logout/user'); ?>">
                                <span class="material-icons mr-2">exit_to_app</span> <?php echo site_phrase('log_out'); ?>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>