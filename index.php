<?php
  $db_host = 'localhost';
  $db_usuario = 'root';
  $db_clave = '';
  $db_nombre = 'crud';

  $conexion = mysqli_connect($db_host, $db_usuario, $db_clave, $db_nombre) or die ('Problemas al conectar.');
              mysqli_select_db($conexion, $db_nombre) or die ('Problemas al conectar con la base de datos.');
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rellenar tabla con datos de BD</title>
    <style>
	  html {
      line-height: 1.15;
      /* 1 */
      -ms-text-size-adjust: 100%;
      /* 2 */
      -webkit-text-size-adjust: 100%;
      /* 2 */
	  }
	  html {
      -webkit-box-sizing: border-box;
		  box-sizing: border-box;
	  }
	  *, *:before, *:after {
  		-webkit-box-sizing: inherit;
  		box-sizing: inherit;
	  }
	  table, th, td {
  		border: none;
	  }
	  table {
  		width: 100%;
  		display: table;
  		border-collapse: collapse;
  		border-spacing: 0;
	  }
	  tr {
  		border-bottom: 1px solid rgba(0, 0, 0, 0.12);
	  }
	  td, th {
  		padding: 15px 5px;
  		display: table-cell;
  		text-align: center;
  		vertical-align: middle;
  		border-radius: 2px;
	  }
	  html {
  		line-height: 1.5;
  		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
  		font-weight: normal;
  		color: rgba(0, 0, 0, 0.87);
	  }
	</style>
  </head>
  <body>
    <table>
      <thead>
        <tr>
          <th style="color:#fff;background-color:#000;" colspan="3">Inventario (Últimos 5 artículos)</th>
        </tr>
        <tr>
          <th>Artículo</th>
          <th>Descripción</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = 'SELECT * FROM productos ORDER BY id DESC LIMIT 5';
          $query = mysqli_query($conexion, $sql);
          while ($producto = mysqli_fetch_array($query)) {
            echo "<td>".$producto['nombre']."</td>
                  <td>".$producto['descripcion']."</td>
                  <td>".$producto['cantidad']."</td>";
          }
        ?>
      </tbody>
    </table>
  </body>
</html>
