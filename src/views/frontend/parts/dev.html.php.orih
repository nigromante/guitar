<?php if( true ) { 
    
function dumpData( $data , $key = '' ) {
    if(is_array( $data ) ) {
        echo "<h7>{$key}</h7>";
        echo "<ul>" ;
            foreach( $data as $key => $item ) {
                dumpData( $item, $key ) ; 
            }
        echo "</ul>" ;
    } else {
        if( !empty($data)) {
            echo "<li>{$key} :: {$data}</li>" ;
        }
    }
}

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

?>

<style>
    .dev_toolbar {
        display: flex;
        flex-flow:row;
        justify-content: space-evenly;
        height: 30px ;
    }
    .dev_toolbar ul {
        list-style: none; 
    }



    .dev_col {
        display: flex;
        flex-flow: column;
        position: relative;
    }

    .dev_toolbar h4   {
        display: inline;
        font-size: 14px;
        line-height: 30px;
        margin: 0;
        padding: 0 8px;
    }

    .dev_col .dev_col_info{
        display: none;
        background-color: peachpuff;
        padding:20px 10px;
        position:absolute;
        bottom:14px;
        min-width: 700px;
        left:-100px ; 
    }
    .dev_col.active .dev_col_info{ 
        display: inline-block;
    }
    .dev_col.active h4{ 
        font-size: 18px;
        background-color: peachpuff;
    }


    .dev_col.dev_col_last .dev_col_info {
        left:-690px ;
    }

</style>

<div class="dev_toolbar">

    <div class="dev_col">
        <h4 class="dev_col_key">REQUEST</h4>
        <ul class='dev_col_info'>
            <li>  REQUEST_URI :: <?= $request_uri ?> </li>
            <li>  REQUEST_METHOD :: <?= $request_method ?> </li>
            <li>  ROUTES :: <pre> <?php dumpData($routes) ; ?> </pre> </li>


        </ul>
    </div>

    <?php if( count($get) > 0 ) { ?>
    <div class="dev_col">
        <h4 class="dev_col_key">GET</h4>
        <ul class='dev_col_info'>
            <?php foreach( $get as $key => $value ) { ?>
                <li>  <?=$key?> :: <?=$value?> </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>

    <?php if( count($post) > 0 ) { ?>
    <div class="dev_col">
        <h4 class="dev_col_key">POST</h4>
        <ul class='dev_col_info'>
            <?php foreach( $post as $key => $value ) { ?>
                <li>  <?=$key?> :: <?=$value?> </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>

    <div class="dev_col">
        <h4 class="dev_col_key">CONTROLLER</h4>
        <ul class='dev_col_info'>
            <li> class :: <?= $clase ?> </li>
            <li> metodo :: <?= $metodo ?> </li>
            <li> params :: <? dumpData($params); ?> </li>
        </ul>
    </div>

    <div class="dev_col">
        <h4 class="dev_col_key">VIEWS</h4>
        <ul class='dev_col_info'>
                <li>  Layout :: <?= $layout ?> </li>
                <li>  View :: <?= $view_file ?> </li>
                <li>  Data :: <pre> <?php dumpData($data) ; ?> </pre> </li>

        </ul>
    </div>

    <?php $dumps = getDump();
    if( count($dumps) > 0 ) { ?>
    <div class="dev_col">
        <h4 class="dev_col_key">DUMP</h4>
        <ul class='dev_col_info'>
            <?php 
              
            foreach( $dumps as $dump ) { ?>
                <h5> <?= $dump[1] ?> </h5>
                <pre>
                    <?php print_r( $dump[0] ); ?>
                </pre>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>


    <div class="dev_col dev_col_last">
        <h4 class="dev_col_key">FILES</h4>
        <ul class='dev_col_info'>
            <?php 
            $files = includedFiles();  
            foreach( $files as $key => $value ) { ?>
                <li>  <?=$value?> </li>
            <?php } ?>
        </ul>
    </div>
    


    <script>
     
     document.querySelectorAll(".dev_col_key")
        .forEach( el => el.addEventListener("click", (e) => { 
            tgt=e.target.parentElement;

            document.querySelectorAll(".dev_col").forEach( elp => elp.classList.remove("active")) ;
            tgt.classList.add("active"); 
        } )  ) ;
 </script>
         
</div>
<?php } ?>
