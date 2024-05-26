
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>inventaris</title>

		<!-- Site favicon -->
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="/public/image/cv.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="/public/image/cv.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="/public/image/cv.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="/back/vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.css">
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.all.min.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script
			async
			src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2973766580778258"
			crossorigin="anonymous"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
			$(document).ready(function() {
				$('select[name="kode_barang"]').on('change', function() {
					var kode_barang = $(this).val();
					if(kode_barang) {
						$.ajax({
							url: '/get-barang-by-kode/' + kode_barang,
							type: "GET",
							dataType: "json",
							success: function(data) {
								$('input[name="nama_barang"]').val(data.nama_barang);
							}
						});
					} else {
						$('input[name="nama_barang"]').val('');
					}
				});
			});
		</script>
		

		<!-- End Google Tag Manager -->
	</head>
	<body>
		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>
				</div>
				<div class="user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
						</a>
					</div>
				</div>
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							<span class="user-icon">
								<img src="{{asset('image/profile.jpg')}}" alt="" />
							</span>
							<span class="user-name"></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                                </x-dropdown-link>
                                </form>          
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class="weight-600 font-16 text-blue">
					Layout Settings
					<span class="btn-block font-weight-400 font-12"
						>User Interface Settings</span
					>
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="icon-copy ion-close-round"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Header Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white active"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							>Dark</a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							>White</a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark active"
							>Dark</a
						>
					</div>
				</div>
			</div>
		</div>

		<div class="left-side-bar">
			<div class="brand-logo">
				<a href="index.html">
					<img src="{{asset('image/cv.png')}}" alt="" class="dark-logo" />
					<img
						src="{{asset('image/cv.png')}}"
						alt=""
						class="light-logo"
					/>
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li>
							<a href="{{ route('dashboard') }}" class="dropdown-toggle no-arrow {{Route::is('dashboard') ? 'active': ''}}">
								<span class="micon bi bi-house-door-fill"></span
								><span class="mtext">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="{{ route('datapembelian') }}" class="dropdown-toggle no-arrow {{Route::is('datapembelian') ? 'active': ''}}">
								<span class="micon bi bi-cart-fill"></span
								><span class="mtext">Data Pembelian</span>
							</a>
						</li>
						<li>
							<a href="{{ route('databarang') }}" class="dropdown-toggle no-arrow {{Route::is('databarang') ? 'active': ''}}">
								<span class="micon bi bi-archive-fill"></span
								><span class="mtext">Data Barang</span>
							</a>
						</li>
						@if (auth()->user()->hasRole('Administrator') || auth()->user()->hasRole('Operator'))
						<li>
							<a href="{{ route('ruangan') }}" class="dropdown-toggle no-arrow {{Route::is('ruangan') ? 'active': ''}}">
								<span class="micon bi bi-archive-fill"></span
								><span class="mtext">Data Ruang</span>
							</a>
						</li>
						@endif
						
						@if (auth()->user()->hasRole('Administrator') || auth()->user()->hasRole('Operator') )
						<li>
							<a href="{{ route('datapemakaian') }}" class="dropdown-toggle no-arrow {{Route::is('datapemakaian') ? 'active': ''}}">
								<span class="micon bi bi-box2-fill"></span
								><span class="mtext">Data Pemakaian</span>
							</a>
						</li>
                        @endif
						@if (auth()->user()->hasRole('Administrator'))
						<li>
							<a href="{{ route('inventaris') }}" class="dropdown-toggle no-arrow {{Route::is('inventaris') ? 'active': ''}}">
								<span class="micon bi bi-inboxes-fill"></span
								><span class="mtext">Data Inventaris</span>
							</a>
						</li>
                        @endif
						@if (auth()->user()->hasRole('Administrator'))
						<li>
							<a href="{{ route('datauser') }}" class="dropdown-toggle no-arrow {{Route::is('datauser') ? 'active': ''}}">
								<span class="micon bi bi-person-fill"></span
								><span class="mtext">Data User</span>
							</a>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div>
                       @yield('content')
                    </div>
				</div>
			</div>
		</div>
		<!-- welcome modal end -->
		<!-- js -->
		<script src="/back/vendors/scripts/core.js"></script>
		<script src="/back/vendors/scripts/script.min.js"></script>
		<script src="/back/vendors/scripts/process.js"></script>
		<script src="/back/vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
