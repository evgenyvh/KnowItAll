<?php
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mailTo = "519542@edu.rocmn.nl";
//    $headers = "From: ".$mailFrom;
    //$mailFrom->SetFrom($mailFrom);
    $headers  = "Reply-To: " . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $txt = " nieuw bericht ontvangen van ".$name." "."<br><br>".$message."\n\n"."<br><br>". "<b>Gegevens van inzender :</b>"."<br><br>"."<b>Naam :</b>"." " .$name." "."<br>"."<b>Telefoon :</b>"." ".$phone."<br>";


    mail($mailTo, $message, $txt, $headers);
    header("Location: contact.html?mailsend");
}
?>
