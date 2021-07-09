<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content = "IE = edge" />
        <meta 
        name = "viewport" 
        content = "width = device-width, 
        initial-scale = 1.0" />
        <link rel = "stylesheet" href = "src/css/login/style.css" />
    </head>
    <body>
<?php
session_start();
if($_SESSION['username']) {
    header("Location: ./Controller/UserController.php?login=login");
}
?>
        <div class = "principal">
            <div class = "principal__head">
                <img 
                    class = "principal__head--logo" 
                    src = "src/img/logo2.png" 
                    alt = "Logo de la institucion" 
                />
                <h1 class = "principal__head--title">
                    Instituto Nacional de Comercio
                </h1>
            </div>
            <div class = "principal__body">
                <form 
                    class = "principal__body--form"
                    method="POST"
                    action = "./Controller/UserController.php"
                >
                    <input type = "hidden" name = "login" value = "login" />
                    <img 
                        class = "principal__body--user" 
                        src = "src/img/login.png" 
                        alt = "Photo of the User" />
                    <input 
                    class = "principal__body--form__input"
                        type = "text" 
                        placeholder = "User Name" 
                        name = "user-name"
                    />
                    <input 
                        class = "principal__body--form__input " 
                        type = "password" 
                        placeholder = "Password" 
                        name = "password"
                    />
                    <div>
                        <p class = "principal__body--form__error">
                            <?php
                                if($_SESSION["message"]) {
                                    echo $_SESSION["message"];
                                    $_SESSION["message"] = null;
                                }
                            ?>
                        </p>
                    </div>
                    <input 
                        class = "principal__body--form__button" 
                        type = "submit" 
                        value = "LOGIN" 
                    />
                </form>
            </div> 
        </div>
    </body>
</html>

