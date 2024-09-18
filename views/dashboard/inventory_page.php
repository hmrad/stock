
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
      </li><!-- End Dashboard Nav -->
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

              <!-- Horizontal Form -->
              <form method='POST' action='<?php echo URL.'dashboard/inventory_set'; ?>'>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Inventory Name</label>
                  
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail" name="address">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Capacity</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputNumber" name="capacity">
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End Horizontal Form -->

            <div class="card-body">
              <h5 class="card-title">Submitted Inventories</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Capacity</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($data['inventories'] as $inventory) { ?>
                  <tr>

                    <td><?php echo $inventory['name'];?></td>
                    <td><?php echo $inventory['address'];?></td>
                    <td><?php echo $inventory['capacity'];?></td>

                  </tr><?php }?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
              
            </div>


  </main><!-- End #main -->


