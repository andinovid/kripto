<?php
$total_price = 0;
?>
<a href="#cart_dropdown" class="position-relative nav-link dropdown-toggle pb-0" data-toggle="dropdown" data-caret="false">
	<span class="material-icons nav-icon">shopping_cart</span>
	<span class="number"><?php echo sizeof($this->session->userdata('cart_items')); ?></span>
</a>

<?php if (sizeof($this->session->userdata('cart_items')) != '0') { ?>
	<div id="cart_dropdown" class="dropdown-menu dropdown-menu-left navbar-notifications-menu">
		<div class="dropdown-item d-flex align-items-center py-2">
			<span class="flex navbar-notifications-menu__title m-0">Notifications</span>
			<a href="javascript:void(0)" class="text-muted"><small>Clear all</small></a>
		</div>
		<div class="navbar-notifications-menu__content" data-perfect-scrollbar>
			<div class="py-2">
				<?php foreach ($this->session->userdata('cart_items') as $cart_item) :
					$course_details = $this->crud_model->get_course_by_id($cart_item)->row_array();
					$instructor_details = $this->user_model->get_all_user($course_details['user_id'])->row_array();
				?>
					<div class="dropdown-item d-flex">
						<div class="mr-3">
							<div class="avatar avatar-xs">
								<img src="<?php echo $this->crud_model->get_course_thumbnail_url($cart_item); ?>" alt="" class="avatar-img rounded-circle">
							</div>
						</div>
						<div class="flex">
							<a href=""><?php echo $course_details['title']; ?></a><br>
							<small class="text-muted"><?php echo site_phrase('by') . ' ' . $instructor_details['first_name'] . ' ' . $instructor_details['last_name']; ?></small>
							<?php if ($course_details['discount_flag'] == 1) :
								$total_price += $course_details['discounted_price']; ?>
								<span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span>
								<span class="original-price"><?php echo currency($course_details['price']); ?></span>
							<?php else :
								$total_price += $course_details['price']; ?>
								<span class="current-price"><?php echo currency($course_details['price']); ?></span>
							<?php endif; ?>
						</div>
					</div>

				<?php endforeach; ?>
				<hr>
				<div class="mt-3 clearfix">
					<span><?php echo site_phrase('total'); ?>:</span>
					<div class="float-right">
						<span class="current-price"><?php echo currency($total_price); ?></span>
						<!-- <span class="original-price">$94.99</span> -->
					</div>
				</div>
			</div>
		</div>
		<a href="<?php echo site_url('home/shopping_cart'); ?>" class="dropdown-item text-center navbar-notifications-menu__footer">View
			<?php echo site_phrase('go_to_cart'); ?></a>

	</div>
<?php } ?>