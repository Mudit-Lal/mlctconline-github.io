<?php
$statusMsg='';
$recaptcha_secret_key = '6Ld4XfsUAAAAAPXQhKS1sP1-RmYZgd1SzKaXvdyK';
if(!empty($recaptcha_secret_key) && isset($_POST['g-recaptcha-response'])) {

    $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_secret_key.'&response='.$_POST['g-recaptcha-response']);
    $response_data = json_decode($response);

    if ($response_data->success !== true ) {
        echo '<script>alert("reCaptcha Invalid, please try again.");</script>';
        $link_to_B = 'mailsend.php?redirect=' . urlencode($_SERVER['REQUEST_URI']);
        return false;
    }
}
if(isset($_FILES["file"]["name"])){
   $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
$fromemail =  $email;
$subject="Uploaded file attachment";


$email_message = '<h2>GST Registration Files recieved from</h2>
                    <p><b>Name:</b> '.$name.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Subject:</b> '.$subject.'</p>
                    <p><b>Message:</b><br/>'.$message.'</p>';


$email_message.="Please find the attachment";
$semi_rand = md5(uniqid(time()));
$headers = "From: ".$fromemail;
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

    $headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
}
if($_FILES["file"]["name"]!= ""){
 $strFilesName = $_FILES["file"]["name"];
 $strContent = chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));


    $email_message .= "This is a multi-part message in MIME format.\n\n" .
    "--{$mime_boundary}\n" .
    "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .
    $email_message .= "\n\n";


    $email_message .= "--{$mime_boundary}\n" .
    "Content-Type: application/octet-stream;\n" .
    " name=\"{$strFilesName}\"\n" .
    //"Content-Disposition: attachment;\n" .
    //" filename=\"{$fileatt_name}\"\n" .
    "Content-Transfer-Encoding: base64\n\n" .
    $strContent  .= "\n\n" .
    "--{$mime_boundary}--\n";
}
$toemail="muditlal02@gmail.com";

if(mail($toemail, $subject, $email_message, $headers))
{
   echo '<script>alert("Email send successfully with attachment");</script>';

}else{
   echo '<script>alert("Not sent");</script>';
}
?>

<!DOCTYPE html>
<html lang="en" >
<head><meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Mudit Lal" />
<meta name="description" content="Same MLCTC but, online and smarter">
<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Document title -->
<title>Thank you for sending your files to MLCTC Online</title>
<!-- Stylesheets & Fonts -->
<link href="css/plugins.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="./style.css">
</head>
<body style="background: radial-gradient(circle at left top, #136967 9%, #033d63 48%, #00131e 91%);" onload="return redirect();">
<!-- partial:index.partial.html -->
<canvas height='1' id='confetti' width='1'></canvas>
<!-- partial --><script src="./script.js"></script>
<div class="body-inner">
    <!-- Section --> <br><br><br><br>
        <div class="container" >
            <div>
                <div class="text-center m-b-30">
                    <a href="index.html" class="logo">
                        <img src="images/mlctc-white.png" alt="MLCTC Online Logo" style="max-width: 20%">
                    </a>
                </div>
                <div class="row">
                      <div class="call-to-action background-white center rounded-lg" style="margin: auto;" id="registerspace">
                            <div class="container-fullscreen">
                              <div class="col-md-8 offset-md-2">
                                <div class="heading-text">
                                  <div class="text-center"> <!--style="margin-top:15vh;"-->
                                    <div class="heading-text heading-gradient" >
                                    <h1 style="font-size: 3.2rem;">Thank you for sending the requested files!</h1><p style="margin-top: -2.5vh;">Your files for GST Registration have been put for review. We will get back to you soon..</p>
                                    <center><button id="home" class="btn btn-rounded btn-dark" style="background: radial-gradient(circle at left top, #136967 9%, #033d63 48%, #00131e 91%);">GO BACK TO MAIN SITE</button></center>
                                  </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </p>
                    </div>
            </div>
         </div>
    <!-- end: Section -->
</div>
<!-- end: Body Inner -->
<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/functions.js"></script>
<script>document.getElementById("home").onclick = function () {
    location.href = "index.html";
};</script>
<script>
         setTimeout(function redirect(){
            window.location.href = 'http://online.mlctc.biz';
         }, 30000);
</script>
</body>
</html>
