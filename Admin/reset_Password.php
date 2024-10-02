<?php 
    require_once '../include/config.php';
    require_once '../include/session.php';
    require_once 'functionalities/all_view.php';

    if(isset($_SESSION["user_id"])){
        $id = $_SESSION["user_id"];
    }else{
        echo "id not found";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="outer-container">
        <div class="inner-container">
        <a href="profile_index.php?id=<?php echo isset($id) ? $id : '' ?> "><img src="../image/button-back.png"></a>
            <img src="../image/logo.png">
            
            <form action="reset_Func.php?id=<?php echo isset($id) ? $id : '' ?>" method="post">
                <input type="password" name="new_Password" Placeholder="New Password">
                <input type="password" name="confirm_Password" Placeholder="confirm Password">
                <button>Update Password</button>
            </form>
            <div class="popup">
                <?php
                    password_Admin();
                ?>
            </div>
            <div class="popupPassword">
                <?php
                    password_reset();
                ?>
            </div>
        </div>
    </div>
</body>
</html>