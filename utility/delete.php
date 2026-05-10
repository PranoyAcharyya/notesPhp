<?php

require __DIR__ . '/../database/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_POST['id'];

    $sql = "DELETE FROM notes WHERE noteId = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':id', $id);

    if($stmt->execute()){

        echo "success";

    }else{

        echo "failed";

    }

}