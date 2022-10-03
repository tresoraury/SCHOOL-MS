<?php
session_start();

require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' 
                    WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student not Updated";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "INSERT INTO students (name,email,phone,course) VALUES 
        ('$name','$email','$phone','$course')";
    
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Created";
        header("Location: student-create.php");
        exit(0);
    }else
    {
        $_SESSION['message'] = "Student not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

if(isset($_POST['save_teacher']))
{
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO teachers (firstname,lastname,designation,phone) VALUES
        ('$firstname','$lastname','$designation','$phone')";
    
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {
        $_SESSION['message'] = "Teacher Created";
        header("Location: teacher-create.php");
        exit(0);
    }else
    {
        $_SESSION['message'] = "Teacher not Created";
        header("Location: teacher-create.php");
        exit(0);
    }
}

if(isset($_POST['update_teacher']))
{
    $teacher_id = mysqli_real_escape_string($con, $_POST['teacher_id']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE teachers SET firstname='$firstname', lastname='$lastname', designation='$designation', phone='$phone'
            WHERE id='$teacher_id' ";
    
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
        $_SESSION['message'] = "Teacher Updated";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher Not Updated";
        header("Location: index2.php");
        exit(0);
    }
}

if(isset($_POST['delete_teacher']))
{
    $teacher_id = mysqli_real_escape_string($con, $_POST['delete_teacher']);

    $query = "DELETE FROM teachers WHERE id='$teacher_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Teacher Deleted";
        header("Location: index2.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Teacher not Deleted";
        header("Location: index2.php");
        exit(0);
    }
}

if(isset($_POST['registerbtn']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($password === $password)
    {
        $query = "INSERT INTO register (email,password) VALUES ('$email','$password')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
       {
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
       }
       else
       {
            $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: register.php');
       }
    }
    else
    {
        $_SESSION['status'] = "Password and Confirmation Password Does Not Match";
        header("Location: register.php");
    }
}

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
    $query_run = mysqli_query($con,$query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['email'] = $email_login;
        header('Location: welcome.php');
    }
    else
    {
        $_SESSION['status'] = 'Email id / Password is invalid';
        header('Location: login.php');
    }
}

?>
