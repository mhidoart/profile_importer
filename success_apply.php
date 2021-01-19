<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3" style="text-align:center;">
            <br><br>
            <img src="static/pics/logo.png" width="200">
            <h3 style="color:#0fad00">Congratulations!, you have successfully aplied ! </h3>

            <p style="font-size:20px;color:#5C5C5C;">We have sent you an email to "<?= $_REQUEST["email"] ?>" with your details
                Please go to your above email now and login.</p>
            <br><br>
        </div>

    </div>
</div>
<?php

$to = $_REQUEST["email"];
$subject = "You successfully applied by (https://expert-abid.com/)";
$emailContent = '
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-sm-offset-3" style="text-align:center;">
            <br><br>
            <img src="static/pics/logo.png" width="200">
            <h3 style="color:#0fad00">Congratulations!, you have successfully aplied ! </h3>

            <p style="font-size:20px;color:#5C5C5C;">You can follow your application if you click here: <a href="#"> https://expert-abid.com/applicants</a> </p>
            <br><br>
        </div>

    </div>
</div>
';

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <https://expert-abid.com/>' . "\r\n";
$headers .= 'Cc: mhidoart@gmail.com' . "\r\n";

mail($to, $subject, $emailContent, $headers);
