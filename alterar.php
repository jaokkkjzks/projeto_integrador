<?php
    require('conexao.php');
    $id = $_GET['id'];
    $query = "SELECT `titulo`, `descricao`, `data_criacao` FROM `tarefa` WHERE `id`=$id";
    $result =  mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) == 1) {
        $linha = mysqli_fetch_assoc($result);
        $titulo = $linha['titulo'];
        $descricao = $linha['descricao'];
    }

    //escutar clique do botao alterar

    if (isset($_POST['alterar'])) {
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];

        $query = "UPDATE `tarefa` SET `titulo`='$titulo',`descricao`='$descricao' WHERE `id`='$id'";
        $result = mysqli_query($conexao, $query);

        $_SESSION['msg'] = 'Tarefa atualizada com sucesso!!!';
        $_SESSION['tipo_msg'] = 'info';

        header("location: index.php");
    }

    ?>

    <?php include("./includes/header.php") ?>

    <main class="continer p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="alterar.php?id=<?php echo $_GET['id'] ?>" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="id" value="<?php echo $id ?>" disabled>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="titulo" placeholder="Título" value="<?php echo $titulo ?>">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="descricao" id="" cols="30" rows="10" placeholder="Descrição"><?php echo $descricao ?></textarea>
                            <input class="btn btn-block btn-secondary" type="submit" value="Salvar" name="alterar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>