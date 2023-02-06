<?php include("./includes/header.php"); ?>
<?php
require("conexao.php");

if (isset($_POST['login'])) {

    $usuario = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT * FROM `cadastro` WHERE `email`='$usuario' and `senha`='$senha'";

    $result = mysqli_query($conexao, $query);

    if (mysqli_num_rows($result) >= 1) {
        $_SESSION['email'] = $usuario;
        $_SESSION['senha'] = $senha;

        $_SESSION['tipo_msg'] = 'success';
        $_SESSION['msg'] = 'Bem vindo!!!';

        header("location: index.php");
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);

        $_SESSION['tipo_msg'] = 'danger';
        $_SESSION['msg'] = 'Usuario ou senha invalidos';

        header("location:login.php");
    }
}
if (isset($_POST['salvar'])) {
    $usuario = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "INSERT INTO `cadastro`( `email`,`senha`) VALUES ('$usuario','$senha')";

    $result = mysqli_query($conexao, $query);

    $_SESSION['tipo_msg'] = 'seccess';
    $_SESSION['msg'] = 'usuario cadastrado com sucesso';
}
?>

<style>
    body {
        background-image: radial-gradient(circle at 117.97% 50%, #844c59 0, #7f4459 10%, #783b59 20%, #703259 30%, #662859 40%, #591f59 50%, #4a175a 60%, #37135b 70%, #1d125d 80%, #00135f 90%, #001461 100%);
    }

    .row {
        margin-top: 300px;
    }

    h1 {
        text-align: center;
    }

    p {
        color: black;
        float: right;
        text-decoration: none;
    }

    p:hover {
        color: white;
        border-radius: 6px;
        background-color: #0099ff;
    }
</style>
<html>

<body>

    <?php if (isset($_SESSION['msg'])) { ?>
        <div class="alert alert-<?php echo $_SESSION['tipo_msg'] ?> alert-dimissible fade show" role="alert">
            <?php echo $_SESSION['msg'] ?>
            <button type="button" class="close" data-dimiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div>
        <div>
            <main class="continer p-4">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card card-body ">
                            <h1>Login</h1>
                            <form class="text-secondary" action="login.php" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="senha" placeholder="senha">
                                </div>
                                <a href="cadastro.php">
                                    <p>cadastrar-se</p>
                                </a>
                                <input class="btn btn-block btn-primary" type="submit" value="entrar" name="login">
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        $alerta = document.querySelector(".alert");
        if ($alerta) {
            setTimeout(() => {
                $alerta.remove();
            }, 2000);
        }
    </script>
</body>

</html>