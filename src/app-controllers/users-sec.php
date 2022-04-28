<?php
    include "../../path.php";
    include "../../app/database/db.php";

$errMsg='';
$moder=0;

$usersARR = selectAll('users');

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerForm__button'])){
    
    $login = trim($_POST['reg_login']);
    $email = trim($_POST['reg_email']);
    $passF = trim($_POST['reg_passF']);
    $passS = trim($_POST['reg_passS']);
    $cat = $_POST['reg_users_categories'];

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
            if ($cat === 'admin') {
                $admin = 1;
                $moder = 0;
            }elseif($cat === 'moder') {
                $admin= 0;
                $moder= 1;
            }else{
                $admin= 0;
                $moder= 0;
            }
            $pass = password_hash($_POST['reg_passF'], PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'moderator' => $moder,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);
            header('location: '.BASE_URL."admin/users/index.php");
       }
    }
}

// Редактирование пользователя - на этапе загрузки edit.php методом GET
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $users = selectOne('users', ['id' => $id]);
    $id = $users['id'];
    $login = $users['username'];
    $email = $users['email'];
    if ($users['admin'] === '1') {
        $role="Администратор";
    }elseif($users['moderator'] === '1'){
        $role="Модератор";
    }else{
        $role="Пользователь";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editRegisterForm__button'])){
    
    $login = trim($_POST['reg_login']);
    $email = trim($_POST['reg_email']);
    $passF = trim($_POST['reg_passF']);
    $passS = trim($_POST['reg_passS']);
    $cat = $_POST['reg_users_categories'];

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
            if ($cat === 'admin') {
                $admin = 1;
                $moder = 0;
            }elseif($cat === 'moder') {
                $admin= 0;
                $moder= 1;
            }else{
                $admin= 0;
                $moder= 0;
            }
            $pass = password_hash($_POST['reg_passF'], PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'moderator' => $moder,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = update('users', $post);
            header('location: '.BASE_URL."admin/users/index.php");
       }
    }
}

// Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('users', ['id' => $id], true);
    header('location: '.BASE_URL."admin/users/index.php");
}