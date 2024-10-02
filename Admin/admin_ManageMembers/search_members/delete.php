<?php
require_once "../../../include/config.php";
require_once "../../../include/session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'] ?? null;
    $member_id = $_POST['member_id'] ?? null;
    // $contract_id = $_POST['contract_id'] ?? null;

    if ($id && $member_id) {
        $query = "DELETE FROM members WHERE member_id = :member_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":member_id", $member_id);
        $stmt->execute();

        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();  

        // $query = "DELETE FROM contract WHERE contract_id = :contract_id";
        // $stmt = $pdo->prepare($query);
        // $stmt->bindParam(":contract_id", $contract_id);
        // $stmt->execute();  

        header("Location: ../../admin_ManageMembers/manage_members.php?deleted=sucessfully");

        $pdo = null;
        $stmt = null;

        die();
    } else {
        echo "ID or Member ID not provided.";
    }
}
?>
