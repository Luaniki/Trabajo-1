<?php
require_once dirname(__DIR__) . '/materias_app/db_m/conexion_db_m.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/i_controller_m.php';
require_once dirname(__DIR__) . '/materias_app/models_m/materia.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/materia_controller.php';
use controllers_m\MateriaController;
$materiaController = new MateriaController();
$id = empty($_GET['idE']) ? 0 : $_GET['idE'];
$resultado = $materiaController->delete($id);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
    </head>
    <body>
        <h1>Resultados de la operación</h1>
        <?php
            if ($resultado) {
                echo '<p>Se eliminó el registro.</p>';
            } else {
                echo '<p>Se presentó un error al guardar los datos. Vuelva a intentar.</p>';
            }
            echo '<br>';
            echo '<a href="index_m.php">Volver a la lista</a>';
        ?>
    </body>
</html>