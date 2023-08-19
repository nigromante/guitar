(function ( document , window ) {

  // Core
    function FindElements( selectorClass ) {
      return document.querySelectorAll( selectorClass ) ;
    }


    function FindElement( selectorId ) {
      return document.querySelector( selectorId ) ;
    }


    function ChangeElementRef( selectorId, newRef ) {
      FindElement( selectorId ).href = newRef ; 
    }

    function ChangeElementSrc( selectorId, newSrc ) {
      FindElement( selectorId ).setAttribute( "src" , newSrc )  ; 
    }

    function ChangeElementValue( selectorId, newValue ) {
      FindElement( selectorId ).setAttribute( "value" , newValue )  ; 
    }


    function ChangeElementImg( selectorId, newSrc, newAlt ) {
      elem = FindElement( selectorId ) ;
      elem.setAttribute( "src" , newSrc ) ;  
      elem.setAttribute( "alt" , newAlt )  ; 
    }


    function CreateOptionControl( value , text ) {
        newOption = document.createElement("option");
        newOption.appendChild ( document.createTextNode (text) );
        newOption.setAttribute ("value", value );
        return (newOption);
    }


    function ChangeSelectOptions( selectorId, textDefault, dataList ) {
      const element = FindElement( selectorId );
      element.innerHTML = "" ;  
      element.append( CreateOptionControl( '' ,  textDefault )   );
      dataList.forEach(  (item) => {
        element.append( CreateOptionControl( item.value ,  item.text )   );
      }) ;
    }



// Delete Row
    function DeleteRowEventProcess( target ){
      row = target.closest("tr") ;
      url = target.getAttribute("href") ;
    
      if (confirm("Confirme la eliminacion") == true) {

        fetch( url )
        .then(function (response) {
            row.remove();
        })
        .catch(function (err) {
            console.warn('Something went wrong.', err);
        });
      }
    }


    function DeleteRowEventDefine(){

      FindElements('.action-borrar').forEach((link) => {
      
        link.addEventListener('click', (event) => {
          event.preventDefault();

          DeleteRowEventProcess( event.target ) ; 
      
        });
      });

    }


// Change Theme
    function CharactersFromTheme( theme ) {

      var datosTemas =  {

        "temas": {
            "startrek": [
              { 'value' : 'cptkirk' , 'text' : 'Capitan Kirk' } , 
              {'value' :'spock' , 'text' : 'Spock' }
              ],
            "starwars": [
              {'value' :'luke' , 'text' : 'Luke' } , 
              {'value' :'yoda' , 'text' : 'Yoda' }
              ],
            "lotr": [
              {'value' :'frodo' , 'text' : 'Frodo' } , 
              {'value' :'gandalf' , 'text' : 'Gandalf' }
              ]
    
            }
        
      } ;
    

      if( theme == 'startrek' )
        return  datosTemas.temas.startrek ; 

      if( theme== 'starwars' )
        return  datosTemas.temas.starwars ; 

      if( theme == 'lotr' )
        return  datosTemas.temas.lotr ;
      
        return [] ;
    }


    function ChangeThemeEventProcess( target ) {
      themeName =target.value ;

      characters = CharactersFromTheme( themeName ) ;

      ChangeElementImg( "#img-profile", "" , "" ) ; 

      ChangeElementRef( "#link_style", "/css/backend/themes/" + themeName + "/style.css"  ) ; 

      ChangeSelectOptions( '#Avatar' , 'Seleccionar avatar', characters );
    }


    function ChangeThemeEventDefine() {

      FindElement('#Tema')
        .addEventListener('change', (event) => { 
              event.preventDefault();

              ChangeThemeEventProcess( event.target ) ; 
          }
        );
    }

  
// Change Character
    function ChangeCharacterEventProcess( target ) {

      character = target.value ;

      ChangeElementImg( "#img-profile", "/images/avatars/" + character + ".jpg" , character ) ; 

    }


    function ChangeCharacterEventDefine() {

      FindElement('#Avatar')
        .addEventListener('change', (event) => {

              event.preventDefault();

              ChangeCharacterEventProcess( event.target ); 

          }
        );
    }



// Main
    function Start() {

      DeleteRowEventDefine();

      ChangeThemeEventDefine();

      ChangeCharacterEventDefine() ;

    }

    Start();

})( document, window );


