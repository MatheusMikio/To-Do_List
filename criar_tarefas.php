<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Tarefa</title>
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
                            Adicionar Tarefa 
                            <i class="bi bi-journal-plus"></i>
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <?php 
                    ?>
                    <div class="card-body">
                        <form action="acoesToDo.php" method="GET">
                            <div class="mb-3">
                                <label for="nome">Nome da tarefa</label>
                                <input type="text" name="nome" id="nome" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label for="descricao">Descrição da tarefa</label>                                
                                <input type="text" name="descricao" id="descricao" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="situacao">Situação da tarefa</label>
                                <select name="situacao" id="situacao" class="form-control">
                                    <option value="0">Pendente</option>
                                    <option value="1">Em andamento</option>
                                    <option value="2">Concluida</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="data_limite">Data limite para realizar a tarefa</label>
                                <input type="datetime-local" name="data_limite" id=data_limite class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="criar_tarefa" class="btn btn-primary float-end">Criar</button>
                            </div>                     
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>