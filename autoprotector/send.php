<?php

require_once 'PHPMailer-master/PHPMailerAutoload.php';


$mail = new PHPMailer();

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);



$admin = "phpmailtest08@gmail";
$mail->isSMTP();                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';     // Specify main and backup server
$mail->SMTPAuth = true;                // Enable SMTP authentication
$mail->Username = 'phpmailtest08@gmail.com'; // SMTP username
$mail->Password = 'aqbxbgopvstveepd';            // SMTP password
$mail->SMTPSecure = 'ssl';             // Enable encryption, 'ssl' also accepted
$mail->IsHTML(true); 
$mail->Port = 465;                    // Set email format to HTML
$mail->From = 'phpmailtest08@gmail.com';
$mail->FromName = 'Auto Protector';
$mail->AddAddress('mshaileysh@gmail.com', 'Shailesh');  // Add a recipient    */



header('Content-Type: application/json');


$name = $_POST['name']; // required
$lastname = $_POST['surname']; // required
$email = $_POST['email']; // required
$phone = $_POST['phone']; // required
$message = $_POST['message']; // required





$formcontent = '<!DOCTYPE html>
<html lang="en" style="color: gray;">
<head>
<meta charset="UTF-8">
<title>Client Details</title>
  
</head>
<body style="color: black;font-family:roboto" >
  <table align="center" cellpadding="0" cellspacing="0"   width="600" border-collapse="collapse">
      <tr>
        <td>
          <table  cellpadding="0" cellspacing="0"  bgcolor="4368b0" width="100%" height="40">
            <tr>
              <td style="color:#ffffff;" align="center">
                <a href="tel:+91 " style="color:#ffffff;text-decoration:none;"><i class="fa fa-phone"></i> </a>                
              </td>
              <td align="center">
                <a href="" style="color:#ffffff;text-decoration:none;"><i class="fa fa-envelope"></i></a>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      

      <tr>
        <td >
          <table  align="center" color="#3333333"  cellpadding="0" cellspacing="0"  bgcolor="#f2f2f2" width="100%" >
            <tr>
              <td>
                <table align="center"  cellpadding="0" cellspacing="0"  width="360" style="padding-top:50px;padding-bottom:50px;"> 
                  <tr>
                    <td align="right" style="padding:10px 0px" >First Name</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">'.$name.'</td>              
                  </tr>

                  <tr>
                    <td align="right" style="padding:10px 0px">Last Name</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">'.$lastname.'</td>
                  </tr> 
                 
                  <tr>
                    <td align="right" style="padding:10px 0px">Email </td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">'.$email.'</td>
                  </tr> 
                  <tr>
                    <td align="right" style="padding:10px 0px">Mobile</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">'.$phone.'</td>
                  </tr> 
                  <tr>
                    <td align="right" style="padding:10px 0px">phone</td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td align="">'.$message.'</td>
                  </tr>                  
                       
                </table>
              </td>
            </tr>                
          </table>
        </td>
      </tr>
      
      <tr>
        <td>
          <table  cellpadding="0" cellspacing="0"  bgcolor="#ffffff" width="100%">
            <tr>
              <td>
                
              </td>
            </tr>
          </table>
        </td>
      </tr>
      
   
    </table>    
    
  </div>
</body>
</html>
';
$subjectEmail = 'Contact Details Auto Protector';
$altbody = 'This is the body in plain text for non-HTML mail clients';

$mail->Subject = $subjectEmail;
$mail->Body    = $formcontent;
$mail->AltBody = $altbody;


// configure
/*$from = 'msetah@gmail.com'; 
$sendTo = 'msetah@gmail.com';*/
//$fields = array('name' => 'Name', 'surname' => 'Surname', 'phone' => 'Phone', 'email' => 'Email', 'message' => 'Message'); // array variable name => Text to appear in email
$okMessage = 'Thank you, I will get back to you soon!';
$errorMessage = 'There was an error while submitting the form. Please try again later';


if(!$mail->send()) {
        $responseArray = array('type' => 'danger', 'message' => $errorMessage);
    } else {
        $responseArray = array('type' => 'success', 'message' => $okMessage);
        }
    

/*print_r($responseArray);
exit();*/
   
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
    } else {
    echo $responseArray['message'];
    }





/*if(!$mail->Send()) {
       echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
   
} 
else {
  header('Location:thankyou.html');
  }*/