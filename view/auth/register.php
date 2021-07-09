<!DOCTYPE html>
<html>
    <head>
        <title>User</title>
        <meta charset = "UTF-8" />
        <meta http-equiv="X-UA-Compatible" content = "IE = edge" />
        <meta 
        name = "viewport" 
        content = "width = device-width, 
        initial-scale = 1.0" />
        <link rel = "stylesheet" href = "../../src/css/normalize/normalize.css" />
        <link rel = "stylesheet" href = "../../src/css/register/styles.css" />
        <link rel = "stylesheet" href = "../../src/css/header/style.css" />
    </head>
    <body>
<?php require_once "../static/header.php" ?>
        <div class = "container__register">
            <h1 class = "title">Register New User</h1>
            <form 
                class = "container__form" 
                method = "POST" 
                action = "../../Controller/UserController.php" 
                enctype = "multipart/form-data"
            >
                <input type = "hidden" name = "register" value = "register"/>
                <div class = "container__form--data">
                    <label class = "container__form--label">Nombres</label>
                    <span class = "container__form--icon">
                        <img 
                            src = "../../src/img/icon/person.svg" 
                            alt = "Icon person" 
                        />
                    </span>
                    <input
                        class = "container__form--input"
                        type = "text" 
                        placeholder = "Nombres" 
                        name = "first-name"
                    />
                </div>
                <div class = "container__form--data">
                    <label class = "container__form--label">
                        Apellidos
                    </label>
                    <span class = "container__form--icon">
                        <img
                            src = "../../src/img/icon/person.svg" 
                            alt = "Icon person" 
                        />
                    </span>
                    <input 
                        class = "container__form--input" 
                        type = "text" 
                        placeholder = "Apellidos" 
                        name = "last-name"
                    />
                </div>
                <div class = "container__form--data">
                    <label class = "container__form--label">
                        Nombre de Usuario
                    </label>
                    <span class = "container__form--icon">
                        <img 
                            src = "../../src/img/icon/person.svg" 
                            alt = "Icon person" 
                        />
                    </span>
                    <input 
                        class = "container__form--input" 
                        type = "text" placeholder = "Nombre de Usuario" 
                        name = "username"
                    />
                </div>
                <div class = "container__form--data">
                    <label class = "container__form--label">
                        Password
                    </label>
                    <span class = "container__form--icon">
                        <img 
                            src = "../../src/img/icon/password.svg" 
                            alt = "Icon password" 
                        />
                    </span>
                    <input 
                        class = "container__form--input" 
                        type = "text" placeholder = "Password" 
                        name = "password"
                    />
                </div>
                <div class = "container__form--data">
                    <label class = "container__form--label">
                        Email
                    </label>
                    <span class = "container__form--icon">
                        <img 
                            src = "../../src/img/icon/mail.svg" 
                            alt = "Icon mail" 
                        />
                    </span>
                    <input 
                        class = "container__form--input" 
                        type = "email" 
                        placeholder = "Email" 
                        name = "email"
                    />
                </div>
                <div class = "container__form--data">
                    <label class = "container__form--label">
                        Tipo
                    </label>
                    <span class = "container__form--icon">
                        <img 
                            src = "../../src/img/icon/admin.svg" 
                            alt = "Icon type" 
                        />
                    </span>
                    <select 
                        class = "container__form--select" 
                        name = "is-super-user"
                    >
                        <option>--Seleccione--</option>
                        <option value = "1">Admin</option>
                        <option value = "0">User</option>
                    </select>
                </div>
                <div class = "container__form--data">
                    <button class = "container__form--button">
                        Registrar
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>

