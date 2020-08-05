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



                <div class="d-sm-flex" style="margin-right: 20px;">
                    <div class="cart-box menu-icon-box" id="cart_items">
                    </div>
                    <div class="dropdown">
                        <a href="#" data-toggle="dropdown" data-caret="false" class="dropdown-toggle navbar-toggler navbar-toggler-dashboard border-left d-flex align-items-center ml-navbar">
                            <span class="material-icons">laptop</span> Akun Saya
                        </a>
                        <div id="company_menu" class="dropdown-menu dropdown-menu-right navbar-company-menu">
                            <div class="dropdown-item d-flex align-items-center py-2 navbar-company-info py-3">

                                <span class="mr-3">
                                    <img src="assets/images/frontted-logo-blue.svg" width="43" height="43" alt="avatar">
                                </span>
                                <span class="flex d-flex flex-column">
                                    <strong class="h5 m-0">Adrian D.</strong>
                                    <small class="text-muted text-uppercase">STUDENT</small>
                                </span>

                            </div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item d-flex align-items-center py-2" href="edit-account.html">
                                <span class="material-icons mr-2">account_circle</span> Edit Account
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="#">
                                <span class="material-icons mr-2">settings</span> Settings
                            </a>
                            <a class="dropdown-item d-flex align-items-center py-2" href="login.html">
                                <span class="material-icons mr-2">exit_to_app</span> Logout
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>