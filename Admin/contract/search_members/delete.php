<?php
require_once "../../../include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $members_id = $_POST['members_id'] ?? null;

    if ($members_id) {
        $query = "DELETE FROM contract WHERE members_id = :members_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":members_id", $members_id);
        $stmt->execute();
        
        header("Location: ../contract_index.php?deletedContract=sucessfully");

        $pdo = null;
        $stmt = null;

        die();
    } else {
        echo "ID or Member ID not provided.";
    }
}
?>
