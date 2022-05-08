<?php
require_once dirname(__DIR__) . '/materias_app/db_m/conexion_db_m.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/i_controller_m.php';

require_once dirname(__DIR__) . '/materias_app/models_m/materia.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/materia_controller.php';

use controllers_m\MateriaController;
use models_m\Materia;

$materiaController = new MateriaController();

$materia = new Materia();
$materia->set('codigo', $_POST['codigoInput']);
$materia->set('nombre', $_POST['nombreInput']);

$resultado = $materiaController->create($materia);

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
        echo '<p>Registro exitoso</p>';
        echo '<br>';
        echo '<a href="index_m.php">Volver a la lista</a>';
    } else {
        echo '<p>Se presentó un error al guardar los datos. Vuelva a intentar.</p>';
        echo '<br>';
        echo '<a href="form_materias.php">Volver</a>';
    }
    ?>
</body>

</html>