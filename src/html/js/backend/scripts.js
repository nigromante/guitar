var Utilities=Utilities||(function () {


  var PrivateDeleteEvent = function(){
    const links = document.querySelectorAll('.action-borrar');
    links.forEach((link) => {
    
      link.addEventListener('click', (event) => {
        event.preventDefault();
    
        if (confirm("Confirme la eliminacion") == true) {
    
          row = event.target.closest("tr") ;
          url = event.target.getAttribute("href") ;
    
          fetch( url )
          .then(function (response) {
              console.log( response );
              row.remove();
            })
          .catch(function (err) {
              console.warn('Something went wrong.', err);
            });
        }
    
      });
    
    });

  }

  var datosTemas =  {

    "temas": {
        "startrek": [
           { 'alias' : 'cptkirk' , 'nombre' : 'Capitan Kirk' } , 
           {'alias' :'spock' , 'nombre' : 'Spock' }
          ],
        "starwars": [
           {'alias' :'luke' , 'nombre' : 'Luke' } , 
           {'alias' :'yoda' , 'nombre' : 'Yoda' }
          ],
        "lotr": [
           {'alias' :'frodo' , 'nombre' : 'Frodo' } , 
           {'alias' :'gandalf' , 'nombre' : 'Gandalf' }
          ]
 
        }
    
} ;



  var SeleccionarPersonajesPorTema = function( tema ) {

    if( tema == 'startrek' )
      return  datosTemas.temas.startrek ; 
    if( tema == 'starwars' )
      return  datosTemas.temas.starwars ; 
    if( tema == 'lotr' )
      return  datosTemas.temas.lotr ; 
  }


  var CreateOptionControl = function( valor , texto ) {
    newOption = document.createElement("option");
    opt_txt = document.createTextNode (  texto);
    newOption.appendChild (opt_txt);
    newOption.setAttribute ("value", valor );
    return (newOption);
  }


  var CambiarTemaPersonajes = function( personajes ) {
    
    const personajeControl = document.querySelector('#Avatar');

      personajeControl.innerHTML = "" ;  

      personajeControl.append( CreateOptionControl( '' ,  'Seleccionar avatar' )   );

      personajes.forEach(  (personaje) => {
        personajeControl.append( CreateOptionControl( personaje.alias ,  personaje.nombre )   );
      }) ;

  }



  var CambiarTemaEventDefine = function() {

    document
      .querySelector('#Tema')
      .addEventListener('change', 
        (event) => { 
            event.preventDefault();


            CambiarTemaPersonajes( SeleccionarPersonajesPorTema( event.target.value ) );


        }
      );
  }
  


  PrivateDeleteEvent();

  CambiarTemaEventDefine();

  return {

     /*DeleteEvent: function(input){
        PrivateDeleteEvent();
     }*/
  }
})();


//  -------------------------------

//   #Tema

  // RESPAADOS
  // var CambiarTema = function( nuevoTema ) {

  //   console.log( 'funcion CambiarTema :: ' , nuevoTema );


  //   const personajesSlect = document.querySelectorAll('#Avatar');

  //   console.log( personajesSlect ) ;

  //   personajesSlect.forEach((personajeControl) => {

  //     personajeControl.innerHTML = "" ;   // Elimina personajes anteriores

  //     //  Agregar  opciones de PERSONAJES   para el nuevo tema
  //     newOption = document.createElement("option");
  //     opt_txt = document.createTextNode ( 'Seleccionar avatar');
  //     newOption.appendChild (opt_txt);
  //     newOption.setAttribute ("value", '');
  //     personajeControl.append(newOption);

  //     console.log( datosTemas ) ; 

  //     personajes = SeleccionarPersonajesPorTema( nuevoTema ) ; 

  //     console.log( personajes ) ; 

  //     personajes.forEach(  (personaje) => {
  //       console.log( personaje.alias ,  personaje.nombre  ) ; 

  //       newOption = document.createElement("option");
  //       opt_txt = document.createTextNode ( personaje.nombre);
  //       newOption.appendChild (opt_txt);
  //       newOption.setAttribute ("value", personaje.alias );
  //       personajeControl.append(newOption);
  
  //     }) ;


  //   });

  // }



  // var CambiarTemaEventDefine = function() {

  //   // Buscar un control para ver sus eventos    #Tema es un SELECT .... en la pagina
  //   const temasSelect = document.querySelectorAll('#Tema');

  //   temasSelect.forEach((temaControl) => {
    
  //     //  Agregar a cada 'temaControl'  una funcion de control de eventos
  //     //   'change'   se llama el evento   
  //     temaControl.addEventListener('change', (event) => {   // funcion anonima que procesa el evento

  //       // No acumula eventos --- previene clicks o eventos muy seguidos 
  //       //  Se procesa una sola vez
  //       event.preventDefault();

  //       console.log( "change !! " );   //  llego un evento change !!!!!  

  //       // Aca se programa ...  que hacer con esto ...
  //       const control = event.target ; 

  //       console.log( control );

  //       const valor = control.value;
        
  //       CambiarTema( valor );
        


  //     }  //  aca termina la funcion anonima

      
  //     );
  //   });



