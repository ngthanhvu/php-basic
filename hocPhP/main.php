<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>learn PhP</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<style>

</style>

<body>


     <div class="container">
          <form action="./main.php" method="POST">
               <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                         if (empty($_POST["email"])) {
                              echo "<span style='color:red;'>Error: Họ tên cần phải điền</span><br>";
                         }
                    } ?>
               </div>
               <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                         if (empty($_POST["password"])) {
                              echo "<span style='color:red;'>Error: Mật khẩu cần phải điền</span><br>";
                         }
                    } ?>
               </div>
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>

          email: <?php
                    if (isset($_POST['email'])) {
                         echo $_POST['email'];
                    }
                    ?><br>
          pass: <?php
                    if (isset($_POST['password'])) {
                         echo $_POST['password'];
                    }
                    ?><br>

          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               if (empty($_POST["email"])) {
                    echo "<span style='color:red;'>Error: Họ tên cần phải điền</span><br>";
               }
               if (empty($_POST["password"])) {
                    echo "<span style='color:red;'>Error: Mật khẩu cần phải điền</span>";
               }
          }



          ?>

     </div>








</body>

</html>