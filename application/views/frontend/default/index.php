<!DOCTYPE html>
<html lang="en">

<head>

	<?php if ($page_name == 'course_page') :
		$title = $this->crud_model->get_course_by_id($course_id)->row_array() ?>
		<title><?php echo $title['title'] . ' | ' . get_settings('system_name'); ?></title>
	<?php else : ?>
		<title><?php echo ucwords($page_title) . ' | ' . get_settings('system_name'); ?></title>
	<?php endif; ?>


	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="<?php echo get_settings('author') ?>" />

	<?php
	$seo_pages = array('course_page');
	if (in_array($page_name, $seo_pages)) :
		$course_details = $this->crud_model->get_course_by_id($course_id)->row_array(); ?>
		<meta name="keywords" content="<?php echo $course_details['meta_keywords']; ?>" />
		<meta name="description" content="<?php echo $course_details['meta_description']; ?>" />
	<?php else : ?>
		<meta name="keywords" content="<?php echo get_settings('website_keywords'); ?>" />
		<meta name="description" content="<?php echo get_settings('website_description'); ?>" />
	<?php endif; ?>

	<link name="favicon" type="image/x-icon" href="<?php echo base_url() . 'uploads/system/favicon.png' ?>" rel="shortcut icon" />
	<?php include 'includes_top.php'; ?>

</head>
<?php if ($page_name == "login" || $page_name == "sign_up") { ?>

	<body class="layout-login-centered-boxed">


		<?php include $page_name . '.php'; ?>

		<?php
		if (get_frontend_settings('cookie_status') == 'active') :
			include 'eu-cookie.php';
		endif;

		include 'footer.php';
		include 'includes_bottom.php';
		include 'modal.php';
		include 'common_scripts.php';
		?>
		</div>
	</body>

<?php } else { ?>

	<body class="layout-default">
		<div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px" data-fullbleed>
			<div class="mdk-drawer-layout__content">
				<div class="mdk-header-layout js-mdk-header-layout" data-has-scrolling-region>
					<?php
					if ($this->session->userdata('user_login') != true) {
						include 'logged_out_header.php';
					} else {
						include 'logged_in_header.php';
					}
					?>

					<?php include $page_name . '.php'; ?>
				</div>
			</div>
			<?php
			include 'sidebar_nav.php';
			?>
			<?php
			if (get_frontend_settings('cookie_status') == 'active') :
				include 'eu-cookie.php';
			endif;

			include 'footer.php';
			include 'includes_bottom.php';
			include 'modal.php';
			include 'common_scripts.php';
			?>
		</div>
	</body>
<?php } ?>

</html>