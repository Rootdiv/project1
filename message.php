<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/project1/global_pass.php';

if (!empty($_POST['email']) && !empty($_POST['text'])) {
  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  mysqli_set_charset($link, "utf8");
  $form_full_name = trim($_POST['full_name']);
  $full_name = mysqli_real_escape_string($link, $form_full_name);
  $form_email = trim($_POST['email']);
  $email = mysqli_real_escape_string($link, $form_email);
  $phone = '';
  if (isset($_POST['phone'])) {
    $form_phone = trim($_POST['phone']);
    $phone = mysqli_real_escape_string($link, $form_phone);
  }
  $from_text = trim($_POST['text']);
  $text = mysqli_real_escape_string($link, $from_text);
  $query = "INSERT INTO leads (full_name,email,phone,text) VALUES ('$full_name','$email','$phone','$text')";
  $result = mysqli_query($link, $query);
  if ($result) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    printf("Сообщение ошибки: %s\n", mysqli_error($link));
  }
} else {
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
