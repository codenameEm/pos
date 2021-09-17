<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, user-scalable=yes">
<meta name="application-name" content="OpenTHC">
<meta name="mobile-web-app-capable" content="yes">
<meta name="theme-color" content="#247420">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.openthc.com/bootstrap/4.4.1/bootstrap.css" integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y=" crossorigin="anonymous">
<!-- <link href="/css/main.css" rel="stylesheet"> -->
<link href="/css/pos.css" rel="stylesheet">
<style>
#pos-modal-payment {
	user-select: none;
}
#menu-zero {
	align-items: center;
	background: #343a40;
	display: flex;
	/* display: none; */
	flex: 0 1 auto;
	justify-content: space-between;
}
#menu-zero div.menu-item {
	padding: 0.50rem;
}
#menu-zero div.menu-item .menu-item-text {
	color: #f9f9f9;
	font-family: monospace;
	font-size: 120%;
}
#menu-left {
	background: #343a40ee;
	display: none;
	left: 0;
	position:absolute ;
	width: 0;
	top: 0;
}
#menu-left.open {
	display: flex;
	flex-direction: column;
	flex-wrap: wrap;
	height: 100vh;
	width: 20vw;
	z-index: 10;
}
#menu-left .menu-item {
	color: #f0f0f0;
	padding: 0.50rem;
}

</style>
<title><?= $data['Page']['title'] ?></title>
</head>
<body class="pos">
<div id="menu-zero">
	<div class="menu-item">
		<button class="btn btn-outline-secondary menu-left-toggle" type="button"><i class="fas fa-bars"></i></button>
	</div>
	<div class="menu-item">
		<div class="menu-item-text"><?= $data['Page']['title'] ?></div>
	</div>
	<div class="menu-item">
	<a class="btn btn-warning" href="/pos" id="pos-shop-redo" type="button"><i class="fas fa-ban"></i></a>
		<a class="btn btn-danger" href="/pos/shut"><i class="fas fa-power-off"></i></a>
	</div>
</div>
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

<script src="https://cdn.openthc.com/lodash/4.17.15/lodash.js" integrity="sha256-VeNaFBVDhoX3H+gJ37DpT/nTuZTdjYro9yBruHjVmoQ=" crossorigin="anonymous"></script>
<script src="https://cdn.openthc.com/jquery/3.4.1/jquery.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.openthc.com/jqueryui/1.12.1/jqueryui.js" integrity="sha256-KM512VNnjElC30ehFwehXjx1YCHPiQkOPmqnrWtpccM=" crossorigin="anonymous"></script>
<script src="https://cdn.openthc.com/bootstrap/4.4.1/bootstrap.js" integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/riot/4.14.0/riot.min.js" integrity="sha512-+LI/J+j6hecBPuCvPtbjYAXiha2RuYEpO3yromB1zTVq8UuH0BTafeP7myLEd9tJnaVa2JkhLzRdhdIh+Iru0w==" crossorigin="anonymous"></script>
<!-- <script src="https://unpkg.com/@zxing/library@latest"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script crossorigin="anonymous" src="https://unpkg.com/@zxing/library@0.18.6/umd/index.min.js"></script>
<script src="/js/pos.js"></script>
<script src="/js/pos-scanner.js"></script>
<script src="/js/pos-printer.js"></script>
<script src="/js/pos-cart.js"></script>
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
