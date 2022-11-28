<?php

session_start();

include "dbconn.php";

if (isset($_POST['user']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $user = validate($_POST['user']);

    $pass = validate($_POST['password']);

    if (empty($user)) {

        header("Location: index.php?error=A username is required.");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=A password is required.");

        exit();

    }else{

        $sql = "SELECT * FROM credentials WHERE name='$user' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['name'] === $user && $row['password'] === $pass) {

                echo "Successfully logged in!";

                $_SESSION['name'] = $row['name'];

                header("Location: h0me.php");

                exit();

            }else{

                header("Location: index.php?error=Invalid username or password.");

                exit();

            }

        }else{

            header("Location: index.php?error=Invalid username or password.");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}
