<?php
include_once('conexao.php');
$postjson = json_decode(file_get_contents('php://input', true), true);

if($postjson['requisicao']=='add'){
    $query = $pdo->prepare("INSERT INTO patrimonio SET numero=:numero, produto=:produto, data=default, valor=:valor, situacao=:situacao, marca=:marca, serie=:serie, categoria=:categoria");
    $query->bindValue(":produto",$postjson['produto']);
    $query->bindValue(":valor",$postjson['valor']);
    $query->bindValue(":numero",$postjson['numero']);
    $query->bindValue(":marca",$postjson['marca']);
    $query->bindValue(":serie",$postjson['serie']);
    $query->bindValue(":categoria",$postjson['categoria']);
    $query->bindValue(":situacao",$postjson['situacao']);
    $query->execute();
    $id  = $pdo->lastInsertId();
    if($query){
        $result = json_encode(array('success'=>true,'id'=>$id));
    }else{
        $result = json_encode(array('success'=>false,'msg'=>'Falha ao inserir patrimônio.'));
    }
    echo $result;
//
}//final da requisição ADD  - teste OK
else if($postjson['requisicao']=='listar'){
    if($postjson['numero'] == ''){                                                      
        $query = $pdo->query("SELECT * FROM patrimonio order by numero asc");
    }else{
        $query = $pdo->query("SELECT * FROM patrimonio where numero = '$postjson[numero]' order by numero asc");
    }
    $res  = $query->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i < count($res); $i++) { 
            $dados[] = array(
                'id'=> $res[$i]['id'],
                'numero'=> $res[$i]['numero'],
                'produto'=> $res[$i]['produto'],
                'serie'=> $res[$i]['serie'],
                'marca'=> $res[$i]['marca'],
                'valor'=> $res[$i]['valor'],
                'categoria'=> $res[$i]['categoria'],
                'situacao'=> $res[$i]['situacao']
            );
        
    } 
    if (count($res) > 0){
        $result = json_encode(array('success'=>true, 'result'=>$dados));
    }else{
        $result = json_encode(array('success'=>false, 'result'=>'0'));
    }
    echo $result;

 

}//final da requisição LISTAR
?>