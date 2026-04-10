<!D<!DOCTYPE html>
<html>
<head>
  <title>Simple Ecommerce</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    /* CSS styles for the page */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f8f9fa;
    }
    
    h1 {
      color: #333;
    }
    
    .product {
      margin-bottom: 20px;
      border: 1px solid #ccc;
      padding: 10px;
      background-color: #fff;
    }
    
    .product img {
      max-width: 100%;
    }
    
    .product .name {
      font-weight: bold;
    }
    
    .product .price {
      color: #008000;
    }
    
    .cart {
      border: 1px solid #ccc;
      padding: 10px;
      margin-top: 20px;
      background-color: #fff;
    }
    
    .cart .item {
      margin-bottom: 10px;
    }
    
    .cart .item .name {
      font-weight: bold;
    }
    
    .cart .item .price {
      color: #008000;
    }
    
    /* Custom color scheme */
    .btn-primary {
      background-color: #ffc107;
      border-color: #ffc107;
    }
    
    .btn-primary:hover {
      background-color: #e0a800;
      border-color: #e0a800;
    }
    
    .btn-primary:focus {
      box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
    }
    
    .btn-success {
      background-color: #007bff;
      border-color: #007bff;
    }
    
    .btn-success:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    
    .btn-success:focus {
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
    }
  </style>
</head>
<body>
  <h1>Welcome to Simple Ecommerce</h1>
  
  <?php
  // Sample products array
  $products = [
    [
      'name' => 'Product 1',
      'price' => 10,
      'image' => 'product1.jpg'
    ],
    [
      'name' => 'Product 2',
      'price' => 15,
      'image' => 'product2.jpg'
    ],
    [
      'name' => 'Product 3',
      'price' => 20,
      'image' => 'product3.jpg'
    ]
  ];
  
  // Display products
  foreach ($products as $product) {
    echo '<div class="product">';
    echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" class="img-fluid">';
    echo '<div class="name">' . $product['name'] . '</div>';
    echo '<div class="price">$' . $product['price'] . '</div>';
    echo '<button class="btn btn-primary">Add to Cart</button>';
    echo '</div>';
  }
  ?>
  
  <div class="cart">
    <h2>Your Cart</h2>
    
    <?php
    // Sample cart array
    $cart = [
      [
        'name' => 'Product 1',
        'price' => 10
      ],
      [
        'name' => 'Product 2',
        'price' => 15
      ]
    ];
    
    // Display cart items
    foreach ($cart as $item) {
      echo '<div class="item">';
      echo '<div class="name">' . $item['name'] . '</div>';
      echo '<div class="price">$' . $item['price'] . '</div>';
      echo '</div>';
    }
    ?>
  </div>
  
  <!-- Link Bootstrap JS at the end of the body for better performance -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
