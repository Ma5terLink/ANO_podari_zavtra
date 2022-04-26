<?php
include "app/database/db.php";

$errMsg='';
$warARR=[];

function logUser($arr){
    $_SESSION['id'] = $arr['id'];
    $_SESSION['login'] = $arr['username'];
    $_SESSION['admin'] = $arr['admin'];
    header('location: '.BASE_URL);
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerForm__button'])){
    
    $admin = 0;
    $login = trim($_POST['reg_login']);
    $email = trim($_POST['reg_email']);
    $passF = trim($_POST['reg_passF']);
    $passS = trim($_POST['reg_passS']);

    if($login === '' || $email === '' || $passF === '' || $passS === ''){
        $errMsg = "Необходимо заполнить все поля формы!";
    }elseif (mb_strlen($login,'UTF8') < 2){ 
        $errMsg = "Логин не может быть короче 2х символов!";
    }elseif (mb_strlen($passF,'UTF8') < 4 || mb_strlen($passS,'UTF8') < 4){
        $errMsg = "Один или несколько паролей имеют длину менее 4 символов!";
    }elseif ($passF !== $passS) {
        $errMsg = "Пароли не совпадают!";
    }else{
        $existence = selectOne('users', ['email' => $email]);
        if (!empty($existence['email']) && $existence['email'] === $email) {
            $errMsg = "Данный почтовый ящик уже зарегистрирован ранее!";
        }else{
            $pass = password_hash($_POST['reg_passF'], PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            logUser($user);
       }
    }
}elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['authForm__button'])){
    
    $email = trim($_POST['auth_mail']);
    $passw = trim($_POST['auth_pass']);

    if($email === '' || $passw === ''){
        $errMsg = "Что-то забыли заполнить?!";
    }elseif (mb_strlen($passw,'UTF8') < 4){
        $errMsg = "Слишком короткий пароль!";
    }else{
        $existence = selectOne('users', ['email' => $email]);

        if (!empty($existence['email']) && $existence['email'] === $email) {
            if(password_verify($passw, $existence['password'])) {
                logUser($existence);
            }else{
                $errMsg = "Ошибка авторизации! Проверьте почту или пароль!";
            }
            
        }else{
            $errMsg = "Пользователь с E-mail '<b>$email</b>' не зарегистрирован!";
        }
    }
}else{
    // echo 'GET';
    $login = '';
    $email = '';
}