<?php

require_once "../../../include/config.php";
require_once "../../../include/session.php";

if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];

    try {
        if (is_numeric($searchQuery)) {
            $query = "SELECT * FROM members
            LEFT JOIN users ON members.users_id = users.id
            LEFT JOIN plans ON members.member_id = plans.members_id
            LEFT JOIN contract ON members.member_id = contract.members_id
            WHERE member_id = :searchQuery";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":searchQuery", $searchQuery, PDO::PARAM_INT);
        } else {
            $query = "SELECT * FROM members
            LEFT JOIN users ON members.users_id = users.id
            LEFT JOIN plans ON members.member_id = plans.members_id
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
    header("Location: ../manage_members.php");
    die();
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../css/search.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(empty($result)) {
            echo '<div class="no-result">';
                echo '<div class="noResult-container">';
                    echo '<p class="no-result-p">No result found.</p>';
                    echo '<a href="../manage_members.php"><img src="../../../image/button-back.png"></a>';
                echo '</div>';
            echo '</div>';
            
        } else {
            foreach($result as $row){ ?>
            <div class="container">
                <div class="inner-container">
                    <div class="logo-container">
                        <img class="logo-img" src="../../../image/logo.png">
                    </div>
                    <a href="../manage_members.php"><img src="../../../image/button-back.png"></a>
                    <div class="info-container">
                        <div class="column-one">
                            <ul>
                                <?php
                                    $_SESSION["member_id"] = $row["member_id"];
                                ?>
                                <li> <?php echo '<p>'.$row["fullName"].'</p>' ?></li>
                                <li> <?php echo '<p>'.$row["address"].'</p>' ?></li>
                                <li> <?php echo '<p>'.$row["gender"].'</p>' ?></li>
                            </ul>
                        </div>
                        <div class="column-two">
                            <ul>
                                <li> <?php echo '<p>'.$row["email"].'</p>' ?></li>
                                <li> <?php echo '<p>'.$row["phone_no"].'</p>' ?></li>
                                <li> <?php echo '<p>'.$row["age"].'</p>' ?></li>   
                            </ul>
                        </div>
                    
                    </div> 
                    <div class="button-icons"> 
                        <button class="deleteButton" onclick="showPopup(<?php echo $row['id']; ?>, <?php echo $row['member_id']; ?>)"><img src="../../../image/delete-user.png"></button>
                        
                        <a href="edit_index.php?member_id=<?php echo $row['member_id']; ?>&searchQuery=<?php echo $_POST['search']; ?>">
                            <button class="edit-Button"><img src="../../../image/edit-user.png"></button>
                        </a>

                    </div>
                    <div id="confirmPopup-<?php echo $row['id']; ?>" class="popup">
                        <div class="popup-content">
                            <h2>Are you sure you want to delete this member?</h2>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="member_id" value="<?php echo $row['member_id']; ?>">
                                <input type="hidden" name="contract_id" value="<?php echo $row['contract_id']; ?>">
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
