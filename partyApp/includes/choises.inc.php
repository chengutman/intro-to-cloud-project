<?php
include_once 'dbh.inc.php';
session_start();
if (!empty($_POST['chosenC'])) {
    $category = $_POST['chosenC'];
    $_SESSION['category'] = $category;
    header("Location:../theme.php?category=".$category);
 }

 if (!empty($_POST['chosenT'])) {
    $theme = $_POST['chosenT'];
    $_SESSION['theme'] = $theme;
    header("Location:../location.php?choose=theme=".$theme);
 }
 if (!empty($_POST['chosenL'])) {
    $location = $_POST['chosenL'];
    $_SESSION['location'] = $location;
    header("Location:../guest-form.php?choose=location=".$location);
 }
?>