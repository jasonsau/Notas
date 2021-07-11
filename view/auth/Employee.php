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
</head>

<body>
    <?php
    require_once "../static/header.php";
    ?>
    <!-- Modal para el registro del Empleado-->
    <?php require_once "./register.php" ?>

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
                        id = "search-employee"
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
            <table class="main-container__table">
                <thead class="main-container__thead">
                    <th class="main-container__th">Num</th>
                    <th class="main-container__th">Dui</th>
                    <th class="main-container__th">Nombre</th>
                    <th class="main-container__th">Email</th>
                    <th class="main-container__th">Cargo</th>
                    <th class="main-container__th">Opciones</th>
                </thead>
                <tbody>
                    <tr class = "main-container__tr">
                        <td class = "main-container__td">
                            1
                        </td>
                        <td class = "main-container__td">
                            05909622-2
                        </td>
                        <td class = "main-container__td">
                            Jason Saul Martinez Argueta
                        </td>
                        <td class = "main-container__td">
                            jason.guerra253@gmail.com
                        </td>
                        <td class = "main-container__td">
                            Maestro
                        </td>
                        <td class = "main-container__td">
                            <span class = "main-container__span">
                                <img 
                                    class = "main-container__img"
                                    src = "../../src/img/icon/edit_white.svg" 
                                />
                            </span>
                            <span class = "main-container__span--alert">
                                <img 
                                    class = "main-container__img--alert"
                                    src = "../../src/img/icon/delete_white.svg" 
                                />
                            </span>
                        </td>
                    <tr class = "main-container__tr">
                        <td class = "main-container__td">
                            1
                        </td>
                        <td class = "main-container__td">
                            05909622-2
                        </td>
                        <td class = "main-container__td">
                            Jason Saul Martinez Argueta
                        </td>
                        <td class = "main-container__td">
                            jason.guerra253@gmail.com
                        </td>
                        <td class = "main-container__td">
                            Maestro
                        </td>
                        <td class = "main-container__td">
                            <span class = "main-container__span">
                                <img 
                                    class = "main-container__img"
                                    src = "../../src/img/icon/edit_white.svg" 
                                />
                            </span>
                            <span class = "main-container__span--alert">
                                <img 
                                    class = "main-container__img--alert"
                                    src = "../../src/img/icon/delete_white.svg" 
                                />
                            </span>
                        </td>
                    </tr>
                    <tr class = "main-container__tr">
                        <td class = "main-container__td">
                            1
                        </td>
                        <td class = "main-container__td">
                            05909622-2
                        </td>
                        <td class = "main-container__td">
                            Jason Saul Martinez Argueta
                        </td>
                        <td class = "main-container__td">
                            jason.guerra253@gmail.com
                        </td>
                        <td class = "main-container__td">
                            Secretario
                        </td>
                        <td class = "main-container__td">
                            <span class = "main-container__span">
                                <img 
                                    class = "main-container__img"
                                    src = "../../src/img/icon/edit_white.svg" 
                                />
                            </span>
                            <span class = "main-container__span--alert">
                                <img 
                                    class = "main-container__img--alert"
                                    src = "../../src/img/icon/delete_white.svg" 
                                />
                            </span>
                        </td>
                    </tr>
                    <tr class = "main-container__tr">
                        <td class = "main-container__td">
                            1
                        </td>
                        <td class = "main-container__td">
                            05909622-2
                        </td>
                        <td class = "main-container__td">
                            Jason Saul Martinez Argueta
                        </td>
                        <td class = "main-container__td">
                            jason.guerra253@gmail.com
                        </td>
                        <td class = "main-container__td">
                            Maestro
                        </td>
                        <td class = "main-container__td">
                            <span class = "main-container__span">
                                <img 
                                    class = "main-container__img"
                                    src = "../../src/img/icon/edit_white.svg" 
                                />
                            </span>
                            <span class = "main-container__span--alert">
                                <img 
                                    class = "main-container__img--alert"
                                    src = "../../src/img/icon/delete_white.svg" 
                                />
                            </span>
                        </td>
                    </tr>
                    <tr class = "main-container__tr">
                        <td class = "main-container__td">
                            1
                        </td>
                        <td class = "main-container__td">
                            05909622-2
                        </td>
                        <td class = "main-container__td">
                            Jason Saul Martinez Argueta
                        </td>
                        <td class = "main-container__td">
                            jason.guerra253@gmail.com
                        </td>
                        <td class = "main-container__td">
                            7533-0538
                        </td>
                        <td class = "main-container__td">
                            <span class = "main-container__span">
                                <img 
                                    class = "main-container__img"
                                    src = "../../src/img/icon/edit_white.svg" 
                                />
                            </span>
                            <span class = "main-container__span--alert">
                                <img 
                                    class = "main-container__img--alert"
                                    src = "../../src/img/icon/delete_white.svg" 
                                />
                            </span>
                        </td>
                    </tr>
                    <tr class = "main-container__tr">
                        <td class = "main-container__td">
                            1
                        </td>
                        <td class = "main-container__td">
                            05909622-2
                        </td>
                        <td class = "main-container__td">
                            Jason Saul Martinez Argueta
                        </td>
                        <td class = "main-container__td">
                            jason.guerra253@gmail.com
                        </td>
                        <td class = "main-container__td">
                            7533-0538
                        </td>
                        <td class = "main-container__td">
                            <span class = "main-container__span">
                                <img 
                                    class = "main-container__img"
                                    src = "../../src/img/icon/edit_white.svg" 
                                />
                            </span>
                            <span class = "main-container__span--alert">
                                <img 
                                    class = "main-container__img--alert"
                                    src = "../../src/img/icon/delete_white.svg" 
                                />
                            </span>
                        </td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script src = "../../src/js/index.js"></script>
    <script src = "../../src/js/register.js"></script>
</body>

</html>