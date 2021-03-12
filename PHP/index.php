<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="Static/styles.css">
  <title>Basic Banking System</title>
</head>

<body>


<?php
  include 'navbar.php';
?>
  <h1 class="container__name mt-4">Welcome to Bank Transfer System</h1>
  <div class="container container__main">
  
    <div class="row container__btns">
      <img src="Images/BankHomeImage.png" alt="Bank Image" class="rounded col-md-6 index__img" >
      
      <div class="btn_main col-md-6">
        <a class="btn btn-lg btn-outline-secondary m-2" href="transfer.php">Make Transaction</a>
        <a class="btn btn-lg btn-outline-secondary m-2" href="transactionhistory.php">Transaction History</a>
      </div>

    </div>
  </div>
</body>

</html>