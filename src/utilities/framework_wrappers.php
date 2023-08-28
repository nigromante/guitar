<?php 

function dump() {
    return \Nigromante\Framework\Dump::getInstance() ; 
}

function include_part( $part, $data ) {
    \Nigromante\Framework\View::include_part( $part, $data);
}

function include_content($view_file, $data) {
    \Nigromante\Framework\View::include_content( $view_file, $data);
}



