<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/project/project1/global_pass.php';

if(!empty($_POST['email']) && !empty($_POST['text'])){
  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  mysqli_set_charset($link, "utf8");
  $formfio = trim($_POST['fio']);
  $fio = mysqli_real_escape_string($link, $formfio);
  $formemail = trim($_POST['email']);
  $email = mysqli_real_escape_string($link, $formemail);
  $tel = '';
  if(isset($_POST['tel'])){
    $formtel = trim($_POST['tel']);
    $tel = mysqli_real_escape_string($link, $formtel);
  }
  $fromtext = trim($_POST['text']);
  $text = mysqli_real_escape_string($link, $fromtext);
  $qr = "INSERT INTO leads (fio,email,tel,text) VALUES ('$fio','$email','$tel','$text')";
  $result = mysqli_query($link, $qr);
  if($result){
    header('Location: '.$_SERVER['HTTP_REFERER']);
  }
  else{
    printf("Сообщение ошибки: %s\n", mysqli_error($link));
  }
}
else{
  header('Location: '.$_SERVER['HTTP_REFERER']);
}
