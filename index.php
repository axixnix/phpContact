<?php 
//message vars
$msg = '';
$msgClass = '';
//check for submit
if(filter_has_var(INPUT_POST,'submit')){
    //get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //check required fields
    if(!empty($name) && !empty($email) && !empty($message)){
                 //passed
                 //check email
                 if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
                     //failed
                     $msg = 'Please fill in a valid email address';
              $msgClass = 'alert-danger';
                 }else{
                     //passed
                     echo 'passed';
                 }
    }else{
              //failed
              $msg = 'Please fill in all fields';
              $msgClass = 'alert-danger';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--
       <link rel="stylesheet" type="text/css" href="./bootstrap.css"> href="https://bootswatch.com/cosmo/bootstrap.min.css"
   -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css">
    <script src="main.js"></script>
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container">
  <div class="navbar-header">
  <a class="navbar-brand" href="index.php" >My Website</a>
  </div>
  </div>
  </nav> 
  <div class="container">
  <?php if($msg !=''): ?>
  <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?> </div>
<?php endif; ?>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
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