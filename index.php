<?php 
//message vars
$msg = '';
$msgClass = '';
//check for submit
if(filter_has_var(INPUT_POST,'submit')){
    //get the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

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
                     $toEmail = 'henryirons@yahoo.com';
                     $subject = 'Contact request from '.$name;
                     $body='<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
                ';
                	// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			
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
  <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name'])? $name : ''; ?>">
  </div>

  <div class="form-group">
  <label for="">Email</label>
  <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email'])? $email : ''; ?>">
  </div>

  <div class="form-group">
  <label for="">Message</label>
  <textarea name="message" class="form-control"><?php echo isset($_POST['message'])? $message : ''; ?></textarea>
  </div>
  <br>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
  </div> 
</body>
</html>