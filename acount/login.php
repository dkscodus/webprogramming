<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        echo "로그인 성공!";
    } else {
        echo "사용자 이름 또는 비밀번호가 잘못되었습니다.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
    table {
        width: 280px;
        height: 250px;
        margin: auto;
        font-size: 15px;
        }
    input[type="text"], input[type="password"] {
        width: 250px;
        height: 32px;
        font-size: 15px;
        border: 0;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
        background-color: rgb(233,233,233);
    }
    .btn {
        width: 263px;
        height: 32px;
        font-size: 15px;
        border: 0;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
        background-color: rgb(164, 199, 255);
    }
    .btn:active {
        width: 263px;
        height: 32px;
        font-size: 15px;
        border: 0;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
        background-color: rgb(61, 135, 255);
    }
    a {
        font-size: 12px;
        color: darkgray;
        text-decoration-line: none;
       
    }
    .join {
        text-align: center;
    }
</style>
</head>
<body>
<form>
    <table>
    <tr>
        <td><h2>로그인</h2></td>
    </tr>
    <tr>
        <td><input type="text" placeholder="ID"></td>
    </tr>
    <tr>
        <td><input type="password" placeholder=Password></td>
    </tr>
    <tr>
       <td><input type="checkbox"> 로그인 정보 저장</td>
    </tr>
    <tr>
        <td><input type="submit" value="Sign in" class="btn" onclick="alert('로그인 성공!')"></td>
    </tr>
    <tr>
        <td class="join"><a href="join.html">회원가입</a></td>
    </tr>
    </table>
</form>
</body>
</html>