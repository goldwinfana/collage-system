<?php
include './../includes/session.php';

$conn = $pdo->open();

if (isset($_POST['stud_id'])) {
    $id = $_POST['stud_id'];

    $stmt = $conn->prepare("SELECT * FROM learner WHERE id=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    echo json_encode($row);
}

if (isset($_POST['userid'])) {
    $id = $_POST['userid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $course_name =$_POST['course_name'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM learner WHERE email=:email AND id <>:id");
    $stmt->execute(['email'=>$email, 'id'=>$id]);
    $row = $stmt->fetch();
    if($row['numrows'] > 0){
        $_SESSION['error'] = 'Email already exits';
    }
    else {

        $stmt = $conn->prepare("UPDATE learner SET email=:email,
    password=:password, first_name=:first_name, last_name=:last_name,course_name=:course_name WHERE id=:id");
        $stmt->execute(['email' => $email, 'password' => $password, 'firs_tname' =>
            $firstname, 'last_name' => $lastname, 'course_name' => $course_name, 'id' => $id]);

        $_SESSION['success'] = 'Student updated successfully';
    }
    header('location : students.php');
}

if (isset($_POST['course_id'])) {

    $stmt = $conn->prepare("SELECT * FROM course");
    $stmt->execute();
    $row = $stmt->fetch();

    echo json_encode($row);
}


if(isset($_POST['addnew'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $course_name = $_POST['course_name'];

    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM learner WHERE email=:email");
    $stmt->execute(['email' => $email]);
    $row = $stmt->fetch();
    if ($row['numrows'] > 0) {
        $_SESSION['error'] = 'Email already exits';
    } else {

        $stmt = $conn->prepare("INSERT INTO learner(email, password, first_name,last_name,course_name) VALUES(:email, :password, :first_name,:last_name,:course_name)");
        $stmt->execute(['email' => $email, 'password' => $password, 'first_name' =>
            $firstname, 'last_name' => $lastname, 'course_name' => $course_name]);
        $_SESSION['success'] = 'Student updated successfully';

    }
    header('Location: students.php');
}


if(isset($_POST['id_delete'])){
    $id = $_POST['id_delete'];

    try{
        $stmt = $conn->prepare("DELETE FROM learner WHERE id=:id");
        $stmt->execute(['id'=>$id]);

        $_SESSION['success'] = 'Student deleted successfully';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }
    header('Location: students.php');

}
$pdo->close();

?>