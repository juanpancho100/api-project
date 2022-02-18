<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      body{
        background: green;
        font-family: sans-serif;
      }
      .tabla{
        background: #6584db;
        color: #fff;
        margin: auto;
      }
      .tabla_cuadro{
        padding: 20px;
      }
      .tabla_celda{
        padding: 10px;
        background: lightgreen;
      }
      .volver{
        padding: 20px;
        width: 80px;
        background: lightgreen;
        margin: auto;
        margin-top: 10px;
        text-align: center;
      }
      a{
        color: black;
        font-family: sans-serif;
        text-decoration: none;
      }
      h2{
        color: #fff;
        font-family: sans-serif;
      }
    </style>
  </head>
  <body>
  </body>
</html>
<?php
include_once "clases/clase_pedido.php";

$pedido = new pedido();
$resultado = $pedido->MostrarPedido();

    echo "<h2>numero de resultados: ".$resultado->rowCount()."</h2>";
    echo "<table class='tabla'>
            <tr class='tabla_prin'>
                <th class='tabla_cuadro'>#</th>
                <th class='tabla_cuadro'>Nombre Pedido</th>
                <th class='tabla_cuadro'>Estado Pedido</th>
                <th class='tabla_cuadro'>Precio Pedido</th>
                <th class='tabla_cuadro'>&nbsp;</th>
                <th class='tabla_cuadro'>&nbsp;</th>
            </tr>";
    foreach ($resultado->fetchAll() as $k => $item) {
        echo "<tr>
                <td class='tabla_celda'>" . ($k + 1) . "</td>
                <td class='tabla_celda'>" . $item["nom_pe"] . "</td>
                <td class='tabla_celda'>" . $item["Estado_pe"] . "</td>
                <td class='tabla_celda'>" . $item["Precio_pe"] . "</td>
                <td class='tabla_celda'><form method='post' action='Eliminar_pedido.php'>
                        <input type='hidden' name='id_pe' value='".$item["id_pe"]."'>
                        <input type='submit' name='submit' value='Eliminar'>
                    </form>
                </td>
                <td class='tabla_celda'><form method='post' action='Actualizar_pedido.php'>
                        <input type='hidden' name='id_pe' value='".$item["id_pe"]."'>
                        <input type='submit' name='submit2' value='Actualizar'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
  ?>
  <div class="volver">
    <a href="/proyecto/index.php">VOLVER</a>
  </div>
