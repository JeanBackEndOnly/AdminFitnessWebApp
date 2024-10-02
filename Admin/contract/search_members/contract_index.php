<?php
require_once '../../../include/config.php';
require_once '../../../include/session.php';
require_once '../../functionalities/all_view.php';

if(isset($_GET["member_id"])){
    $member_id = $_GET["member_id"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../css/contract_sub.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="outer-container">
        <div class="inner-container">
            <img src="../../../image/logo.png">
            <a href="search.php"><img src="../../../image/button-back.png"></a>
            <form action="contract_func.php" method="post">
                <input type="hidden" name="members_id" value="<?php echo $member_id; ?>">

                <label for="contract_Renew" id="renewal">CONTRACT RENEWAL</label>
                <input type="date" id="contract_Renew" name="contract_Renewal" required>

                <label for="contract_Expired" id="expiration">CONTRACT EXPIRATION</label>
                <input type="date" id="contract_Expired" name="contract_Expiration" required>

                <button id="contract_Button" type="submit">ADD CONTRACT</button>

             </form>
            
            <div class="popup">
                <?php
                    contract_success();
                ?>
            </div>

        </div>
    </div>
</body>
</html>
