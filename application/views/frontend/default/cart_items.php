<?php
$total_price = 0;
?>

<li class="nav-item dropdown">
	<a href="#notifications_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
		<i class="material-icons nav-icon navbar-notifications-indicator">shopping_cart</i>
		<span class="number"><?php echo sizeof($this->session->userdata('cart_items')); ?></span>
	</a>
	<div id="notifications_menu" class="dropdown-menu dropdown-menu-right navbar-notifications-menu">
		<div class="dropdown-item d-flex align-items-center py-2">
			<span class="flex navbar-notifications-menu__title m-0">Shopping Cart</span>
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
							<img src="<?php echo $this->crud_model->get_course_thumbnail_url($cart_item);?>" alt="Avatar" class="avatar-img rounded-circle">
						</div>
					</div>
					<div class="flex">
						<a href=""><?php echo $course_details['title']; ?></a><br>
						<small class="text-muted"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></small>
						<div class="item-price">
							<?php if ($course_details['discount_flag'] == 1):
								$total_price += $course_details['discounted_price'];?>
								<span class="current-price"><?php echo currency($course_details['discounted_price']); ?></span>
								<span class="original-price"><?php echo currency($course_details['price']); ?></span>
							<?php else:
								$total_price += $course_details['price'];?>
								<span class="current-price"><?php echo currency($course_details['price']); ?></span>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="dropdown-footer">
					<div class="cart-total-price clearfix">
						<span><?php echo site_phrase('total'); ?>:</span>
						<div class="float-right">
							<span class="current-price"><?php echo currency($total_price); ?></span>
							<!-- <span class="original-price">$94.99</span> -->
						</div>
					</div>
					<a href = "<?php echo site_url('home/shopping_cart'); ?>"><?php echo site_phrase('go_to_cart'); ?></a>
				</div>
			</div>
		</div>
		<a href="javascript:void(0);" class="dropdown-item text-center navbar-notifications-menu__footer">View
			All</a>
	</div>
</li>

<script type="text/javascript">
	function showCartPage() {
		window.location.replace("<?php echo site_url('home/shopping_cart'); ?>");
	}
</script>