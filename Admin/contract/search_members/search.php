<?php

require_once "../../../include/config.php";
require_once "../../../include/session.php";

if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];

    try {
        if (is_numeric($searchQuery)) {
            $query = "SELECT * FROM members
            LEFT JOIN users ON members.users_id = users.id
            LEFT JOIN contract ON members.member_id = contract.members_id
            WHERE member_id = :searchQuery";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":searchQuery", $searchQuery, PDO::PARAM_INT);
        } else {
            $query = "SELECT * FROM members
            LEFT JOIN users ON members.users_id = users.id
            LEFT JOIN contract ON members.member_id = contract.members_id
            WHERE fullName LIKE :searchQuery";
            $stmt = $pdo->prepare($query);
            $searchTerm = "%" . $searchQuery . "%"; 
            $stmt->bindParam(":searchQuery", $searchTerm, PDO::PARAM_STR);
        }

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("query Failed: " . $e->getMessage());
    }
}else{
    header("Location: ../contract_index.php");
    die();
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../css/search_inContract.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(empty($result)) { ?>
            <div class="container">
                <div class="inner-container">
                    <div class="logo-container">
                        <img class="logo-img" src="../../../image/logo.png">
                    </div>
                    <a href="../contract_index.php"><img src="../../../image/button-back.png"></a>
                        <div class="column-one">
                            <ul>
                                <li><?php echo (!empty($row["fullName"])) ? $row["fullName"] : "<p>NO ACCOUNT YET</p>"; ?></li>
                            </ul>
                        </div>
                        <div class="column-two">
                            <div class="left-column">
                                <p>CONTRACT RENEWAL</p>
                                <li><?php echo (!empty($row["contract_Renewal"])) ? $row["contract_Renewal"] : "0000-00-00"; ?></li>
                            </div>
                            
                            <div class="right-column">
                                <p>CONTRACT EXPIRATION</p>
                                <li><?php echo (!empty($row["contract_Expiration"])) ? $row["contract_Expiration"] : "0000-00-00"; ?></li>
                            </div>
                        </div>
                    <div class="button-icons"> 
                        <button class="deleteButton" onclick="showPopup(<?php echo $row['id']; ?>, <?php echo $row['member_id']; ?>)" id="delete-Button"><img src="../../../image/delete-user.png"></button>
                    
                        <a href="contract_index.php?member_id=<?php echo $row["member_id"]; ?>">
                            <button class="contract-Button"><img src="../../../image/contract-icon.png"></button>
                        </a>

                    </div>
                    <div id="confirmPopup-<?php echo $row['id']; ?>" class="popup">
                        <div class="popup-content">
                            <h2>Are you sure you want to delete this contract?</h2>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="members_id" value="<?php echo $row['members_id']; ?>">
                                <button type="submit" id="yesButton">YES</button>
                            </form>
                            <button id="noButton" onclick="hidePopup(<?php echo $row['id']; ?>)">NO</button>
                        </div>
                    </div>

                    </div>
 
                </div>
                        
            </div>
            
       <?php } else {
            foreach($result as $row){ ?>
            <div class="container">
                <div class="inner-container">
                    <div class="logo-container">
                        <img class="logo-img" src="../../../image/logo.png">
                    </div>
                    <a href="../contract_index.php"><img src="../../../image/button-back.png"></a>
                        <div class="column-one">
                            <ul>
                                <?php
                                    $_SESSION["member_id"] = $row["member_id"];
                                ?>
                                <li> <?php echo '<p>'.$row["fullName"].'</p>' ?></li>
                            </ul>
                        </div>
                        <div class="column-two">
                            <div class="left-column">
                                <p>CONTRACT RENEWAL</p>
                                <li><?php echo $row["contract_Renewal"]; ?></li>
                            </div>
                            
                            <div class="right-column">
                                <p>CONTRACT EXPIRATION</p>
                                <li><?php echo $row["contract_Expiration"]; ?></li>
                            </div>
                        </div>


                    <div class="button-icons"> 
                        <button class="deleteButton" onclick="showPopup(<?php echo $row['id']; ?>, <?php echo $row['member_id']; ?>)"><img src="../../../image/delete-user.png"></button>
                    
                        <a href="contract_index.php?member_id=<?php echo $row["member_id"]; ?>">
                            <button class="contract-Button"><img src="../../../image/contract-icon.png"></button>
                        </a>

                    </div>
                    <div id="confirmPopup-<?php echo $row['id']; ?>" class="popup">
                        <div class="popup-content">
                            <h2>Are you sure you want to delete this contract?</h2>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="members_id" value="<?php echo $row['members_id']; ?>">
                                <button type="submit" id="yesButton">YES</button>
                            </form>
                            <button id="noButton" onclick="hidePopup(<?php echo $row['id']; ?>)">NO</button>
                        </div>
                    </div>

                    </div>
 
                </div>
                        
            </div>
           <?php 
           }
        }
    ?>
    <script>
        document.getElementById("delete-Button").disabled=true;
        function showPopup(id, memberId) {
            const popup = document.getElementById(`confirmPopup-${id}`);
            popup.style.display = "flex";
        }

        function hidePopup(id) {
            const popup = document.getElementById(`confirmPopup-${id}`);
            popup.style.display = "none";
        }

        window.onclick = function(event) {
            const popups = document.querySelectorAll('.popup');
            popups.forEach(function(popup) {
                if (event.target === popup) {
                    popup.style.display = "none";
                }
            });
        }

    </script>
</body>
</html>
