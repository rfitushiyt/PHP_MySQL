<?php 
include_once("config.php");

if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "UPDATE users SET name=:name , surname=:surname , email=:email , password=:password WHERE id=:id";

        $prep = $conn->prepare($sql);
        $prep->bindParam(':id', $id);
        $prep->bindParam(':name', $name);
        $prep->bindParam(':username', $surname);
        $prep->bindParam(':email', $email);
        $prep->bindParam(':email', $password);

        $prep->execute();

        header("Location: dashboard.php");
    }
?>