<?php 
 include ('db.php');
 
//  echo "<pre>"; print_r($_POST); echo "</pre>";
//  exit;
 
$name= mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$subject = mysqli_real_escape_string($connection, $_POST['subject']);
$message = mysqli_real_escape_string($connection, $_POST['message']);


$sql= "INSERT INTO `contact` (`name`, `email`, `subject`, `message`)
 VALUES ('$name', '$email', '$subject', '$message')";

$run = mysqli_query($connection, $sql);


  if ($run == true) {
      
$to = "zarq.khan10051@gmail.com";
$subject = "Contact Details";

$message = "
<html>
<head>
<title>Contact Details</title>
</head>
<body>
<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Subject</th>
<th>Message</th>
</tr>
<tr>
<td>".$name."</td>
<td>".$email."</td>
<td>".$subject."</td>
<td>".$message."</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
// $headers .= 'From: <info@ptcp.pk>' . "\r\n";
mail($to,$subject,$message,$headers);
                            ?>
                           
                                    <script type="text/javascript">
                                      alert ('I will Contact You as soon as possible. ');
                                    </script>
                                    <meta http-equiv="Refresh" content="0; URL=index.php">
                            <?php
                            }










?>