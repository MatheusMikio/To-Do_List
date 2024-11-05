<?php 
session_start();
require_once ('conexao_tarefas.php');

if (isset($_GET['criar_tarefa'])){
    $nome = trim($_GET['nome']);
    $descricao = trim($_GET['descricao']);
    $situacao = $_GET['situacao'];
    $data_limite = trim($_GET['data_limite']);

    $sql = "INSERT INTO tarefas (nome,descricao,situacao,data_limite) VALUES ('$nome', '$descricao', '$situacao','$data_limite')";

    mysqli_query($conexao,$sql);

    if (mysqli_affected_rows($conexao) >= 0){
        $_SESSION['message'] = "Tarefa Criada!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "Tarefa não pode ser criada!";
        $_SESSION['type'] = 'error';
    }
    
    header('Location: index.php');
    exit();
}

function mostrarStatus($situacao){
    if ($situacao == 0){
        return "Pendente";
    }
    elseif ($situacao == 1){
        return "Em andamento";
    }
    else{
        return "Finalizada";
    }
}

if (isset($_GET['editar_tarefa'])){
    $idTarefa = mysqli_real_escape_string($conexao,$_GET['idTarefa']);
    $nome = mysqli_real_escape_string($conexao,$_GET['nome']);
    $descricao = mysqli_real_escape_string($conexao,$_GET['descricao']);
    $situacao = $_GET['situacao'];
    $data_limite = mysqli_real_escape_string($conexao,$_GET['data_limite']);

    $sql = "UPDATE tarefas set nome = '{$nome}', descricao = '{$descricao}', situacao = '{$situacao}', data_limite = '{$data_limite}'";

    $sql .= "WHERE id = '{$idTarefa}'";

    mysqli_query($conexao,$sql);

    if (mysqli_affected_rows($conexao) > 0){
        $_SESSION['message'] = "Tarefa {$idTarefa} Atualizada!";
        $_SESSION['type'] = 'success';
    }
    else{
        $_SESSION['message'] = "Não foi possivel atualizar a tarefa {$idTarefa}";
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}

if (isset($_GET['deletar_tarefa'])){
    $idTarefa = mysqli_real_escape_string($conexao,$_GET['deletar_tarefa']);
    $sql = "DELETE FROM tarefas WHERE id = '$idTarefa'";

    mysqli_query($conexao,$sql);

    if (mysqli_affected_rows($conexao) > 0){
        $_SESSION['message'] = "Tarefa {$idTarefa} excluído com sucesso!";
        $_SESSION['type'] = "success";
    }
    else{
        $_SESSION['message'] = "Não foi possível excluir o usuário";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit();
}

if (isset($_GET['mudarSituacao'])){    
    $idTarefa = mysqli_real_escape_string($conexao,$_GET['mudarSituacao']);
    $situacao =mysqli_real_escape_string($conexao,$_GET['situacao']);
    $sql = "UPDATE tarefas SET situacao = '{$situacao}'";
    $sql .= "WHERE id = '{$idTarefa}'";

    mysqli_query($conexao,$sql);

    if (mysqli_affected_rows($conexao) > 0){
        $_SESSION['message'] = "Status da tarefa {$idTarefa} foi atualizado!";
        $_SESSION['type'] = "success";
    }
    else{
        $_SESSION['message'] = "Não foi possível atualizar a tarefa!";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit();



}

?>