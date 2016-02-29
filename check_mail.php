<?php
// The message
$message = "Line 1\r\nLine 2\r\nLine 3";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
$message = wordwrap($message, 70, "\r\n");
$headers = "Message-ID: <1456760595.56d4671398752@xn--80adrpkdold.xn--90ais>" . "\r\n"
        . "Date: Mon, 29 Feb 2016 18:43:15 +0300" . "\r\n"
        . "From: soza.mihail@gmail.com" . "\r\n"
        . "MIME-Version: 1.0" . "\r\n"
        . "Content-Type: text/plain; charset=utf-8" . "\r\n"
        . "Content-Transfer-Encoding: quoted-printable" . "\r\n". "\r\n";

// Send
mail('soza.mihail@gmail.com', 'test subject', "", $headers);
?>