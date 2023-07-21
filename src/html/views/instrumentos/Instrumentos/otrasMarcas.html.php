{{ title :: Marca / Otras marcas }}

    <h1> INSTRUMENTOS OTRAS MARCAS </h1>

    <?php foreach( $instrumentosOtrasMarcas as $alias => $instrumento ) { ?>
        <h2> <?=$instrumento['nombre']?></h2>
        <h3> <?=$instrumento['descripcion']?></h3>
        <br>
    <?php } ?>
