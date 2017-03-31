<body>



    <div class="w3-container">
        <h2><?= $Categoria['nombreCategoria'] ?></h2>
        <br>
        <p><?= $Categoria['descripcion'] ?></p>
        <span id="categoria" hidden><?= $Categoria['id'] ?></span>
        
        
        
        <table class="w3-table-all w3-hoverable">
            <thead>
                <tr class="w3-light-grey">
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th>Gasto</th>
                    <th>borrar</th>
                </tr>
            </thead>
        
        
        <?php
         foreach($Gastos as $fila)
            {
            ?>
            <tr>
                <td><p><?=$fila['descripcion']?></p></td>
                <td><p><?=$fila['cantidad']?></p></td>
                <td><p class="cantidad"><?=$fila['gasto']?></p></td>
                <td><i id="<?=$fila['id']?>" class="material-icons borrar">delete</i></td>
            </tr>
              <?php
            }
            ?>
        

            <tr id="filaActual">
                <td>
                    <textarea id="descripcion" cols="50" rows="1"></textarea>
                </td>
                <td>
                    <textarea id="cantidad" cols="5" rows="1" ></textarea>
                </td>
                <td>
                    <textarea id="gasto" cols="50" rows="1" ></textarea>
                </td>
                <td></td>
            </tr>
            <tr id="lastRow">
                <td>Total</td>
                <td></td>
                <td><p id="total">$ 0.0</p></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button ID="btn1">Nuevo Registro</button>
                </td>
                <td></td>
            </tr>
        </table>

    </div>
    
    <div id="contenedor"></div>
    


</body>
</html>