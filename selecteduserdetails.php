<?php
  include 'config.php';

  if(isset($_POST['submit']))
  {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query);

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);


    if(($amount) < 0){
      echo '<script type="text/javascript">';
      echo 'alert("oops! Negative Values Cant be Transfered")';
      echo '</script>';
    }

    else if(($amount) > ($sql1['balance'])){
      echo '<script type="text/javascript">';
      echo 'alert("Oops! You Dont have Sufficient ammount to Transfer")';
      echo '</script>';
    }

    else if(($amount) == 0){
      echo '<script type="text/javascript">';
      echo 'alert("Oops! You have null balance")';
      echo '</script>';
    }

    else {

      $newbalance = $sql1['balance'] - $amount;
      $sql = "UPDATE users set balance=$newbalance where id=$from";
      mysqli_query($conn,$sql);

      $newbalance = $sql2['balance'] + $amount;
      $sql = "UPDATE users set balance=$newbalance where id=$to";
      mysqli_query($conn,$sql);

      $sender = $sql1['name'];
      $receiver = $sql2['name'];
      $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender', '$receiver', '$amount')";
      $query = mysqli_query($conn, $sql);

      if($query) {
        echo "<script> alert('Transaction Successful');
                            window.location='transactionhistory.php';
              </script>";
      }

      $newbalance= 0;
      $amount= 0;

    }

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="PHP/static/styles.css">
  <title>Selected User</title>
</head>
<body>

  <?php 
    include 'navbar.php';
  ?>

  <div class="container">
    <h2 class="text-center pt-4 container__name mb-4">Transaction Panel</h2>
    <?php
      include 'config.php';
      $sid = $_GET['id'];
      $sql = "SELECT * from users where id=$sid";
      $result = mysqli_query($conn, $sql);

      if(!$result){
        echo "ERROR! : ".$sql."<br>".mysqli_error($conn);
      }
      $rows = mysqli_fetch_assoc($result); 
    ?>

    <form method ="POST" name="creditTable" class="creditable">
      <div class="form__table">
        <table class="table table-condensed table-striped">
          <thead>
            <tr>
              <th scope="col" class="text-center py-2">Id</th>
              <th scope="col" class="text-center py-2">Name</th>
              <th scope="col" class="text-center py-2">E-Mail</th>
              <th scope="col" class="text-center py-2">Balance</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-2"><?php echo $rows['id'] ?></td>
              <td class="py-2"><?php echo $rows['name'] ?></td>
              <td class="py-2"><?php echo $rows['email'] ?></td>
              <td class="py-2"><?php echo $rows['balance'] ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div class="form__transfer__to ">
        <label class="form__label">Transfer To :</label>
        <select name="to" class="form-control form__option" required>
          <option  value="" selected>Choose</option>
          <?php
            include 'config.php';
            $sid = $_GET['id'];
            $sql = "SELECT * from users where id!=$sid";
            $result = mysqli_query($conn,  $sql);

            if(!$result){
              echo "ERROR! : ".$sql."<br>".mysqli_error($conn);
            }

            while($rows = mysqli_fetch_assoc($result)){
          ?>
          
          <option class="form__option" value="<?php echo $rows['id']; ?>">
            
            <?php echo $rows['name']; ?>
            <?php echo $rows['balance']; ?>
          </option>
          <?php
            }
          ?>
        </select>
      </div>
      <div class="form__amount ">
        <label class="form__label">Enter Amount: </label>
        <input type="number" name="amount" class="form-control form__option" required>
      </div>
      <div class="form__btn">
        <button type="submit" name="submit" class="btn btn-primary  btn_main ml-auto">Transfer</button>
      </div>
    </form>
  </div>
</body>
</html>