<?php
header( 'Content-Type: image/jpg' );

$mysqli = new mysqli("localhost", "root", "", "bratton");
$mysqli->query("insert into tracking (mail_id, count) values (1,1)");


$graphic_http = 'http://test.loc/01.jpg';

$filesize = filesize( '01.jpg' );

header( 'Pragma: public' );
header( 'Expires: 0' );
header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
header( 'Cache-Control: private',false );
header( 'Content-Disposition: attachment; filename="01.jpg"' );
header( 'Content-Transfer-Encoding: binary' );
header( 'Content-Length: '.$filesize );
readfile( $graphic_http );

exit;