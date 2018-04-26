<?
$fcache = $_SERVER['DOCUMENT_ROOT'] . '/files/html-cache/' . md5($_SERVER['REQUEST_URI']) . '.html';
if ( file_exists( $fcache ) && filemtime( $fcache ) > time() - 300 ) {
        exit( file_get_contents( $fcache ) );
}


$html = 'html';
echo $html; // displaying the code on the screen


file_put_contents($fcache, $html);


?>