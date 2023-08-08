<!-- nav-productos -->

<?php  foreach( $instrumentos as $codigo => $marca ) { ?> 
    <li><a class="dropdown-item" href="/instrumentos/marca/<?= $codigo ?>"><?= $marca["nombre"] ?></a></li>
<?php } ?>

<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" href="/instrumentos/otrasmarcas">Otras Marcas</a></li>
