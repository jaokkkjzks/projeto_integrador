<?php include("./includes/header.php"); ?>
<?php require("conexao.php");?>

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
</style>
<body>
    
<main class="continer p-4">
    <div class=" row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body ">
                <h1>cadastro</h1>
                <form class="text-secondary" action="salvar.php" method="post">
                    <div class="form-group">
                        <input class="form-control" type="text" name="nome" placeholder="nome">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="data" placeholder="data">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="senha" placeholder="senha">
                    </div>
                    <input class="btn btn-block btn-primary" type="submit" value="Salvar">
                    <a href="login.php">voltar</a>
                </form>
            </div>
        </div>
    </div>
</main>

</body>
<?php include("./includes/footer.php") ?>