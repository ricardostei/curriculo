<!DOCTYPE html>
<html lang="en">
    <?php session_start();
    if(empty($_SESSION))
        header('Location: login.php'); 
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
        .wrapper{
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                Olá, <?= $_SESSION["usuario"]?>! 
                    <div class="mt-5 mb-3 clearfix">                    
                        <h2 class="pull-left">Currículos</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add Novo</a>
                    </div>
                    <?php
                    // Include config file
                    include("connection.php");
                    
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM dados";
                    if($result = $conn->query($sql)){
                        if($result->rowCount() > 0){
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
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . utf8_encode($row['nome']) . "</td>";
                                        echo "<td>" . utf8_encode($row['cargo']) . "</td>";
                                        echo "<td>" . utf8_encode($row['experiencia']) . "</td>";
                                        echo "<td>" . utf8_encode($row['formacao']) . "</td>";
                                        echo "<td>" . utf8_encode($row['contato']) . "</td>";
                                        echo "<td>" . utf8_encode($row['ferramentas']) . "</td>";
                                        echo "<td>";
                                            echo '<a href="index.php?id='. $row['id'] .'" class="mr-3" title="Ver Currículo" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($conn);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
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