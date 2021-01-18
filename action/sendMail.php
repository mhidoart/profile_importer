<?php
$fullName = addslashes($_POST["fullName"]);
$email = addslashes($_POST["email"]);
$message = addslashes($_POST["message"]);
$to = "mhidoart@gmail.com";
$subject = "test mail from http://transport-mustapha.com/";
$emailContent = "
<html>
<head>
<title>Bonjour</title>
</head>
<body>
<p>Un client vient de vous contacter !</p>
<table>
<tr>
<th>Nom Complet: " . $fullName . "</th>
<th>son Email: " . $email . "</th>
</tr>
<tr>

</tr>
</table>
<div>" . $message . "</div>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <transport-mustapha.com>' . "\r\n";
$headers .= 'Cc: mhidoart@gmail.com' . "\r\n";

mail($to, $subject, $emailContent, $headers);
