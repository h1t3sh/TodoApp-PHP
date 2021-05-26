<?php

if(isset($_POST['id'])){
    require '../db_conn.php';

    $id = $_POST['id'];

    if(empty($id)){
        header('Location: ../index.php?message=error');
    } else {
        $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            header("Location: ../index.php?message=fromremove.php");
        } else {
            echo 0;
        }
        $conn = null;
        exit();
    }
} else {
    header('Location: ../index.php?message=error');
}