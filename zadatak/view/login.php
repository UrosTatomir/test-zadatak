<!DOCTYPE html>
<html>
<?php
$errors = isset($errors) ? $errors : array();
$msg = isset($msg) ? $msg : "";

 include '../includes/head.php'; 

?>
<body>
<?php include '../includes/nav.php';  ?>
<div class="container-fluid ">
<?php if(isset($register)&&$register==0){ ?>
    <div class="container mt-5 col-4 text-center">
            <h4>Login</h4>
            <form action="routes.php" method="post">
                <input class="form-control" type="text" name="name" placeholder="name">
                <br>
                <input class="form-control" type="text" name="password" placeholder=" password">
                <br>
                <input class="btn btn-primary" type="submit" name="page" value="Log in">
            </form> 
            <h5>Don't have an account</h5>
            <h5>Please - <a class="text-right" href="routes.php?page=showregister">REGISTER</a></h5>
            <?php
            if (!empty($msg)) {   
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg; ?>
                </div>
            <?php
            } ?>
           
            <?php if (!empty($_GET['msg'])) {
                
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    
                    echo $_GET['msg'];
                    ?>
                </div>
            <?php
        } ?>
    </div>

<?php }elseif(isset($register)&&$register==1){ ?>

    <div class="container col-6 mt-3 mb-5 p-5 text-center">
        <h4>Registration</h4>
        <form action="routes.php" method="post">
            <input class="form-control" type="text" name="name" placeholder="Enter name">
            <span class="alert-danger">
                <?php if (array_key_exists('name', $errors)) {
                    echo $errors['name'];
                } ?>
            </span>
            <br>
            <input class="form-control" type="text" name="surname" placeholder="Enter surname">
            <span class="alert-danger">
                <?php if (array_key_exists('surname', $errors)) {
                    echo $errors['surname'];
                } ?>
            </span>
            
            <br>
            <input class="form-control" type="text" name="email" placeholder="Enter email">
            <span class="alert-danger">
                <?php if (array_key_exists('email', $errors)) {
                    echo $errors['email'];
                } ?>
            </span>
            
            <br>
            <input class="form-control" type="password" name="password" placeholder="insert password">
            <span class="alert-danger">
                <?php if (array_key_exists('password', $errors)) {
                    echo $errors['password'];
                } ?>
            </span>
            <br>
            <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm  password">
            <span class="alert-danger">
                <?php if (array_key_exists('confirmpassword', $errors)) {
                    echo $errors['confirmpassword'];
                } ?>
            </span>
            <br>
            <input class="btn btn-warning" type="submit" name="page" value="Register">
        </form>
        <?php
    
        if (!empty($msg)) {
            ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $msg;  ?>
        </div>
        <?php 
        } ?>
        
    </div>
<?php } ?>

</div>
</body>
</html>