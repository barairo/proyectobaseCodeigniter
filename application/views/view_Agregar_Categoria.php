<body>

    <div class="w3-row w3-container w3-center">




      
        
        
        
        <div class="w3-col s3 w3-center" >
            <div class="w3-container w3-blue">
                <h2>Nueva Categoria</h2>
            </div>

            <form class="w3-container" action="/kabansito/Agregar/Nuevo" method="post">
                <p>
                    <label>Nombre de la Categoria</label>
                    <input class="w3-input" type="text" name="categoria"></p>
                <p>
                    <label>Descripcion de la categoria</label>
                    <input class="w3-input" type="text" name="descripcion"></p>
                <p>
                    <label>Informacion extra</label>
                    <input class="w3-input" type="text" name="infoExtra"></p>
                  <input type="submit" class="w3-btn" value="Agregar">
            </form>
            
            
           
            
            
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>
  

  </div>




</body>
</html>