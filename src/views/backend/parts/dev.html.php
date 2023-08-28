<?php
function includedFiles() {
    $files = [];
    $allFiles = get_included_files();
    foreach( $allFiles as $key => $value ) {
        $files[] = str_replace( "/var/www/" , "",  $value );
    }
    return $files ; 
}

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
            if( !empty( $key) )
                echo "<li>{$key} :: {$data}</li>" ;
            else
                echo "<li>{$data}</li>" ;

        }
    }
}

    dump()->dump_group( 'Files', 'Files' ) ; 
    dump()->dumpsection( includedFiles() , 'Included' ) ;


    $dump_data = dump()->getDump() ; 

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

    .modal-content {
        min-width:1000px;
    }

</style>



    <div class="dev_toolbar">

        <?php foreach( $dump_data as $seccion ) { ?>
            <div class="dev_col">
                <button type="button" class="btn btn-gray" data-toggle="modal" data-target="#<?= $seccion["description"]  ?>">
                <?= $seccion["description"]  ?>
                </button>

                <div class="modal fade" id="<?= $seccion["description"]  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><?= $seccion["description"]  ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <?php foreach( $seccion["data"] as $data) { ?>
                                <li> <?php dumpData( $data) ; ?> </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>

            </div>

        <?php } ?>

    </div>

<script>
     
     document.querySelectorAll(".dev_col_key")
        .forEach( el => el.addEventListener("click", (e) => { 
            tgt=e.target.parentElement;

            document.querySelectorAll(".dev_col").forEach( elp => elp.classList.remove("active")) ;
            tgt.classList.add("active"); 
        } )  ) ;
 </script>    