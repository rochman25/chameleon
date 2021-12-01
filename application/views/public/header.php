<!DOCTYPE html>
<html lang="en">

<head>
	<title>CHAMELEON CLOTH - Make Your Appearance More Perfect</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<meta charset="UTF-8">
	<meta name="title" content="CHAMELEON CLOTH">
	<meta name="description" content="Make Your Appearance More Perfect">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800|Open+Sans|Work+Sans" rel="stylesheet">
	<meta property="fb:pages" content="" />
	<meta name="google-site-verification" content="YRtB-WBotW8z2AMh6hLyCgAjgQRundXTa1bC2AdzPxQ" />
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?= base_url() ?>assets/images/clogo.jpg">
	<meta name="theme-color" content="#ffffff">

	<link rel="shortcut icon" href="<?= base_url() ?>assets/images/clogo.jpg" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/public/css/fontawesome-all.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/public/css/jqueryuimin.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/public/css/all.css">
	<!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/public/css/master.css?id=9e0f65abec8cb3ae96f8">-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/public/css/master.css">
	<style>
		.loader {
			border: 16px solid #f3f3f3;
			/* Light grey */
			border-top: 16px solid #3498db;
			/* Blue */
			border-radius: 50%;
			width: 60px;
			height: 60px;
			animation: spin 2s linear infinite;
		}

		@keyframes spin {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		.product-deskripsi p {
			/* max-width: 75ch; */
			word-wrap: break-word;
			line-height: 1;
			/* max-width: calc(30em * 0.5); */
			/* text-overflow: ellipsis; */
			/* will make [...] at the end */
			/* width: 370px; */
			/* change to your preferences */
			/* white-space: nowrap; */
			/* paragraph to one line */
			/* overflow: hidden; */
			/* older browsers */
		}

		.nav-footer .nav ul {
			padding: 0;
		}

		.nav-footer .nav ul li {
			list-style-type: none;
			margin-bottom: 8px;
		}

		.nav-footer .nav ul li a {
			text-decoration: none;
			font-size: 12px;
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			line-height: normal;
			letter-spacing: normal;
			color: hsla(0, 0%, 100%, 0.7);
		}

		/* @media (max-width : 768px) { */

		.nav-footer .nav h4 {
			cursor: pointer;
		}

		.nav-footer ul {
			max-height: 0;
			overflow: hidden;
			transition: max-height 1s ease-out;
		}

		.nav-footer .nav h4:after {
			content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='svg-icon' viewBox='0 0 20 20'%3E%3Cpath fill='white' d='M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10'%3E%3C/path%3E%3C/svg%3E");
			width: 25px;
			float: right;
		}

		.nav-footer .nav.open h4:after {
			content: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' class='svg-icon' viewBox='0 0 20 20'%3E%3Cpath fill='white' d='M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z'%3E%3C/path%3E%3C/svg%3E");
			width: 25px;
		}

		.nav-footer .nav.open ul {
			height: auto;
			max-height: 500px;
			transition: max-height 1s ease-in !important;
		}

		.voucher {
			height: auto;
			box-shadow: 0 2px 6px 0 rgb(0 0 0 / 40%);
			background-color: #f3f3f3;
			opacity: 80%;
			padding: 0 32px;
			position: relative;
			z-index: 101;
		}

		.voucher p {
			text-align: center;
			padding-top: 10px;
			padding-bottom: 10px;
			color: black;
			font-size: 14px;
		}

	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>assets/public/js/all.js"></script>
	<script src="<?= base_url() ?>assets/public/js/cart.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Facebook Pixel Code -->
	<noscript>
		<!-- <img height="1" width="1" style="display:none"
				   src="https://www.facebook.com/tr?id=1833638393568248&ev=PageView&noscript=1"
		/> -->
	</noscript>
	<!-- DO NOT MODIFY -->
	<!-- End Facebook Pixel Code -->

	<!-- Facebook Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '920677795109660');
		fbq('track', 'PageView');
	</script>
	<noscript>
		<img height="1" width="1" src="https://www.facebook.com/tr?id=920677795109660&ev=PageView
&noscript=1" />
	</noscript>
	<!-- End Facebook Pixel Code -->
</head>

<body>