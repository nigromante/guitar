<?php
function includedFiles() {
    $files = []; 
    $allFiles = get_included_files();
    print_r($allFiles);
    $start = false ;  
    foreach( $allFiles as $key => $value ) {
        $fn = basename( $value ) ;
        if( $fn == 'dev.html.php' ) $start = false ; 
        if( $start ) {
            if( strstr( $value, "framework") === false ) {
                $files[] = str_replace( "/var/www/" , "",  $value );
            }
        } 

        if( $fn == 'bootstrap.php' ) $start = true ; 
    }
    print_r($files);

    return $files ; 
}

    $files = get_included_files() ; 

    dump_group( 'Files', 'Files' ) ; 
    dumpsection( $files , 'Included' ) ;


    $dump_data = getDump() ; 

    echo "<pre>" ; 
    print_r( $dump_data ) ; 
    echo "</pre>" ; 
