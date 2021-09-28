<!DOCTYPE html>
<html lang="en">
<?php 

session_start();
$retorno = "";

if (empty($_SESSION))
    header('Location: login.php');

if ($_POST){

    var_dump($_POST); exit;

}

?>

<head>
    <meta charset="UTF-8">
    <title>Cadastro Sistema de Currículos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    Olá, <?= $_SESSION["usuario"] ?>!
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Currículos</h2>
                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalcadastro">
                            Add Novo
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalcadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cadastro e Alteração</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome">
                                                </div>
                                                <div class="col">
                                                    <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="experiencia" name="experiencia" na class="form-control" placeholder="Experiência">
                                                </div>
                                                <div class="col">
                                                    <input type="text" id="formacao" name="formacao" class="form-control" placeholder="Formação">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" id="contato" name="contato" class="form-control" placeholder="Contato">
                                                </div>
                                                <div class="col">
                                                    <input type="text" id="ferramentas" name="ferramentas" class="form-control" placeholder="Ferramentas">
                                                </div>
                                            </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <?= $retorno ?>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Include config file
                    include("connection.php");


                    // Attempt select query execution
                    $sql = "SELECT * FROM dados";
                    if ($result = $conn->query($sql)) {
                        if ($result->rowCount() > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Id</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Cargo</th>";
                            echo "<th>Experiencia</th>";
                            echo "<th>Formação</th>";
                            echo "<th>Contato</th>";
                            echo "<th>Ferramentas</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . utf8_encode($row['nome']) . "</td>";
                                echo "<td>" . utf8_encode($row['cargo']) . "</td>";
                                echo "<td>" . utf8_encode($row['experiencia']) . "</td>";
                                echo "<td>" . utf8_encode($row['formacao']) . "</td>";
                                echo "<td>" . utf8_encode($row['contato']) . "</td>";
                                echo "<td>" . utf8_encode($row['ferramentas']) . "</td>";
                                echo "<td>";
                                echo '<a href="index.php?id=' . $row['id'] . '" class="mr-3" title="Ver Currículo" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                echo '<a class="mr-3" title="Atualizar Registro" data-toggle="modal" data-target="#modalcadastro"><span class="fa fa-pencil"></span></a>';
                                echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            unset($conn);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close connection
                    unset($pdo);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>