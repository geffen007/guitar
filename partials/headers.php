<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/init.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/php/functions.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/guitar/application/Validate.php';

alert();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/guitar/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <script src="/guitar/js/jquery-3.4.1.min.js"></script>
    <?php echo $libJS ?>
  </head>
  <body>
    <nav class="container">
      <a href="/guitar/">
        <div class="logo m-4">
        </div>
      </a> 
    </nav>
    <ol class="breadcrumb container pt-2">
        <li class="breadcrumb-item">
          <a href="/guitar/" style="color: white">HOME</a> 
        </li>
        <li>
        <span class="px-3"> > </span>
        </li>
        <li>
          <?php crumbs() ?>
        </li>
    </ol>
    <div class="g-bar container px-0">

      <?php if (isLogged()){ ?>
        <h3 class="m-auto">Ciao  <?php echo ucfirst($_SESSION["user"]); ?> </h3>
        <div class="buttons"> 
          <a class="btn btn-light" href="/guitar/views/mycompositions.php">MIE COMPOSIZIONI</a>
          <a class="btn btn-light" href="/guitar/php/logout.php">LOGOUT</a>
        </div>
      <?php }else{ ?>
        <div class="buttons"> 
          <a class="btn btn-light" href="/guitar/views/register.php">REGISTRATI</a>
          <a class="btn btn-light" href="/guitar/views/login.php">LOGIN</a>
        </div>
      <?php } ?>


    </div>



