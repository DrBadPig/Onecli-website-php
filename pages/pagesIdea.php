<?php
  $page = $_POST['pageId'];
  echo file_get_contents("idea".$page.".php");
?>