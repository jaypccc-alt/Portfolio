<?php

include('header.php');

?>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom bg-light">BRAND NAME </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="receiving.php">Scan</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="receiving.php">Receiving</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="outgoing.php">Outgoing</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="inventory.php">Inventory</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="damages.php">Damages</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="bo.php">BO</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="returns.php">Returns</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="addinventory.php">Add Inventory</a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php?logout=1.php">Log Out</a></li>
                
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <div class="container-fluid">
        <p>You are Logged in as: Juan DeLa Cruz</p>
        <p>Position: Manager</p>
      </div>
    </div>
  </div>
 
<?php
include('footer.php');
?>