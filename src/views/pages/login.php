<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agropecuária Campanholi - Login</title>
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>assets/css/login.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <img class="logo" src="<?=BASE_URL;?>assets/images/logo.png" alt="" width="300" class="img-fluid">

                <form action="<?=BASE_URL;?>login/action" method="post" class="form-login">
                <h2>Login</h2><br>
                    <?php if(isset($flash)):?> 
                        <div class="alert-danger"><?=$flash;?></div><br>
                    <?php endif;?>
                    <div class="form-group">
                        <input type="email" name="email" id="" placeholder="Digite seu E-mail" autofocus="true">
                    </div>
                    <div class="form-group">
                        <input type="password" name="senha" id="" placeholder="****">
                    </div><br>
                    <div class="form-group">
                        <input type="submit" value="Acessar Sistema" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>