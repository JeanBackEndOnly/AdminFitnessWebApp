<?php
    require_once '../../include/config.php';
    require_once '../../include/session.php';

    try {
        $query = "SELECT COUNT(*) as total_members FROM members"; 
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $totalMembers = $stmt->fetchColumn();
    
        $query = "SELECT COUNT(contract_Renewal) as total_contract FROM contract WHERE DATE(contract_Renewal) <= CURDATE()";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $totalContract = $stmt->fetchColumn(); 

        $query = "SELECT COUNT(contract_Expiration) as total_contract FROM contract WHERE DATE(contract_Expiration) <= CURDATE()";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $totalExpiredContract = $stmt->fetchColumn(); 
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="header">
        <div class="title">
            <h1>DASHBOARD</h1>
        </div>
        <div class="content-container">
            <div class="column-one">
                <div class="date">
                    <?php
                        echo '<p class="day-date">' . strtoupper(date('l')). '</p>';
                        echo '<p class="year-date">' . date('d/m/Y') . '</p>';
                    ?>
                </div>
                <div class="contract-renewed">
                    <?php
                        echo '<p class="contract-title">CONTRACT RENEWAL</p>';
                        echo '<h1>' . $totalContract . '</h1>';
                    ?>
                </div>
            </div>
            <div class="column-two">
                <div class="gym-members">
                    <?php
                        echo '<p class="gym-title">GYM MEMBERS</p>';
                        echo '<h1>' . $totalMembers . '</h1>';
                    ?>
                </div>
                
                <div class="contract-expired">
                    <?php
                        echo '<p class="contracts-title">CONTRACT EXPIRED</p>';
                        echo '<a href="expired_index.php" class="a-tag"><img src="../../image/arrow-button.png"><p class="expired-contract">View All Expired Contract</p></a>';
                        echo '<h1>' . $totalExpiredContract . '</h1>';
                    ?>
                </div>
            </div>
            
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
                    <a href=""><li id="dashboard-li"><img src="../../image/dashboard_icon.png" class="dashboard-img"><p>DASHBOARD</p></li></a>
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