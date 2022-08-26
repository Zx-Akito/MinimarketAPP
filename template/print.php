<?php
    echo "
        <!DOCTYPE html>
        <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>$judul</title>
                <link href='./assets/vendor/bootstrap/css/bootstrap.css' rel='stylesheet'>
            </head>
            <body onload='print()'>
                $konten
            </body>
        </html>
    ";
?>