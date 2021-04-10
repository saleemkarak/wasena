<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')



</head>
<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	@include('frontend.layouts.notification')
	<!-- Header -->
	@include('frontend.layouts.header')
	<!--/ End Header -->
	@yield('main-content')

	@include('frontend.layouts.footer')
@php
    $wt=Helper::settings()->phone;
    $msg=Helper::settings()->title;
@endphp
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {

        var whatsappNo = {!! json_encode($wt, JSON_HEX_TAG) !!};
        var msgAdd = {!! json_encode($msg, JSON_HEX_TAG) !!};
        var options = {

            whatsapp: whatsappNo , // WhatsApp number
            call_to_action: msgAdd+"تواصل معنا لشراء المنتج من", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };

        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->
</body>
</html>
