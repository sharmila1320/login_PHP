<?php
session_start();
include 'config.php';

function setAlert($type, $message, $form = '') {
    $_SESSION['alerts'][] = ['type' => $type, 'message' => $message];
    $_SESSION['active_form'] = $form;
    header("Location: index.php");
    exit();
}

if (isset($_POST['register_btn'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        setAlert('error', 'Email already registered!', 'register');
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashed);
        if ($stmt->execute()) {
            $_SESSION['name'] = $name;
            setAlert('success', 'Registration successful! Welcome ' . $name);
        } else {
            setAlert('error', 'Something went wrong. Try again.', 'register');
        }
    }
}

if (isset($_POST['login_btn'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 1) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            setAlert('success', 'Welcome back ' . $user['name']);
        } else {
            setAlert('error', 'Incorrect password!', 'login');
        }
    } else {
        setAlert('error', 'User not found!', 'login');
    }
}
?>
