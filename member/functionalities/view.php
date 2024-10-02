<?php

declare(strict_types=1);

function success_plans(){
    if(isset($_GET["input"]) && $_GET["input"] == "success"){
        echo '<a href="index_plans.php">Plans have been added successfully!<p class="ayaw-konaaaaa">tap top continue</p></a>';
    }
}