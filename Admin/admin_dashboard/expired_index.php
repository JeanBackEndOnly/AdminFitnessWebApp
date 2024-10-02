<?php

require_once '../../include/config.php';
require_once '../../include/session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/expired.css?v=<?php echo time(); ?>">
</head>
<body>
   <div class="outer-container">
        <div class="inner-container">
            <div class="h1-div">
                <h1>EXPIRED</h1><h2>CONTRACTS</h2>
            </div>
            <a href="dashboard.php"><img src="../../image/button-back.png" alt=""></a>
            <div class="expired-contract">
                <?php
                    $sql = "SELECT contract.contract_Expiration, members.* FROM contract
                    INNER JOIN members ON contract.members_id = members.member_id
                    WHERE contract_Expiration <= curdate()";
                        if($result = $pdo->query($sql)){
                            
                            foreach($result as $row){
                                echo '<ul>';
                                    echo '<li><p><img src="../../image/logo.png"></p></li>';
                                    echo '<li><p>' . $row["fullName"] . '</p></li>';
                                    echo '<li><p>' . $row["contract_Expiration"] . '</p></li>';
                                echo '</ul>';                         
                            }                        
                        }
                ?>
            </div>
        </div>
   </div>
</body>
</html>