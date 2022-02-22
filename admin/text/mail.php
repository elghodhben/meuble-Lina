<?php
require('mail.class.php');

$mail = new phpmail;

$mail->SetFrom("\"no-Reply\"<no-reply@vinsamour.be>");
$mail->SetReplyTo("\"Jp\"<jp@vinsamour.be>");

$mail->SetTo($_POST['mail']);

$mail->AddCc("\"Jp\"<jp@vinsamour.be>");
$mail->AddBcc("\"Webadmin\"<webadmin@vinsamour.be>");

$mail->SetSubject("Votre facture nÂ°".$_POST['shuffled']." chez A.B.Vins'Amour");

$text = "Bonjours,<br /><br />
<p>
Ceci est un mail automatique d'envoi de facture, merci de ne pas y r&eacute;pondre.</p><p>

Votre facture se trouve en pi&egrave;ce jointe au format pdf.<br />
Si vous avez des difficult&eacute;s &agrave; l'ouvrir, t&eacute;l&eacute;charger le logiciel<br />
Acrobat Reader disponible <a href=\"http://www.adobe.fr/products/acrobat/readstep2.html\" target=\"_blank\"><u>ici</u></a></p>
<p>
Merci &agrave; vous<br />
A.B.Vins'Amour<br />
<hr>
Visitez notre site web: <a href=\"http://vinsamour.be\"><u>ici</u></a><br />
Jouez et gagnez peut-&ecirc;tre un plateau de fromage pour 5 personnes!";

$mail->SetHtmlText($text);
$mail->AddAttachment('pdf/'.$_POST['file']);
$mail->AddAttachment('pdf/condition-generale-vente.pdf');

$mail->SendMail();

?>

