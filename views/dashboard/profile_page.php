
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
      
        <img src="<?php echo CSS . 'assets/img/logo.png' ;?>" alt="">
        <span class="d-none d-lg-block">Stock Management</span>
      </a>
    </div><!-- End Logo -->

    
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="main_page">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="inventory_page">
          <i class="bi bi-circle"></i>
          <span>Inventory</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="product_page">
          <i class="bi bi-circle"></i>
          <span>Product</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="delivery_page">
          <i class="bi bi-circle"></i>
          <span>Delivery</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="profile_page">
          <i class="bi bi-circle"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="<?php echo URL . 'auth/logout';?>">
          <i class="bi bi-circle"></i>
        <span>Logout</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
  </aside><!-- End Sidebar-->

  <main id="main" class="main">



<section class="section profile">
  <div class="card">
    <div class="card-body pt-3">
      <div class="tab-pane fade show active profile-overview" id="profile-overview">
        
      <h5 class="card-title">Profile Details</h5>

        <div class="row">
          <div class="col-lg-3 col-md-4 label ">Name</div>
          <div class="col-lg-9 col-md-8"><?php echo $_SESSION['name']; ?></div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-4 label">Company</div>
          <div class="col-lg-9 col-md-8">
            <form action="<?php echo URL . 'dashboard/company_set'; ?>" method="POST">
              <input type="name" placeholder="
              <?php
               if (empty($_SESSION['company_name'])) {
                echo "None";
                }
                else {
                echo $_SESSION['company_name'];
                } ?>" name="company_name">
              <button type="submit">Submit</button>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-4 label">Email</div>
          <div class="col-lg-9 col-md-8"><?php echo $_SESSION['email']; ?></div>
        </div>

      </div>
    </div>
  </div>
</section>


</main><!-- End #main -->
