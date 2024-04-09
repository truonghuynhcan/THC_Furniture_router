<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<!-- <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'> -->
	<link rel="stylesheet" href="<?= APPURL ?>public/boxicons-master/css/boxicons.min.css">

	<!-- My CSS -->
	<link rel="stylesheet" href="<?= APPURL ?>public/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= APPURL ?>public/layout/assets/css/style.css">
	<link rel="stylesheet" href="<?= APPURL ?>public/css/a_style.css">

	<title>Admin THC Furniture</title>
</head>

<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="<?= APPURL ?>ad_dashboard/index" class="brand">
			<i class='bx bxs-smile text-primary'></i>
			<span class="text text-body">THC <span class="text-primary">Furniture</span></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="<?= APPURL ?>ad_dashboard/index">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Bảng điều kiển</span>
				</a>
			</li>
			<li>
				<a href="<?= APPURL ?>ad_products/index">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Sản phẩm</span>
				</a>
			</li>
			<li>
				<a href="<?= APPURL ?>ad_order/index">
					<i class='bx bxs-doughnut-chart'></i>
					<span class="text">Đơn hàng</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Bình luận</span>
				</a>
			</li>
			<li>
				<a href="<?= APPURL ?>ad_products/index">
					<i class='bx bxs-group'></i>
					<span class="text">Người dùng</span>
				</a>
			</li>
			<script>
				document.addEventListener("DOMContentLoaded", function () {
					var sideMenuItems = document.querySelectorAll(".side-menu.top li");
					var currentUrl = window.location.href; // Lấy URL hiện tại

					// Duyệt qua từng phần tử trong menu
					sideMenuItems.forEach(function (item) {
						var href = item.querySelector("a").getAttribute("href");
						// Kiểm tra xem URL hiện tại có chứa phần href của menu item không
						// Chỉ so sánh một phần cụ thể trong href
						// So sánh phần cụ thể trong href bằng switch
						switch (href) {
							case "ad_dashboard":
								item.classList.add("active");
								break;
							case "ad_products":
								item.classList.add("active");
								break;
							case "ad_order":
								item.classList.add("active");
								break;
							default:
								break;
						}
					});
				});

			</script>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="<?= APPURL ?>">
					<i class='bx bxs-cog'></i>
					<span class="text">Về THC Furniture</span>
				</a>
			</li>
			<li>
				<a href="<?= APPURL ?>user/logout" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Đăng xuất</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->