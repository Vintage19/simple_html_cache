<?php

if ($_GET['clear'] == 'old') {
    $cache_time = 3600; // lifetime of cache files + 60 seconds.
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/files/html-cache/';
//==========================Clear old cache files============//
    $del = 0;
    $fdir = opendir( $dir );
    while( ( $file = readdir( $fdir ) ) !== false )
    {
        $filetype = explode( '.', $file );
        $type = array_pop( $filetype );
        $fcache = $dir . $file;
        $time = filemtime( $fcache ) + $cache_time;
        if ( $type == 'html' AND file_exists( $fcache ) AND $time < time() )
        {
            $del++;
            unlink( $fcache );



        }
    }
    closedir( $fdir );
    echo $del . " files deleted \n\r";
//========================================================================//
}

if ($_GET['clear'] == 'all') {
    $dir = $_SERVER['DOCUMENT_ROOT'] . '/files/html-cache/';
//==========================Clear all cache files============//
    $del = 0;
    $fdir = opendir( $dir );
    while( ( $file = readdir( $fdir ) ) !== false )
    {
        $filetype = explode( '.', $file );
        $type = array_pop( $filetype );
        $fcache = $dir . $file;
        if ( $type == 'html')
        {
            $del++;
            unlink( $fcache );
        }
    }
    closedir( $fdir );
    echo $del . " files deleted \n\r";
//========================================================================//
}
?>