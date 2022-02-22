<?
class phpmail {
   /*** Classe phpmail ***/

   var $sender;
   var $receiver;
   var $subject;
   var $body;

   function phpmail() {
      // Constructeur de l'objet, on dÃ©finit les champs par dÃ©faut
      $sender = "Admin <admin@c-p-f.org>"; // ExpÃ©diteur
      $receiver = "Admin <test@c-p-f.org>"; // Destinataire
      $subject = "(No subject)"; // Sujet
      $body = "Empty mail"; // Corps du texte
      // Constructeur de la classe
      $this->SetFrom($sender);
      $this->SetReplyTo($sender);
      $this->SetTo($receiver);
      $this->SetSubject($subject);
      $this->SetPlainText($body);
      $this->error = ""; // Initialisation des erreurs
   }

   function SetFrom($sender) {
      // Modification de l'expÃ©diteur
      $this->from = "From: $sender\r\n";
   }

   function SetReplyTo($replyto) {
      // Modification de l'adresse de rÃ©ponse
      $this->replyto = "Reply-To: $replyto\r\n";
   }

   function SetTo($receiver) {
      // Modification du destinataire
      $this->to = $receiver;
   }

   function AddCc($carbon) {
      // Ajout de Cc (Copie Carbon)
      if (!isset($this->cc) || ($this->cc == "")) {
         // Le premier Cc, il faut dÃ©finir le champ
         $this->cc = "Cc: $carbon";
      } else {
         $this->cc .= ", $carbon";
      }
   }

   function AddBcc($bcarbon) {
      // Ajout de Bcc (Blind Copie Carbon)
      if (!isset($this->bcc) || ($this->bcc == "")) {
         // Le premier Bcc, il faut dÃ©finir le champ
         $this->bcc = "Bcc: $bcarbon";
      } else {
         $this->bcc .= ", $bcarbon";
      }
   }

   function SetSubject($subject) {
      // Modifier le sujet est une bonne idÃ©e
      $this->subject = $subject;
   }

   function SetPlainText($body) {
      // Bien sur, on peut envoyer un texte normal
      $this->text = "Content-Type: text/plain; charset=\"iso-8859-15\"\n";
      $this->text .= "Content-Transfer-Encoding: 8bit\n\n";
      //$this->text = htmlentities($body)."\n\n";
   }

   function SetHtmlText($body) {
      // Mais aussi un texte HTML
      $this->html = "Content-Type: text/html; charset=\"iso-8859-15\"\n";
      $this->html .= "Content-Transfer-Encoding: 8bit\n\n";
      $this->html .= $body."\n\n";
   }

   function AddAttachment($filename) {
      // Le plus important, l'ajout des piÃ¨ces jointes
      if (file_exists($filename)) {
         $this->attfile[] = $filename;
         $this->fillles[] = str_replace("#pdf/(.+).pdf#",'$1',$filename);
      } else {
         $this->error .= "$filename est introuvable\n";
      }
   }

   function SendMail() {
      // La fonction d'envoi
      $body = "";
      // CrÃ©ation des entÃªtes: emetteur et destinataires
      $headers = $this->from;
      $headers .= $this->replyto;
      $headers .= $this->cc."\r\n";
      $headers .= $this->bcc."\r\n";

      if (isset($this->html) || isset($this->attfile)) {
         // Nous avons du HTML ou des piÃ¨ces jointes, il faut les entÃªtes adÃ©quats
         $boundary = md5(uniqid(rand()));
         $headers .= "MIME-Version: 1.0\nContent-Type: multipart/mixed; boundary=$boundary;\n\n";
         if (isset($this->html)) {
            // HTML: on ajoute la partie HTML
            $body .= "--$boundary\n".$this->html;
         }
         if (isset($this->attfile)) {
            foreach ($this->attfile as $file) {
               $this->att_type = 'application/pdf';
               $name = substr($file, 4, -4);
               $body .= "--$boundary\n";
               $body .= "Content-Type: $this->att_type; name=\"$name\"\n";
               $body .= "Content-Transfer-Encoding: base64\n\n";
               $Inf = fopen($file, "r");
               $data = fread($Inf, filesize($file));
               fclose($Inf);
               $body .= chunk_split(base64_encode($data))."\n\n";
            }
         }
         $body .= "--$boundary--";
      } else {
         $body = $this->text;
      }
      if ($this->error == "") {
         if (!mail($this->to, $this->subject, $body, $headers))
         	 	echo "Erreur";
         else
         		echo "Envoye";
      }
   }

}
?>
