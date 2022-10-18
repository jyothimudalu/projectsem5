<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body{
            overflow-x: hidden;
        }
        .product_img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<!--boostrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<!--awesome font link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
 integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
    <!--navbar-->
    <!--first child-->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">

                    <?php
            if (!isset($_SESSION['admin_name'])) {
                echo "<li class=nav-item>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
            } else {
                echo " <li class=nav-item>
       <a class='nav-link' href='#'>Welcome " . $_SESSION['admin_name'] . "</a>
     </li>";
            }

            if (!isset($_SESSION['admin_name'])) {
                echo "<li class='nav-item'>
        <a class='nav-link' href='admin_login.php'>Login</a>
      </li>";
            } else {
                echo " <li class='nav-item'>
        <a class='nav-link' href='admin_logout.php'>Logout</a>
      </li>";
            }
            ?>
                    </ul>
                </nav>
            </div>

        </nav>
        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!--third child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    
                    <p class="text-light text-center text-success fw-bold">Admin Dashboard</p>
                </div>
                <div class="button text-center p-5">
                    <button><a href="insert_product.php" class="nav-link text-dark bg-info my-2 mx-2">
                        Insert Products
                    </a></button>
                    <button><a href="index.php?view_products" class="nav-link text-dark bg-info my-2 mx-2">
                        View Products
                    </a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-dark bg-info my-2 mx-2">
                        Insert Categories
                    </a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-dark bg-info my-2 mx-2">
                        View Categories
                    </a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-dark bg-info my-2 mx-2">
                       Insert Brands
                    </a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-dark bg-info my-2 mx-2">
                        View Brands
                    </a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-dark bg-info my-2 mx-2">
                        All Orders
                    </a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-dark bg-info my-2 mx-2">
                        All Payments
                    </a></button>
                    <button><a href="index.php?list_users" class="nav-link text-dark bg-info my-2 mx-2">
                        List Users
                    </a></button>
                    <button><a href="" class="nav-link text-dark bg-info my-2 mx-2">
                        Logout
                    </a></button>
                </div>
            </div>
        </div>

    </div>

    <!--forth child-->
    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_products'])){
            include('delete_products.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['edit_brands'])){
            include('edit_brands.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brands'])){
            include('delete_brands.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['delete_orders'])){
            include('delete_orders.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['delete_payments'])){
            include('delete_payments.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
         ?>
    </div>

    <!--last child-->
    <!--<div class="bg-info p-3 text-center d-flex flex-column h-100">
    <p>
        All rights reserved @-Designed by GSJ-2022
</p>
</div>
</body>-->
<?php
include('../includes/footer.php');

?>

<!-- css file link = style.css -->

<link rel="stylesheet" href="../style.css">

</html>