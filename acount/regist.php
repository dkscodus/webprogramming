<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);

    if ($stmt->execute()) {
        echo "회원가입이 완료되었습니다.";
    } else {
        echo "오류가 발생했습니다: " . $stmt->error;
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
<title>Join</title>
<style>
    table {
        width: 280px;
        height: 550px;
        margin: auto;
        
    }
    .email {
        width: 127px;
        height: 32px;
        font-size: 15px;
        border: 0;
        border-color: lightgray;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
        background-color: rgb(233,233,233);
    }
    .text {
        width: 250px;
        height: 32px;
        font-size: 15px;
        border: 0;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
        background-color: rgb(233,233,233);
    }
    select {
        width: 100px;
        height: 32px;
        font-size: 15px;
        border: 1;
        border-color: lightgray;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
    }
    .btn {
        width: 262px;
        height: 32px;
        font-size: 15px;
        border: 0;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
        background-color: rgb(164, 199, 255);
    }
    .btn:active {
        width: 262px;
        height: 32px;
        font-size: 15px;
        border: 0;
        border-radius: 15px;
        outline: none;
        padding-left: 10px;
        background-color: rgb(61, 135, 255);
    }
</style>
</head>
<body>
<form action="login.html">
    <table>
    <tr>
        <td><h2>회원가입</h2></td>
    </tr>
    <tr><td>아이디</td></tr>
    <tr><td><input type="text" class="text"></td></tr>
    <tr><td>비밀번호</td></tr>
    <tr><td><input type="password" class="text"></td></tr>
    <tr><td>비밀번호 확인</td></tr>
    <tr><td><input type="password" class="text"></td></tr>
    <tr><td>이름</td></tr>
    <tr><td><input type="text" class="text"></td></tr>
    <tr><td>생년월일</td></tr>
    <tr><td><input type="date" class="text"></td></tr>
    <tr><td>이메일</td></tr>
    <tr>
        <td><input type="text" class="email"> @ 
            <select>
                <option>naver.com</option>
                <option>gmail.com</option>
                <option>daum.net</option>
                <option>nate.com</option>
            </select>
        </td>
    </tr>
    <tr><td><input type="submit" value="가입하기" class="btn" onclick="alert('가입 성공!')"></td></tr>
    </table>
</form>
</body>
</html>