
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
        <a class="nav-link " href="">
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
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " href="<?php echo URL . 'auth/logout';?>">
          <i class="bi bi-circle"></i>
        <span>Logout</span>
        </a>
      </li><!-- End Dashboard Nav -->
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Inventory Capacityy -->
            <div class="col-12">
              <div class="card Inventory_capacity overflow-auto">
                <div class="card-body pb-0">
                  <h5 class="card-title">Inventory Capacity</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Inventory</th>
                        <th scope="col">Address</th>
                        <th scope="col">Capacity</th>
                      </tr>
                    </thead>
                    <?php foreach ($data['inventories'] as $inventory) { ?>
                    <tr>

                      <td><?php echo $inventory['name'];?></td>
                      <td><?php echo $inventory['address'];?></td>
                      <td><?php echo $inventory['capacity'];?></td>

                    </tr><?php }?>
                
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

           
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Submitted Product</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Count</th>
                        <th scope="col">Inventory Name</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data['products'] as $product) { ?>
                      <tr>

                        <td><?php echo $product['product_name'];?></td>
                        <td><?php echo $product['price'];?></td>
                        <td><?php echo $product['capacity'];?></td>
                        <td><?php echo $product['name'];?></td>

                      </tr><?php }?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            

          </div>
        </div><!-- End Left side columns -->
      </div>
    </section>

  </main><!-- End #main -->

