<!DOCTYPE html>
<html lang="es">
<head>
    <!-- layout.head -->

    <title>Gestión libros - Home </title>
</head>
<body>
    <!-- Capa Principal -->
    <div class="container">

        <!-- partial.header -->
            
        <!-- partial.menu -->
       
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <!-- Mostramos el encabezado de la tabla -->
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Editorial</th>
                        <th class="text-end">Unidades</th>
                        <th class="text-end">Coste</th>
                        <th class="text-end">PVP</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Mostramos cuerpo de la tabla -->
                    <!-- En el foreach incluyo un objeto de la clase pdostatement -->
                    <?php  ?>
                        <tr>
                            <!-- Detalles de artículos -->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-end"></td>
                            <td class="text-end"></td>
                            <td class="text-end"></td>
                            
                            <!-- Columna de acciones -->
                            <td>
                                <a href="" title="Eliminar" ><i class="bi bi-trash-fill" onclick="return confirm('Confimar elimación del libro')"></i></a>
                                <a href="" title="Editar"><i class="bi bi-pencil-fill"></i></a>
                                <a href="" title="Mostrar"><i class="bi bi-eye-fill"></i></a>
                            </td>
                        </tr>
                    <?php ?>   
                </tbody>
                <tfoot>
                    <tr><td colspan="6">Nº Registros </td></tr>
                </tfoot>
            </table>
        </div>
    </div>
    <br><br><br>

    <!-- partial.footer -->

    <!-- layout.javascript -->
    <?php include("layouts/layout.javascript.html");?>
    
 
</body>
</html>