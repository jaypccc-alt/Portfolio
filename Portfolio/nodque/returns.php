
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
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php?logout=1.php">Log Out</a></li>
                
                </li>
              </ul>
            </div>
          </div>
        </nav>
    <section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Returns</h2>

                <form>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1cg">Product Name</label>
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1cg">Quantity</label>
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                    <label for="IacctStatus" class="form-label">Unit</label>
                    <select class="form-control form-control-lg" id="IacctStatus" name="IacctStatus" >
                        <option></option>
                        <option>Sack</option>
                        <option>Bag</option>
                        <option>Box</option>
                    </select>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1cg">Receiver</label>
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                    </div> 

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example1cg">Notes</label>
                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" />
                    </div>                                   

                    <div class="d-flex justify-content-center">
                    <button type="button"
                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Submit</button>
                    </div>
                    <div class="d-flex justify-content-center">
                    <a href="menu.php" class="btn btn-light btn-lg active" role="button" aria-pressed="true">Return</a>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
include('footer.php');
?>
