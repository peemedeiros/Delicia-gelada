<?php require_once("conexao.php");
    $conexao = conexaoMysql();

    $sql="select categoria_sabor.*, sabores.nome from 
    categoria_sabor inner join sabores on categoria_sabor.id_sabor = sabores.id
    where categoria_sabor.id_categoria = '".$_POST['id']."'";
    $select = mysqli_query($conexao, $sql);

    while($rsSabor = mysqli_fetch_array($select)){
        echo
        ("
        <option value=".$rsSabor['id_sabor'].">".$rsSabor['nome']."</option>
        ");
    }
