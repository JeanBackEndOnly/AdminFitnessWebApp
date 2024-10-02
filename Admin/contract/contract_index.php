<?php
    require_once '../../include/config.php';
    require_once '../../include/session.php';
    require_once '../functionalities/all_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link rel="stylesheet" type="text/css" href="../css/contract.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="header">
        <div class="title">
            <h1>CONTRACT</h1>
        </div>
        <div class="search-form">
            <form action="search_members/search.php" method="post">
                <button class="search-button"><img src="../../image/searching-icon.png"></button>
                <input type="text" name="search" placeholder="Search Member:">
                
            </form>
        </div>
        <div class="table-div">
                <?php 
                    $sql = "SELECT * FROM members
                    INNER JOIN contract ON members.member_id = contract.members_id";
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo '<thead class="header-th">';
                                    echo '<tr class="header-tr">';
                                        echo "<th>ID #</th>";
                                        echo "<th>FULL NAME</th>";
                                        echo "<th>EMAIL</th>";
                                        echo "<th>ADDRESS</th>";
                                        echo "<th>PHONE #</th>";
                                        echo "<th>GENDER</th>";
                                        echo "<th>AGE</th>";
                                    echo "</tr>";   
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                            echo "<td>" . $row['member_id'] . "</td>";
                                            echo "<td>" . $row['fullName'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . $row['phone_no'] . "</td>";
                                            echo "<td>" . $row['gender'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "</td>";
                                        echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            unset($stmt);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                ?>
        </div>
        <div class="sucess-popup">
            <?php deleteContract_success();
                    contract_success();
            ?>
        </div>
        <div class="side-nav">
            <div class="user">
                <div>
                <a href="../profile_index.php"><img src="../../image/logo.png" class="user-img"></a>
                    <h1 class="admin">
                        ADMIN
                    </h1>
                </div>
            </div>
            <div class="navs-div">
                    <ul>
                        <a href="../admin_dashboard/dashboard.php"><li id="dashboard-li"><img src="../../image/dashboard_icon.png" class="dashboard-img"><p>DASHBOARD</p></li></a>
                        <a href="../admin_ManageMembers/manage_members.php"><li id="members-li"><img src="../../image/membership-icon.png" class="members-img"><p>MEMBERSHIP</p></li></a>
                        <a href="../contract/contract_index.php"><li id="contract-li"><img src="../../image/setting-icon.png" class="contract-img"><p class="contract-p">CONTRACT</p></li></a>
                    </ul>
            </div>
            <ul>
                <a href="../logout.php"><li id="logout-li"><img src="../../image/logout.png" class="logout-img"><p>LOGOUT</p></li></a>
            </ul>
        </div>
    </div>
</body>
</html>