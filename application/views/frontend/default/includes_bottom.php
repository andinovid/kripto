<!-- jQuery -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/jquery.min.js'; ?>"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/popper.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/bootstrap.min.js'; ?>"></script>

<!-- Perfect Scrollbar -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/perfect-scrollbar.min.js'; ?>"></script>

<!-- DOM Factory -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/dom-factory.js'; ?>"></script>

<!-- MDK -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/material-design-kit.js'; ?>"></script>

<!-- Range Slider -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/ion.rangeSlider.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/ion-rangeslider.js'; ?>"></script>

<!-- App -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/toggle-check-all.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/check-selected-row.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/dropdown.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/sidebar-mini.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/app.js'; ?>"></script>

<!-- App Settings (safe to remove) -->


<!-- Flatpickr -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/flatpickr/flatpickr.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/flatpickr.js'; ?>"></script>

<!-- Global Settings -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/settings.js'; ?>"></script>

<!-- Moment.js -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/moment.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/moment-range.js'; ?>"></script>


<!-- Chart.js -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/vendor/Chart.min.js'; ?>"></script>

<!-- App Charts JS -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/chartjs-rounded-bar.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/charts.js'; ?>"></script>

<!-- Chart Samples -->
<script src="<?php echo base_url() . 'assets/frontend/default/assets/js/page.analytics.js'; ?>"></script>

<script src="<?php echo base_url() . 'assets/global/toastr/toastr.min.js'; ?>"></script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != "") : ?>

	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
	</script>

<?php endif; ?>

<?php if ($this->session->flashdata('error_message') != "") : ?>

	<script type="text/javascript">
		toastr.error('<?php echo $this->session->flashdata("error_message"); ?>');
	</script>

<?php endif; ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('ul.tree').hide();
		$('.tree-toggler').click(function() {
			$(this).parent().children('ul.tree').toggle(300);
		});
	});
</script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != "") : ?>

	<script type="text/javascript">
		toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
	</script>

<?php endif; ?>

<?php if ($this->session->flashdata('error_message') != "") : ?>

	<script type="text/javascript">
		toastr.error('<?php echo $this->session->flashdata("error_message"); ?>');
	</script>

<?php endif; ?>