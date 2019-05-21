<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  href="https://bootswatch.com/cosmo/bootstrap.min.css">
    <script src="main.js"></script>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container">
  <div class="navbar-header">
  <a href="index.php" class="navbar-brand">My Website</a>
  </div>
  </div>
  </nav> 
  <div class="container">
  <form action="" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <div class="form-group">
  <label for="">Name</label>
  <input type="text" name="name" class="form-control" value="">
  </div>

  <div class="form-group">
  <label for="">Email</label>
  <input type="text" name="email" class="form-control" value="">
  </div>

  <div class="form-group">
  <label for="">Message</label>
  <textarea name="message" class="form-control"></textarea>
  </div>
  <br>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
  </div> 
</body>
</html>