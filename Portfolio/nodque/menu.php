<?php

include('header.php');

?>

<body>
  
    <div class="d-flex" id="wrapper">
      <!-- Sidebar-->
      <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">5N Plainfield Marketing</div>
          <div class="list-group list-group-flush">
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="products.php">Products</a>
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="scan.php">Scan</a>
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="receiving.php">Receiving</a>
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="outgoing.php">Outgoing</a>
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="damages.php">Damages</a>
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="bo.php">BO</a>
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="returns.php">Returns</a>
              <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addnewproduct.php">Add Product</a>
            </div>
      </div>
      <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-primary" id="sidebarToggle">Toggle Menu</button>
                      </div>
                </nav>
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="container-fluid">
              <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php?logout=1.php">Log Out</a></li>
                </li>
              </ul>
          </div>
        </nav>
      <div class="container-fluid">
        <p>You are Logged in</p>
        <p>Position:</p>
      </div>
    </div>
  </div>
 
<?php
include('footer.php');
?>