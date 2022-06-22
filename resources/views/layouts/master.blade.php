<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		{{-- <meta property="og:url" content="https://keenthemes.com/metronic" /> --}}
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		{{-- <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> --}}
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->

		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<style>
			.blockui-message{
				display:flex;
				align-items:center;
				border-radius:.475rem;
				box-shadow:0 0 50px 0 rgba(82,63,105,.15);
				background-color:#fff;
				color:#7e8299;
				font-weight:500;
				margin:auto;
				width:fit-content;
				padding:.85rem 1.75rem!important
			}
			.blockui-message .spinner-border{
				margin-right:.65rem
			}
		</style>
        @stack('css')
		@livewireStyles
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="page-loading-enabled page-loading header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
		<!--begin::loader-->
		<div class="page-loader">
			<span class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</span>
		</div>
		<!--end::Loader-->
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('inc.layouts.header')
					<!--end::Header-->
					<!--begin::Toolbar-->
					@include('inc.layouts.nav')
					<!--end::Toolbar-->
					<!--begin::Container-->
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						<!--begin::Post-->
						@yield('content')

                        @stack('modals')
						<!--end::Post-->
					</div>
					<!--end::Container-->
					<!--begin::Footer-->
					@include('inc.layouts.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<script src="{{ asset('js/app.js') }}" ></script>
		<script src="assets/custom/blockui/jquery.blockUI.min.js"></script>
		{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js"integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

		<script>
			$(document).ready(function() {
				// Turbolinks.start()
			});

			const blockThis = (block) => {

                $(block).block({
                    message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
                    overlayCSS: {
                        backgroundColor: 'rgba(0,0,0,.05)',
                        opacity: 0.8,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'transparent'
                    }
                });
			}
			const unblockThis = (block) => {

				$(block).unblock();
			}

			// blockThis($('.blockBoard'))

		</script>
		<!--end::Global Javascript Bundle-->
		@livewireScripts
        @stack('js')
		<script>
			window.livewire.on('lockBoard', () => {
				blockThis($('.reload'))
			})
		</script>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>