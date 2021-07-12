<!DOCTYPE html>
<html>

<head>
    <title>User</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE = edge" />
    <meta name="viewport" content="width = device-width, 
        initial-scale = 1.0" />
    <link rel="stylesheet" href="../../src/css/normalize/normalize.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../src/css/header/style.css" />
    <link rel="stylesheet" href="../../src/css/employee/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link 
        href="https://fonts.googleapis.com/css2?family=Alegreya:wght@500&display=swap" 
        rel="stylesheet" 
    />
    <link rel = "stylesheet" href = "../../src/css/register/styles.css" />
    <link rel = "stylesheet" href = "../../src/css/alert/styles.css" />
</head>

<body>
    <?php
    require_once "../static/header.php";
    ?>
    <!-- Modal para el registro del Empleado-->
    <?php require_once "./register.php" ?>

    <!-- Modal para el error-->

    <main class="main">
        <h2 class="main-title">Empleados</h2>
        <div class = "main-search">
            <form method = "POST" class = "main-form">
                <div class = "main-form__data">
                    <label class = "main-form__label">
                        <span class = "main-form__span">
                            <img src = "../../src/img/icon/seach.svg" />
                        </span>
                    </label>
                    <input 
                        class = "main-form__input" 
                        type = "search"
                        placeholder = "Busqueda"
                    />
                    <button 
                        class = "main-form__button"
                        id = "search-employee-id"
                    >
                        Buscar
                    </button>
                    <button 
                        class = "main-form__button"
                        id = "register-employee-modal"
                    >
                        Registrar
                    </button>
                </div>
            </form>
        </div>
        <div class="main-container">

            <div class = "container-error" id = "container-error-id">
                <h2 class = "container-error__title" id = "title-error-id">Register Encargado</h2>
                <p class = "container-error__content" id = "content-error-id">Mensaje de Respuesta</p>
                <button id = "button-alert" class = "container-error__button">OK</button>
            </div>
    
            <div id = "container-delete-id" class = "container-delete">
                <h2 class = "container-error-title" id = "title-delete">Desea eliminar el empleado</h2>
                <p class = "container-error__content" id = "content-delete-id">Mensaje de Respuesta</p>
                <button id = "button-delete" class = "container-error__button">Borrar</button>
                <button id = "button-delete-cancel" class = "container-error__button">Cancelar</button>

            </div>
            <table class="main-container__table">
                <thead class="main-container__thead">
                    <th class="main-container__th">Num</th>
                    <th class="main-container__th">Dui</th>
                    <th class="main-container__th">Nombre</th>
                    <th class="main-container__th">Email</th>
                    <th class="main-container__th">Cargo</th>
                    <th class="main-container__th">Opciones</th>
                </thead>
                <tbody id = "main-container__tbody">
                </tbody>
            </table>
        </div>
    </main>

    <script src = "../../src/js/index.js"></script>
    <script src = "../../src/js/register.js"></script>
</body>

</html>
