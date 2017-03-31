  $(document).ready(function () { 
    $("#contenedorCalendario").load(BASE_URL + "MenuAdministrativo/calendarioActual");  /*Cargo el calendario actual al momento de terminarse de cargar la pagina */
 
   
   $('#flechaMesAnterior').click(function (event){
          $("#contenedorCalendario").load(BASE_URL + "MenuAdministrativo/mesAnterior");      
      });

    $('#flechaMesSiguiente').click(function (event){
          $("#contenedorCalendario").load(BASE_URL + "MenuAdministrativo/mesSiguiente");               
      });
    
    
    });
