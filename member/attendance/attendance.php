<?php
require_once '../../include/config.php';
require_once '../../include/session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link rel="stylesheet" type="text/css" href="../css/attendance.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="header">
        <div class="title">
            <h1>ATTENDANCE</h1>
        </div>
        <div class="side-nav">
            <div class="user">
                <a href="../profile_index.php"><img src="../../image/logo.png" class="user-img"></a>
                <p><?php
                        if(isset($_SESSION["user_username"])){
                            $username = $_SESSION["user_username"];
                            echo '<p>' . $username . '</p>';
                        }
                     ?></p>
            </div>
            <div class="navs-div">
                <ul>
                    <a href="../dashboard/dashboard.php">
                        <li id="dashboard-li"><img src="../../image/dashboard.jpg" class="dashboard-img"><p>DASHBOARD</p></li>
                    </a>
                    <a href="../plans/plans.php">
                        <li id="plans-li"><img src="../../image/members.png" class="members-img"><p>PLANS</p></li>
                    </a>
                    <a href="../progress/progress.php">
                        <li id="progress-li"><img src="../../image/settings.png" class="members-img"><p>PROGRESS</p></li>
                    </a>
                    <a href="attendance.php">
                        <li id="attendance-li"><img src="../../image/dashboard.jpg" class="dashboard-img"><p>ATTENDANCE</p></li>
                    </a>
                </ul>
            </div>
            <ul>
                <a href="../logout.php">
                    <li id="logout-li"><img src="../../image/logout.png" class="logout-img"><p>LOGOUT</p></li>
                </a>
            </ul>
        </div>
    </div>
</body>
</html>
