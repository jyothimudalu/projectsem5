<?php
include('../includes/connect.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

    <!--boostrap css link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!--awesome font link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<style>
    body{
        overflow-x: hidden;
    }
</style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_img.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5 ">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-lable">Username</label>
                        <input type="text" id="admin_name" name="admin_name" placeholder="Enter your name" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-lable">Email</label>
                        <input type="text" id="admin_email" name="admin_email" placeholder="Enter your email" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" id="admin_password" name="admin_password" placeholder="Enter password" required="required"
                        class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-lable">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter password again" required="required"
                        class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account?<a href="admin_login.php" class="link-danger">Login</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_registration'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_password = $_POST['confirm_password'];
    

    $select_query="Select * from admin_table where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Admin name or email already exist')</script>";
    }
    else if($admin_password!=$confirm_password){
        echo "<script>alert('Passwords do not match')</script>";

    }
    else{

        $insert_query="insert into admin_table(admin_name,admin_email,admin_password)
        values ('$admin_name','$admin_email','$hash_password')";
    
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Data inserted successfully')</script>";
            echo "<script>window.open('admin_login.php')</script>";
        }
        else{
        die(mysqli_error($conn));
    
        }
    
    
    }
}
    ?>