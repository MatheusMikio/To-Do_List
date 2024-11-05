<?php 
require_once 'acoesToDo.php';
require_once "conexao_tarefas.php";
$sql = "SELECT * FROM tarefas";
$tarefas = mysqli_query($conexao,$sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="dropdown" data-bs-theme="dark">
    <div class="card px-4">
        <div>
            <h1 class="card-title text-info">To-Do List</h1>
        </div>
    </div>    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Lista de tarefas <i class="bi bi-journal-text"></i>
                            <a href="criar_tarefas.php" class="btn btn-primary float-end">Adicionar tarefa</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php include('notificacao.php')?>
                        <table class="table table-dark table-striped-columns">
                            <thead>
                                <tr class="grid text-center">
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>status</th>
                                    <th>Data limite</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($tarefas as $tarefa):
                                ?>
                                <td class="grid text-center"><?=$tarefa['nome']?></td>
                                <td><?=$tarefa['descricao']?></td>
                                <td class="grid text-center"><?= mostrarStatus($tarefa['situacao']);?>

                                <a href="editar_tarefa.php?id=<?=$tarefa['id']?>"><i class="bi bi-gear-fill"></i></a>
                                </td>
                                <td class="grid text-center"><?php 
                                echo date('d/m/Y H:i', strtotime($tarefa['data_limite']));
                                ?></td>
                                <td class="grid text-center">
                                    <a href="editar_tarefa.php?id=<?=$tarefa['id']?>" class="btn btn-outline-warning m-1"><i class="bi bi-pencil-fill"></i></a>
                                    <form action="acoesToDo.php" method="get" class="d-inline">
                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" name="deletar_tarefa" type="submit" value="<?=$tarefa['id']?>" class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                    <?php if (mostrarStatus($tarefa['situacao']) == 'Pendente'):?>
                                        <form action="acoesToDo.php" method="GET" class="d-inline">
                                            <input type="hidden" value = "1" name = "situacao">
                                            <button onclick="return confirm('Mudar o status da tarefa?')"name="mudarSituacao" type="submit" value="<?=$tarefa['id']?>" class="btn btn-outline-light m-1"><i class="bi bi-hourglass-top"></i></button>
                                        </form>
                                    <?php 
                                    endif;
                                    ?>
                                    <?php if (mostrarStatus($tarefa['situacao']) == 'Finalizada'):?>
                                        <form action="acoesToDo.php" method="GET" class="d-inline">
                                            <input type="hidden" value = "0"name = "situacao">
                                            <button onclick="return confirm('Mudar o status da tarefa?')" name="mudarSituacao" type="submit" value="<?=$tarefa['id']?>" class="btn btn-outline-success m-1"><i class="bi bi-check2"></i></button>
                                        </form>
                                    <?php 
                                    endif;
                                    ?>
                                    <?php if (mostrarStatus($tarefa['situacao']) == 'Em andamento'):?>
                                        <form action="acoesToDo.php" method="GET" class="d-inline">
                                            <input type="hidden" value = "2"name = "situacao">
                                            <button onclick="return confirm('Mudar o status da tarefa?')" name="mudarSituacao" type="submit" value="<?=$tarefa['id']?>" class="btn btn-outline-warning m-1"><i class="bi bi-person-walking"></i></button>
                                        </form>
                                    <?php 
                                    endif;
                                    ?>
                                </td>
                            </tbody>
                            <?php 
                            endforeach
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>