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
          <button class="btn btn-purple"><i class="material-icons icon-16pt">launch</i>Buka Kelas</button>
          <a href="<?php echo site_url('home/login'); ?>" class="btn btn-light ml-2"><i class="material-icons icon-16pt">person</i> Login</a>
          <a href="<?php echo site_url('home/sign_up'); ?>" class="btn btn-link">Register</a>
        </div>

      </div>
    </div>

  </div>
</div>