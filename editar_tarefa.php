<?php 
session_start();
require_once 'conexao_tarefas.php';
$tarefa = [];

if (!isset($_GET['id'])){
    header('Location: index.php');
}
else{
    $idTarefa = mysqli_real_escape_string($conexao,$_GET['id']);
    $sql = "SELECT * FROM tarefas where id = '{$idTarefa}'";
    $query = mysqli_query($conexao,$sql);
    if (mysqli_num_rows($query) > 0){
        $tarefa = mysqli_fetch_array($query);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="dropdown" data-bs-theme="dark">
    <div class="container mt-4">   
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Editar Tarefa <i class="bi bi-pencil-square"></i>
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a> 
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($tarefa):
                        ?>
                        <form action="acoesToDo.php" method="get">
                            <input type="hidden" name="idTarefa" value="<?=$tarefa['id']?>">
                            <div class="mb-3">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" value="<?=$tarefa['nome']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="descricao">Descrição</label>
                                <input type="text" name="descricao" id="descricao" value="<?=$tarefa['descricao']?>" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="situacao">Situação</label>
                                <select name="situacao" id="situacao" class="form-control">
                                    <option value="0">Pendente</option>
                                    <option value="1">Em andamento</option>
                                    <option value="2">Finalizada</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="data_limite">Data Limite</label>
                                <input type="datetime-local" name="data_limite" id="data_limite" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="editar_tarefa"class="btn btn-primary float-end">Atualizar</button>
                            </div>
                        </form>
                        <?php 
                        else:
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Tarefa não encontrada
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php 
                        endif
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
