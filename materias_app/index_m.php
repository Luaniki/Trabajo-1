<?php
require_once dirname(__DIR__) . '/materias_app/db_m/conexion_db_m.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/i_controller_m.php';

require_once dirname(__DIR__) . '/materias_app/models_m/materia.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/materia_controller.php';

use controllers_m\MateriaController;

$materiaController = new MateriaController();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Materias</title>
</head>

<body>
    <h1>Lista de materias</h1>
    <a href="form_materias.php">Registrar nueva materia</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Materia</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $materies = $materiaController->list();
            if (count($materies) > 0) {
                foreach ($materies as $materie) {
                    echo '<tr>';
                    echo ' <td>' . $materie->get('codigo') . '</td>';
                    echo ' <td>' . $materie->get('nombre') . '</td>';
                    echo ' <td>';
                    echo '   <a href="form_materias.php?idE=' . $materie->get('id') . '">Modificar</a>';
                    echo ' </td>';
                    echo ' <td>';
                    echo '   <a href="eliminar_m.php?idE=' . $materie->get('id') . '">Eliminar</a>';
                    echo ' </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo ' <td colspan="3">No hay registros</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>