<?php
error_reporting(0);
?>
<div class="dlabnav">
	<div class="dlabnav-scroll">
		<?php
		$role = $_SESSION['role'];
		$userId = $_SESSION['userid'];
		$enterprise_type = $_SESSION['enterprise_type'];
		?>

		<ul class="metismenu" id="menu">
			<li>
				<a href="dashboard" aria-expanded="false">
					<i class="flaticon-025-dashboard"></i>
					<span class="nav-text">Dashboard</span>
				</a>
			</li>


		 
				<li>
					<a class="has-arrow " href="manage_jobs" aria-expanded="false">
						<i class="flaticon-036-floppy-disk"></i>
						<span class="nav-text">Products</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="product-list">Product List</a></li>

						<li><a href="products">Add New Product</a></li>
					</ul>
				</li>

				<li>
					<a class="has-arrow " aria-expanded="false">
						<i class="flaticon-093-waving"></i>
						<span class="nav-text">Orders</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="order-list">Order List</a></li> 
					</ul>
				</li>

				<!-- <li>
					<a class="has-arrow " aria-expanded="false">
					<i class="flaticon-086-star"></i>
						<span class="nav-text">Payments</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="#">Payment List</a></li> 
					</ul>
				</li> -->
 
				<li><a href="../logout" class="" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
							<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
							<polyline points="16 17 21 12 16 7"></polyline>
							<line x1="21" y1="12" x2="9" y2="12"></line>
						</svg>
						<span class="nav-text">Log out</span>
					</a>
				</li>

		 
		</ul>
		<div class="plus-box">
			<p class="fs-14 font-w600 mb-2" style="font-size:0.85rem !important">UK Enterprises<br>Product Platform<br></p>
		</div>
		<div class="copyright">
			<p><strong>UK Enterprise</strong> © <?php echo date('Y'); ?> All Rights Reserved</p> 
		</div>
	</div>
</div>