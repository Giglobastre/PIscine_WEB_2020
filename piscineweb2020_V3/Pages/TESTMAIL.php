<?php

$header="Mime-Version: 1.0\r\n";
$header.='From: "ECEbay F.A.Q."<support@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfert-Encoding: 8bit';

$message='
<html>
    <body>
        <div align="center">
            J ai envoyé ce mail avec php
        </div>
    </body>
</html>
';

mail("vieville.clement0@gmail.com", "salut test", $message, $header);

?>