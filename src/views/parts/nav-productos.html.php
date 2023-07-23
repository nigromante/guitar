<!-- nav-productos -->

<?php  foreach( $instrumentos as $codigo => $marca ) { ?> 
    <li><a class="dropdown-item" href="/instrumentos/marca/<?= $codigo ?>"><?= $marca["nombre"] ?></a></li>
<?php } ?>

<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" href="/instrumentos/marca/otras-marcas">Otras Marcas</a></li>
