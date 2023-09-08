(function(window, document){
    'use strict'

    var inicio = function() {

        var 
            data = null ,
            vista = '' , 
            vistaResumen = '' , 
            template = '', 
        
            libreria = {

                init : function( vista, template ) {
                    this.vista = vista ; 
                    this.template = template ;
                } , 

                dump : function() {
                    console.log( this.data );
                },

                read : function() {
                    this.data = JSON.parse( localStorage.getItem( 'app_cart' ) ) ;
                    if( this.data === null ) {
                        this.data = { 'items' : [] } ;
                    }

                } , 

                write : function() {
                    localStorage.setItem( 'app_cart', JSON.stringify( this.data )  ) ;
                    this.render(); 

                } , 

                render: function( ) {
                    var vista = document.getElementById( this.vista ),
                        template = document.getElementById( this.template ),
                        fragmento = document.createDocumentFragment(),
                        clon,
                        id , name, sku, qty, type ,image,
                        card_delete ;

                    //  if()     //  Validar vista & template 

                    vista.innerHTML = '' ; 

                    this.data.items.forEach( item => {
                        clon = template.content.cloneNode( true );

                        id      = clon.querySelector(".id") ; 
                        name    = clon.querySelector(".name") ; 
                        sku     = clon.querySelector(".sku") ; 
                        qty     = clon.querySelector(".qty") ; 
                        type    = clon.querySelector(".type") ; 
                        image    = clon.querySelector(".image img") ;
                        
        
                        card_delete = clon.querySelector(".card__toolbar_delete") ; 
                        card_delete.dataset.id = item.id ;
                        card_delete.addEventListener( 'click', function(e) { 
                            e.preventDefault();
                            app_cart.removeItem( e.target.dataset.id );
                        }, false ) ;
    
                        qty.dataset.id = item.id ;
                        qty.addEventListener( 'change', function(e) { 
                            e.preventDefault();
                            app_cart.updateQty( e.target.dataset.id , e.target.value );
                        }, false ) ;



                        id.innerHTML = item.id ;
                        name.innerHTML = item.name ;
                        sku.innerHTML = item.sku ;
                        qty.value = item.qty ;
                        type.innerHTML = item.type ;
                        image.setAttribute( 'src' ,  item.image ) ;

                        fragmento.appendChild( clon );

                        vista.appendChild( fragmento );

                    }) ;
                } ,

                addItem : function( p , image ) {
                    // p.id , p.sku , p.name , p.qty
                    var qty = parseInt( p.qty, 10) ;
                    var brandnew = (p.brandnew == 'true') ;
                    var idx = this.data.items.findIndex( item => item.id === p.id ) ;
                    if( idx >= 0 ) {
                        this.data.items[ idx ].qty += qty ;
                    } else {
                        this.data.items.push( { 'id' : p.id , 'sku' : p.sku , 'name' : p.name , 'qty' : qty , 'type' : p.type , 'brandnew' : brandnew , 'image' : image  } ) ;
                    }
                    this.write(  ) ;
                } , 

                removeItem : function( productId  ) {
                    var idx = this.data.items.findIndex( item => item.id === productId ) ;
                    if( idx >= 0 ) {
                        this.data.items.splice( idx , 1 ); 
                    }
                    this.write(  ) ;
                } , 

                updateQty : function( productId , qty ) {
                    var idx = this.data.items.findIndex( item => item.id === productId ) ;
                    if( idx >= 0 ) {
                        this.data.items[ idx ].qty = parseInt(qty, 10) ;
                    }
                    this.write(  ) ;
                } , 


                clearItems : function() {
                    this.data.items =  []  ; 
                    this.write(  ) ;
                } , 

                reset : function() {
                    this.data = { 'items' : [] } ; 
                    this.write(  ) ;
                }

        } ;

        return libreria ;
    } 

    if( typeof window.app_cart === 'undefined') {
        window.app_cart = inicio() ;

        //  VIEW CART
        app_cart.init( 'vista' , 'card_template' ) ;
        app_cart.read() ;
        app_cart.render() ;

        //  Borrar todo   Delete  (Del)  all
        const cart__delAll = document.getElementById('cart__delAll');
        cart__delAll.addEventListener( 'click', (e) => {
            e.preventDefault();
            app_cart.clearItems( ) ;
        });


        //  FICHA PRODUCTO
        const userSelection = Object.values(document.getElementsByClassName('cart__add'));
        userSelection.forEach(link => {
            link.addEventListener( 'click', (e) => {
                e.preventDefault();

                console.log( e.target.tagName ) ;

                if( e.target.tagName == 'A') {
                    let new_image = e.target.querySelector("img").getAttribute( "src" ) ;

                    app_cart.addItem(  e.target.dataset , new_image ) ;
    
                } else {
                    let new_image = e.target.closest("a").querySelector("img").getAttribute( "src" ) ;

                    app_cart.addItem(  e.target.closest("a").dataset , new_image ) ;
    
                }
            });
        });

        //  Submit


    } else {
        console.log('app_cart --- already loaded');
    }


})( window, document );
