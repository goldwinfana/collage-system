<?php
include './../includes/session.php';

session_start();
$conn = $pdo->open();

if(isset($_POST['login'])){

    $email = $_POST['username'];
    $password = $_POST['password'];

    try{

        $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows1 FROM admin WHERE email = :email");
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch();

        if($row['numrows1'] > 0){
            if($password == $row['password']){
                $_SESSION['admin'] = $row['admin_id'];
                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $row['email'];
            }
            else{
                $_SESSION['error'] = 'Incorrect Password';
            }
        }else{
            $_SESSION['error'] = 'Username Does Not Exist';
        }


    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

}
else{
    $_SESSION['error'] = 'Input login credentails first';
}

$pdo->close();

header('location: login.php');

?>