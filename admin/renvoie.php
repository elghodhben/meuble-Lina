<?php
require('mail.class.php');
include('connect.php');
$mail = new phpmail;

$mail->SetFrom("\"no-Reply\"<no-reply@$varnom>");
$mail->SetReplyTo("\"$varnom\"<$varmail>");

$mail->SetTo($_POST['email']);

$mail->AddCc("\"$varnom\"<$varmail>");

$mail->SetSubject("Votre facture nÂ°".$_POST['numero']." chez A.B.Vins'Amour");

$text = "Bonjours,<br /><br />
<p>
Ceci est un mail automatique d'envoi de facture, merci de ne pas y r&eacute;pondre.</p><p>

Votre facture se trouve en pi&egrave;ce jointe au format pdf.<br />
Si vous avez des difficult&eacute;s &agrave; l'ouvrir, t&eacute;l&eacute;charger le logiciel<br />
Acrobat Reader disponible <a href=\"http://www.adobe.fr/products/acrobat/readstep2.html\" target=\"_blank\"><u>ici</u></a></p>
<p>
Merci &agrave; vous<br />
$varnom<br />";

$mail->SetHtmlText($text);
$mail->AddAttachment('pdf/'.$_POST['numero'].'.pdf');
$mail->AddAttachment('pdf/condition-generale-vente.pdf');

$mail->SendMail();

?>

