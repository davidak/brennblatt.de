<?php
$name = nl2br(stripslashes(htmlspecialchars($_POST['von'])));
$IP = getenv("REMOTE_ADDR");

$absender = preg_replace( "/[^a-z0-9 !?:;,.\/_\-=+@#$&\*\(\)]/im", "", $_POST['mail'] );
$absender = preg_replace( "/(content-type:|bcc:|cc:|to:|from:)/im", "", $absender );

$nachricht = stripslashes(htmlspecialchars($_POST['nachricht']));

$mailnachricht = "Name: $name\n\nIP: $IP\n\nE-Mail: $absender\n\nNachricht:\n$nachricht";

mail("karl@brennblatt.de", "Kontaktformular", $mailnachricht, "From: $name <$absender>");

echo "<h2>Danke.</h2><p>Deine Nachricht wurde versendet.</p>";
?>