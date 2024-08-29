<?php
//Mailautomatisation	
			//Bibliothek referenzierren
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\SMTP;
			use PHPMailer\PHPMailer\Exception;

			//Einbinden der PHP Mailer Klasse
			require 'assets/php/PHPMailer.php';
			require 'assets/php/SMTP.php';
			require 'assets/php/Exception.php';

			date_default_timezone_set('Europe/Zurich');

?>

<!doctype html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="robots" content="no index, no follow">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tobias Ragosa - Kontakt</title>
<link rel="stylesheet" type="text/css" href="css/cv_style_1.css">
	

</head>

<body>
	
	<div id="form_container">

<?php

if($_POST){
	if($_POST['spamschutz'] == 26 && $_POST['contact'] == ""){

					$recipient_user = $_POST['email'];
					$recipient_name = $_POST['name'];
					$category = $_POST['category'];
					$message = $_POST['message'];

					//Neues PHP Mail Objekt erstellen => Kundenemail
					$mail = new PHPMailer();

					//Als SMTP setzen
					$mail->isSMTP();

					//SMTP-Einstellungen
					$mail->SMTPDebug = SMTP::DEBUG_OFF;
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
					$mail->Host = 'galvani.metanet.ch';
					$mail->Port = 465;
					$mail->SMTPAuth = true;
					$mail->Username = 'no-reply@donragosh.ch';
					$mail->Password = '%5=@kU@^$aorJ+eg5ap#';

					//Charset utf8 setzen für Mailcontent
					$mail->Encoding = 'base64';
					$mail->CharSet = 'UTF-8';

					//Wer sendet dieses Email?
					$mail->setFrom('no-reply@donragosh.ch','Nils Krapl');
					$mail->addReplyTo('nils.krapl@gmail.com', 'Nils Krapl');

					//Empfänger definieren
					$mail->addAddress($recipient_user,$recipient_name);

					//Betreffzeile definieren
					$mail->Subject = 'Bestätigung Anfrage';

					//HTML erlauben
					$mail->isHTML(TRUE);

					//Inhalt (Body) definieren
					$mail->Body = 'Hoi '.$recipient_name.'<br><br>Vielen Dank für Deine Anfrage! Ich werde Dein Anliegen schnellstmöglich bearbeiten und mich anschliessend wieder bei Dir melden.<br>

					<br>Freundliche Grüsse<br><br>Nils';

					//Jetzt Mail versenden
					if(!$mail->send()){
						echo "<div>Da ist etwas schief gelaufen... Versuch's bitte noch einmal.</div><div><a href='https://lebenslauf-9sw1.onrender.com/kontakt.php'>Zurück zum Formular</a></div>";
	 exit;
					} else{

						echo "<div><p>Hoi  ".$recipient_name." <br><br>Vielen Dank für Deine Anfrage! Gerne komme ich schnellstmöglich diesbezüglich auf Dich zu. Zudem hast Du eine Bestätigung per Email erhalten (bitte auch Spam kontrollieren).<br><br>Bis bald!<br><br>Liebe Grüsse<br><br>Nils</p></div><div><a href='https://lebenslauf-9sw1.onrender.com/'>Zurück zum CV</a></div>";

					}

					//Neues PHP Mail Objekt erstellen => Adminemail
					$mail = new PHPMailer();

					//Als SMTP setzen
					$mail->isSMTP();

					//SMTP-Einstellungen
					$mail->SMTPDebug = SMTP::DEBUG_OFF;
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
					$mail->Host = 'galvani.metanet.ch';
					$mail->Port = 465;
					$mail->SMTPAuth = true;
					$mail->Username = 'no-reply@donragosh.ch';
					$mail->Password = '%5=@kU@^$aorJ+eg5ap#';

					//Charset utf8 setzen für Mailcontent
					$mail->Encoding = 'base64';
					$mail->CharSet = 'UTF-8';

					//Wer sendet dieses Email?
					$mail->setFrom('no-reply@donragosh.ch','Kontaktformular CV');
					$mail->addReplyTo($recipient_user, $recipient_name);

					//Empfänger definieren
					$mail->addAddress('nils.krapl@gmail.com', 'Nils Krapl');

					//Betreffzeile definieren
					$mail->Subject = 'Anfrage via Kontaktformular';

					//HTML erlauben
					$mail->isHTML(TRUE);

					//Inhalt (Body) definieren
					$mail->Body = 'Hoi Brudi<br><br>Es ist eine neue Anfrage via Formular auf https://lebenslauf-9sw1.onrender.com/ eingegangen:<br><br>
					<b>Name</b>: '.$recipient_name.'<br>
					<b>Email</b>: '.$recipient_user.'<br>
					<b>Betreff</b>: '.$category.'<br>
					<b>Nachricht</b>: '.$message.'<br><br>
					<br>Freundliche Grüsse<br><br>cv.donragosh.ch';

					//Jetzt Mail versenden
					if(!$mail->send()){

					} else{

					}

		} else {

			echo "<div>Da hast Du Dich verrechnet... Versuch's bitte noch einmal.</div><div><a href='https://lebenslauf-9sw1.onrender.com/kontakt.php'>Zurück zum Formular</a></div>";
	 exit;

		}
}

	
?>

			
				<form action="" method="POST">
					<input class="form" type="text" name="name" required placeholder="Dein Vorname & Name"><br>
					<input class="form" type="text" name="email" required placeholder="Deine E-Mail-Adresse"><br>
					<select class="form" name="category" required>
						<option value="" selected disabled hidden>Um was geht es?</option>
						<option value="Referenzen anfragen">Referenzen anfragen</option>	
						<option value="Jobangebot">Jobangebot</option>	
						<option value="Sonstiges">Sonstiges</option>	
					</select>	
					<br>
					<textarea class="form" name="message" rows="6" cols="25" placeholder="Deine Nachricht an mich."></textarea><br>
					<input class="form" type="hidden" name="contact">
					<input class="form" type="text" name="spamschutz" required placeholder="Was gibt 40 geteilt durch 2 plus 6?"><br><br>
					<input  class="form_button" type="submit" value="Senden">
				</form>
			</div>	
	
</body>
</html>
