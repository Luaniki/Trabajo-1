<?php
require_once dirname(__DIR__) . '/materias_app/db_m/conexion_db_m.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/i_controller_m.php';

require_once dirname(__DIR__) . '/materias_app/models_m/materia.php';
require_once dirname(__DIR__) . '/materias_app/controllers_m/materia_controller.php';

use controllers_m\MateriaController;

$materiaController = new MateriaController();

$id = empty($_GET['idE']) ? null : $_GET['idE'];
$tituloForm = empty($id) ? "Registrar" : "Modificar";
$actionForm = empty($id) ? "registrar_m.php" : "actualizar_m.php";

$materiaModel = empty($id) ? null : $materiaController->detail($id);

$materia = [
    'codigo' => $materiaModel == null ? '' : $materiaModel->get('codigo'),
    'nombre' => $materiaModel == null ? '' : $materiaModel->get('nombre'),
];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Materias</title>
</head>

<body>
    <h1><?php echo $tituloForm; ?> Materia</h1>
    <br>
    <a href="index_m.php">Volver</a>
    <br><br>
    <form action="<?php echo $actionForm; ?>" method="POST">
        <?php
        if (!empty($id)) {
            echo '<input id="idInput" name="idInput" type="hidden" value="' . $id . '">';
        }
        ?>
        <div>
            <label for="codigoInput">Código</label>
            <input id="codigoInput" name="codigoInput" type="text" value="<?php echo $materia['codigo'] ?>" required>
        </div>
        <div>
            <label for="nombreInput">Nombre</label>
            <input id="nombreInput" name="nombreInput" type="text" value="<?php echo $materia['nombre'] ?>" required>
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
</body>

</html>