<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="static/styles.css">
  <title>Document</title>
</head>
<body>
  <?php
    include 'navbar.php';
  ?>

  <div class="container">
    <h2 class="text-center pt-4 container__name">Transaction History</h2>
    <br>
    <div class="table-responsive mt-3">
      <table class="table table-hover table-sm table-striped table-condensed table-bordered">
        <thead>
          <tr>
          <th scope="col" class="text-center py-2">Sno.</th>
          <th scope="col" class="text-center py-2">Sender</th>
          <th scope="col" class="text-center py-2">Receiver</th>
          <th scope="col" class="text-center py-2">Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'config.php';
            $sql = 'SELECT * from transaction';
            $result = mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($result))
            {
          ?>
          <tr>
              <td class="py-2 ml-2"><?php echo $rows['sno'] ?></td>
              <td class="py-2 ml-2"><?php echo $rows['sender'] ?></td>
              <td class="py-2 ml-2"><?php echo $rows['receiver'] ?></td>
              <td class="py-2 ml-2"><?php echo $rows['balance'] ?></td>
          </tr>
          <?php 
          } 
          ?>
        </tbody>
      </table>
    </div>


  </div>

</body>
</html>