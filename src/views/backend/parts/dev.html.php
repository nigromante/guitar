<?php
function includedFiles() {
    $files = []; 
    $allFiles = get_included_files();
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

    return $files ; 
}

    dump_group( 'Files', 'Files' ) ; 
    dumpsection( includedFiles() , 'Included' ) ;


    $dump_data = getDump() ; 

    echo "<pre>" ; 
    print_r( $dump_data ) ; 
    echo "</pre>" ; 
