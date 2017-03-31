<body>

<div id="container">	

	<div id="body">
            <h1>Index Administrativo</h1>
            
            <form name="loginAdministrativo" action="/kabansito/IndexAdministrativo/valida" method="post">
                <label for="Nombre">Nombre</label>            
                <input name="Nombre" type="Text">
                <label for="Password">Password</label>
                <input name="Password" type="password">
                <input type="submit" value="Enviar">
            </form>
          
	</div>
<?php /*

if ($Datos->num_rows() > 0)
{
   $row = $Datos->row();

   echo $row->user;
   //echo $row->pass;
   echo $row->visible;
} 
*/?>
</div>

</body>
</html>