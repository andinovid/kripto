<?php
$user_details = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
$cart_items = $this->session->userdata('cart_items');
?>
<a href="#notifications_menu" class="position-relative nav-link dropdown-toggle mr-3 pb-0" data-toggle="dropdown" data-caret="false">
    <i class="far fa-heart nav-icon"></i>
    <span class="number"><?php echo sizeof($this->crud_model->getWishLists()); ?></span>
</a>

<?php if (sizeof($this->crud_model->getWishLists()) != '0') { ?>
    <div id="notifications_menu" class="dropdown-menu dropdown-menu-left navbar-notifications-menu">
        <div class="dropdown-item d-flex align-items-center py-2">
            <span class="flex navbar-notifications-menu__title m-0">Notifications</span>
            <a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
        </div>
        <div class="navbar-notifications-menu__content" data-perfect-scrollbar>
            <div class="py-2">
                <?php
                foreach (json_decode($user_details['wishlist']) as $wishlist) :
                    $course_details = $this->crud_model->get_course_by_id($wishlist)->row_array();
                    $instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
                ?>
                    <div class="dropdown-item d-flex">
                        <div class="mr-3">
                            <div class="avatar avatar-xs">
                                <img src="<?php echo $this->crud_model->get_course_thumbnail_url($wishlist); ?>" alt="" class="avatar-img rounded-circle">
                            </div>
                        </div>
                        <div class="flex">
                            <a href=""><?php echo $course_details['title']; ?></a><br>
                            <small class="text-muted"><?php echo site_phrase('by') . ' ' . $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></small>
                            <?php if ($course_details['is_free_course'] == 1) : ?>
                                <span class="current-price"><?php echo site_phrase('free'); ?></span>
                            <?php else :  ?>
                                <?php if ($course_details['discount_flag'] == 1) : ?>
                                    <span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span>
                                    <span class="original-price"><?php echo currency($course_details['price']); ?></span>
                                <?php else : ?>
                                    <span class="current-price"><?php echo currency($course_details['price']); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                            <button type="button" id="<?php echo $course_details['id']; ?>" onclick="handleCartItems(this)" class="<?php if (in_array($course_details['id'], $cart_items)) echo 'addedToCart'; ?>">
                                <?php
                                if (in_array($course_details['id'], $cart_items)) {
                                    echo site_phrase('added_to_cart');
                                } else {
                                    echo site_phrase('add_to_cart');
                                }
                                ?>
                            </button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <a href="<?php echo site_url('home/my_wishlist'); ?>" class="dropdown-item text-center navbar-notifications-menu__footer">View
            All</a>
        <div class="empty-box text-center d-none">
            <p><?php echo site_phrase('your_wishlist_is_empty'); ?>.</p>
            <a href=""><?php echo site_phrase('explore_courses'); ?></a>
        </div>
    </div>
<?php } ?>