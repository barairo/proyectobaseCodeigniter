<body>

   


             
            <div class="w3-container">
              <h2>Categorias</h2>
              
              <ul class="w3-navbar w3-light-grey w3-border">
                 <a href="<?php echo site_url('Agregar/categoria') ?>"> <li><i class="material-icons">note_add</i></li> </a>   
            </ul> 
              
              <br>
              
              
              
               <?php
            foreach($Categoria as $fila)
            {
            ?>
             <div class="w3-card-4" style="width:30%">
                    <header class="w3-container w3-light-grey">
                        <a href="<?php echo site_url('Categorias/categoria/'.$fila->id) ?>">
                            <h3 style="display: inline-block; "><?=$fila->nombreCategoria?></h3>
                        </a>
                         <img src="https://thumb-gr.s3.envato.com/files/140573021/food-80.jpg" alt="Avatar" class=" w3-circle " style="width:60px; display:inline-block; "> 
                    </header>
                    <div class="w3-container">
                        <p><?=$fila->descripcion?></p><br>
                    </div>
                <p hidden><?=$fila->id?></p>
            </div>  
            <br>  
            
            
            
              <?php
            }
            ?>
              

                
         

    </body>
</html>