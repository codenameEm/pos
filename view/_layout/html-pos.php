<?php
/**
 * OpenTHC HTML POS Terminal Layout
 *
 * SPDX-License-Identifier: GPL-3.0-only
 */

header('content-type: text/html; charset=utf-8', true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, user-scalable=yes">
<meta name="application-name" content="OpenTHC">
<meta name="mobile-web-app-capable" content="yes">
<meta name="theme-color" content="#247420">
<link rel="stylesheet" href="/vendor/font-awesome/css/all.min.css" integrity="sha256-HtsXJanqjKTc8vVQjO4YMhiqFoXkfBsjBWcX91T1jr8=" crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="/vendor/jquery-ui/jquery-ui.min.css" integrity="sha256-VNxxeWv78fBpVZ3cM8LomS7+xUH2IXl6hJ1EKmmCJpY=" crossorigin="anonymous">
<link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css" integrity="sha256-wLz3iY/cO4e6vKZ4zRmo4+9XDpMcgKOvv/zEU3OMlRo=" crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="/css/main.css">
<title><?= $data['Page']['title'] ?></title>
</head>
<body class="pos">
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
<div class="container-fluid">

	<a class="navbar-brand menu-left-toggle" type="button"><i class="fas fa-user-clock"></i></a>

	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu0" aria-controls="menu0" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="menu0">

		<div class="navbar-text mx-auto">
			<div style="color: #f9f9f9; font-family: monospace; font-size: 120%;"><?= $data['Page']['title'] ?></div>
		</div>

		<div class="navbar-text">
			<a class="btn btn-warning pos-checkout-reopen" href="/pos/open"><i class="fas fa-ban" style="color: var(--bs-dark);"></i></a>
			<a class="btn btn-danger pos-checkout-reopen" href="/pos/shut"><i class="fas fa-power-off" style="color: var(--bs-dark);" ></i></a>
		</div>

	</div>

</div>
</nav>

<?= $this->block('session-flash.php') ?>

<?= $this->body ?>

<div class="shut" id="menu-left">
	<div class="menu-item">
		<button class="btn btn-outline-secondary menu-left-toggle" type="button"><i class="fas fa-bars"></i></button>
	</div>
	<div class="menu-item">
		<input class="form-control">
	</div>
	<div class="menu-item" id="sale-hold-list"></div>
</div>

<script src="/vendor/lodash/lodash.min.js" integrity="sha256-qXBd/EfAdjOA2FGrGAG+b3YBn2tn5A6bhz+LSgYD96k=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/vendor/jquery/jquery.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/vendor/jquery-ui/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/vendor/bootstrap/bootstrap.bundle.min.js" integrity="sha256-lSABj6XYH05NydBq+1dvkMu6uiCc/MbLYOFGRkf3iQs=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/riot/4.14.0/riot.min.js" integrity="sha256-mxBp2pV/KfjX4uaj+6aEh2MWB7J+j8o6VuOCs4aY7zM=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://unpkg.com/@zxing/library@latest"></script> -->
<script src="/vendor/qrcodejs/qrcode.min.js" integrity="sha256-xUHvBjJ4hahBW8qN9gceFBibSFUzbe9PNttUvehITzY=" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/@zxing/library@0.19.2/umd/index.min.js" integrity="sha256-a0mo/OgjQ26D3n9JRYL4LMTeSx8PV3SYKv2My5wOdHE=" crossorigin="anonymous"></script>
<script src="/js/pos.js"></script>
<script src="/js/pos-scanner.js"></script>
<script src="/js/pos-printer.js"></script>
<script src="/js/pos-cart.js"></script>
<!-- <script src="/js/pos-modal-contact.js"></script> -->
<script src="/js/pos-modal-discount.js"></script>
<script src="/js/pos-modal-loyalty.js"></script>
<script src="/js/pos-modal-payment.js"></script>
<script src="/js/pos-camera.js"></script>
<script>
$(function () {
	$('.menu-left-toggle').on('click', function() {
		$m = $('#menu-left');
		if ($m.hasClass('open')) {
			$m.removeClass('open');
		} else {
			$m.addClass('open');
			window.document.dispatchEvent(new Event('menu-left-opened'));
		}
	});
});
</script>
<?= $this->foot_script ?>
</body>
</html>
