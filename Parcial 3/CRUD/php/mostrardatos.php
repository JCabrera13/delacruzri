<?php
    try{
        $con = new PDO("mysql:host=localhost;dbname=crud",'root','');
        
        $query = "select * from producto";
        $consulta = $con -> prepare($query);
        
        if($consulta -> execute())
        {
            $registros = $consulta -> fetchall();

            $createTable = '<table class ="table table-striped table-hover">';
            $createTable .= '<thead>';
            $createTable .= '<tr>';
            $createTable .= '<th scope="col">ID</th>';
            $createTable .= '<th scope="col">Nombre</th>';
            $createTable .= '<th scope="col">Categoría</th>';
            $createTable .= '<th scope="col">Proveedor</th>';
            $createTable .= '<th scope="col">Precio compra</th>';
            $createTable .= '<th scope="col">Precio venta</th>';
            $createTable .= '</tr>';
            $createTable .= '</thead>';
            $createTable .= '<tbody>';
            foreach($registros as $data)
            {
                $createTable .= '<tr>';
                $createTable .= '<td>'.$data['id_producto'].'</td>';
                $createTable .= '<td>'.$data['nombre'].'</td>';
                $createTable .= '<td>'.$data['categoria'].'</td>';
                $createTable .= '<td>'.$data['proveedor'].'</td>';
                $createTable .= '<td>'.$data['prec_compra'].'</td>';
                $createTable .= '<td>'.$data['prec_venta'].'</td>';
                $createTable .= '</tr>';
            }
            $createTable .= '</tbody>';
            $createTable .= '</table>';
        }
        else{
            $createTable = "Error al consultar";
        }
    }catch(PDOException $ex)
    {
        $createTable = "No se ha podido establecer la conexión a la base de datos";
        echo $ex->getMessage();
    }
    echo $createTable;
    $con -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>