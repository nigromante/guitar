var Utilities=Utilities||(function () {


  var PrivateDeleteEvent=function(){
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
  
  PrivateDeleteEvent();

  return {

     /*DeleteEvent: function(input){
        PrivateDeleteEvent();
     }*/
  }
})();




