<?php
/**
 * Created by PhpStorm.
 * User: florent
 * Date: 08/06/2018
 * Time: 15:54
 */

require("../infoBDD.php");

if(isset($_POST["user"]) && isset($_POST["pass"])){
    $id = $_POST["user"];
    $pass = $_POST["pass"];
}

$bdd = new PDO("mysql:host=$host;dbname=$db",$user, $pwd);

$request = $bdd->prepare("SELECT username, password, salt FROM user WHERE username=:user");
$request->bindParam(":user", $id);
$request->execute();

$answer = $request->fetchAll();

if(count($answer)==1)
    $pass = hash("sha512", $pass.$answer[0]['salt']);

if(count($answer)==1 && $answer[0]['username']==$id && $answer[0]['password']==$pass){
    session_start();
    $_SESSION["user"]=$id;
    echo 'valid';
}
elseif (count($answer)!=1 || $answer[0]['user']!=$id){
    echo "id";
}
else
    echo "pwd";