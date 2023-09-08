{{ title :: Home }}


    <h1> + Música </h1>
<?php
   // var_dump($Productos);
    ?>
    <div class="contenido">

    <img src="" alt="">

    <!-- FICHA DE PRODUCTO -->
    <div class="productos">
    <?php
    foreach($Productos as $sku => $producto){ ?>

<div class="card producto">
        <h2> <?=$producto["nombre"]?> </h2>
        <a
        href="#"
        class="cart cart__add"
        data-id="<?=$producto["id"]?>"
        data-name="<?=$producto["nombre"]?>"
        data-sku="<?=$sku?>"
        data-qty="1"
        data-type="normal"
        data-brandnew="true"
        >
          <img src="<?=$producto["imagen"]?>" alt="" srcset="">
          <button>Añadir al carro</button>
         </a>

      </div>
   
     
    
    <?php } 
    ?>
  
        
    </div>


    <!--  VIEW CART -->
    <a href="#" class="cart" id="cart__delAll"> Delete All </a>

    <div class="cards" id="vista"></div>

    <template id="card_template">
      <div class="card">
        <div class="card_content">
          <div class="card__toolbar">
            <button class="card__toolbar_delete">Eliminar</button>
          </div>

          <div class="card__header">
            <h2 class="name">Name</h2>
            <div class="line">
              <p>Sku: <b class="sku"> Sku </b></p>
            </div>
            <p class="id">Id</p>
          </div>
          <div class="card__body">
            <div class="line">
              <p>Qty:</p>
              <input type="number" class="qty" />
            </div>
            <div class="line">
              <p>Type: <b class="type"> Type </b></p>
            </div>
            <div class="image">
              <img src="" alt="" srcset="">


            </div>
          </div>
        </div>
      </div>
    </template>
    
  </div>