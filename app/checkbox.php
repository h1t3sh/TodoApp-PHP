<?php 
if(isset($_POST['id']) && isset($_POST['checked'])){
    require '../db_conn.php';

    $id = $_POST['id'];
    $checked = $_POST['checked'];
    if(empty($id) && empty($checked)){
        echo 0;
    } else {
        $stmt = $conn->prepare("UPDATE todos SET checked = ? where id = ?");
        $res = $stmt->execute([$checked, $id]);

        if($res){
            echo 1;
        } else {
            echo 0;
        }
        $conn = null;
        exit();
    }
} else {
    header('Location: ../index.php?message=error');
// print_r($_POST);
}