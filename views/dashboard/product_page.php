
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
              <form method='POST' action='<?php echo URL.'dashboard/product_set'; ?>'>
                <div class="row mb-3">
                  <label for="inputName" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputPrice" name="price">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPrice" class="col-sm-2 col-form-label">Count</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputCount" name="count">
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Inventory</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="inventory_name">
                      <?php foreach ($data['inventories'] as $inventory) { ?>
                        <tr>
                      <option>
                          <td><?php echo $inventory['name'];?></td>
                      </option>
                        </tr><?php }?>
                    </select>
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Enter DateToInventory</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputDate" name="date_input">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Enter DateExitInventory</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputDate" name="date_output">
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End Horizontal Form -->

            <!-- Default Table -->
            <h5 class="card-title">Submitted Inventories</h5>
            <table class="table">
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
              
              <!-- End Default Table Example -->
</main><!-- End #main -->
