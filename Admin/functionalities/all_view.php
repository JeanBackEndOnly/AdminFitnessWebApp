<?php

declare(strict_types=1);

function user_inputs() {
    echo "<div class='form-columns'>";
    echo "<div class='column-one'>";

    if (isset($_SESSION["user_signup"]["fullName"]) && !isset($_SESSION["errors_signup"])) {
        echo '<li><input type="text" name="fullName" placeholder="Full Name:" value = "' . $_SESSION["user_signup"]["fullName"] . '"></li>';
    } else {
        echo '<li><input type="text" name="fullName" placeholder="Full Name:"></li>';
    }
    if (isset($_SESSION["user_signup"]["email"]) && !isset($_SESSION["errors_signup"]["email_registered"])) {
        echo '<li><input type="email" name="email" placeholder="E-mail:" value = "' . $_SESSION["user_signup"]["email"] . '"></li>';
    } else {
        echo '<li><input type="email" name="email" placeholder="E-mail:"></li>';
    }
    if (isset($_SESSION["user_signup"]["address"]) && !isset($_SESSION["errors_signup"])) {
        echo '<li><input type="text" name="address" placeholder="Address:" value = "' . $_SESSION["user_signup"]["address"] . '"></li>';
    } else {
        echo '<li><input type="text" name="address" placeholder="Address:"></li>';
    }
    if (isset($_SESSION["user_signup"]["phone_no"]) && !isset($_SESSION["errors_signup"])) {
        echo '<li><input type="tel" name="phone_no" placeholder="Phone No:" value = "' . $_SESSION["user_signup"]["phone_no"] . '"></li>';
    } else {
        echo '<li><input type="tel" name="phone_no" placeholder="Phone No:"></li>';
    }

    if (isset($_SESSION["user_signup"]["gender"]) && !isset($_SESSION["errors_signup"])) {
        echo '<select name="gender" id="gender" value = "' . $_SESSION["user_signup"]["gender"] . '">';
        echo    '<option value="NONE">SELECT GENDER</option>';
        echo    '<option value="MALE">MALE</option>';
        echo   '<option value="FEMALE">FEMALE</option>';
        echo '</select >';
    } else {
        echo '<select name="gender" id="gender">';
        echo    '<option value="NONE">SELECT GENDER</option>';
        echo    '<option value="MALE">MALE</option>';
        echo   '<option value="FEMALE">FEMALE</option>';
        echo '</select >';
    }

    echo "</div>";
    echo "<div class='column-two'>";

    if (isset($_SESSION["user_signup"]["age"]) && !isset($_SESSION["errors_signup"])) {
        echo '<li><input type="text" name="age" placeholder="Age:" value = "' . $_SESSION["user_signup"]["age"] . '"></li>';
    } else {
        echo '<li><input type="text" name="age" placeholder="Age:"></li>';
    }
    if (isset($_SESSION["user_signup"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<li><input type="text" name="username" placeholder="Username:" value = "' . $_SESSION["user_signup"]["username"] . '"></li>';
    } else {
        echo '<li><input type="text" name="username" placeholder="Username:"></li>';
    }

    echo '<li><input type="password" name="password" placeholder="Password:"></li>';

    echo '<li><input type="password" name="confirm_password" placeholder="Confirm Password:"></li>';

    echo '<button class="signup-button">ADD MEMBER</button>';
    echo "</div>";
    echo "</div>";
}

function signup_errors(){
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error){
            echo '<a href="register.php"><p class="p-error">' . $error . '</p></a>';
        }

        unset($_SESSION['errors_signup']);
    }else if(isset($_GET["signup"]) && $_GET["signup"] == "success"){
        echo '<div class="success-div">';
        echo '<p class="image-success"><img src="../../../image/successfully.png"</p>';
        echo '<a class="a-register" href="register.php"><button class="register-button">tap to continue</button></a>';
        echo '</div>';
    }
}

function delete_success(){
    if(isset($_GET["deleted"]) && $_GET["deleted"] == "sucessfully"){
        echo '<a href="../admin_ManageMembers/manage_members.php"><p>MEMBER HAVE BEEN SUCCESSFULLY DELETED</p><p>CLICK TO CONTINUE</p></a>';
    }
}
function contract_success(){
    if(isset($_GET["contract"]) && $_GET["contract"] == "success"){
        echo '<a href="../contract/contract_index.php"><p>CONTRACT HAVE BEEN SUCCESSFULLY ADDED</p><p>CLICK TO CONTINUE</p></a>';
    }
}
function deleteContract_success(){
    if(isset($_GET["deletedContract"]) && $_GET["deletedContract"] == "sucessfully"){
        echo '<a href="../contract/contract_index.php"><p>CONTRACT HAVE BEEN DELETED SUCCESSFULLY</p><p>CLICK TO CONTINUE</p></a>';
    }
}

function sucess_edit(){
    if(isset($_GET["edit"]) && $_GET["edit"] == "success"){
        echo '<p>INFORMATION HAVE BEEN EDITED SUCCESSFULLY</p>';
    }
}
function error_edit(){
    if(isset($_SESSION['errors_input'])){
        $errors = $_SESSION['errors_input'];
        foreach($errors as $error){
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION['errors_input']);
    }
}
function password_Admin(){
    if(isset($_SESSION['wrong_Password'])){
        $errors = $_SESSION['wrong_Password'];
        foreach($errors as $error){
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION['wrong_Password']);
    }else if(isset($_GET["correct"]) && $_GET["correct"] == "password"){
        echo '<a href="reset_Password.php">You can now reset the password!<p>click to continue</p></a>';
    }
}
function password_reset(){
    if(isset($_SESSION['password_notMatch'])){
        $errors = $_SESSION['password_notMatch'];
        foreach($errors as $error){
            echo '<p>' . $error . '</p>';
        }
        unset($_SESSION['password_notMatch']);
    }else if(isset($_GET["reset"]) && $_GET["reset"] == "success"){
        echo '<div class="password-success">';
        echo '<a href="reset_Password.php">Password changed successfully!<p>click to continue</p></a>';
        echo '</div>';
    }
}