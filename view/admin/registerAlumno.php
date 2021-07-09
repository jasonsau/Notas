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
        <link rel = "stylesheet" href = "../../src/css/alert/styles.css" />
        <link rel = "stylesheet" href = "../../src/css/header/style.css" />
        <link rel = "stylesheet" href = "../../src/css/registerAlumno/style.css" />
    </head>
    <body>
        <?php
        include_once("../static/header.php");
        ?>
        <h2 class = "subtitle">Registro Alumno</h2>
        <div class = "container__form" id = "container-form-id">
            <!--Para Registrar un nuevo encargado  y busqueda del encargado-->
                <?php 
                    include_once("registerEncargado.php");
                    include_once("../admin/busquedaEncargado.php");
                ?>
            <!-- Fin -->
            <form 
                id = "form-student-id"
                name = "form-student-name"
                class = "form__student"
                method = "POST"
                enctype = "multipart/form-data"
            >
                <!-- Inicion del Modal alert -->
                <div id = "alert" class = "container">
                    <h2 id = "title-alert" class = "title">Register Encargado</h2>
                    <p id = "content-id" class = "content">Mensaje de Respuesta</p>
                    <button id = "button-alert" class = "button-message">OK</button>
                </div>
                <!-- Fin del Modal Alert -->

                <div class = "form__student--data">
                    <label class = "form__student--label">Nie</label>
                    <input class = "form__student--input" type = "text" id = "nie-id" name = "nie"/>
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Nombre Alumno</label>
                    <input
                        class = "form__student--input" 
                        type = "text" 
                        id = "nombre-alumno-id" 
                        name = "nombre-alumno"
                    />
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Apelidos Alumno</label>
                    <input 
                        class = "form__student--input" 
                        type = "text" 
                        name = apellido-alumno
                        id = "apellido-alumno-id"
                    />
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Fecha de Nacimiento</label>
                    <input 
                        class = "form__student--input" 
                        type = "date" 
                        name = "fecha-nacimiento-alumno"
                        id = "fecha-nacimi-alumno-id"
                    />
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Direccion</label>
                    <input class = "form__student--input" type = "text" name = "direccion-alumno" />
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Dui Encargado</label>
                    <input 
                        class = "form__student--input" 
                        type = "text" 
                        name = "dui-encargado" 
                        id = "dui-encargado-alu"     
                    />
                    <img 
                        class = "form__student--icon--plus" 
                        src = "../../src/img/icon/seach.svg"
                        alt = "Ver mas de el encargado" 
                        id = "icon-search-id"
                    />
                    <img 
                        class = "form__student--icon--plus" 
                        src = "../../src/img/icon/plus.svg" 
                        alt = "Registrar un nuevo encargado" 
                        id = "icon-create-id"
                    />
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Especialidad</label>
                    <select 
                        name = "especialidad" 
                        class = "form__student--select"
                    >
                        <option>--Seleccione--</option>
                    </select>
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Nivel</label>
                    <select name = "nivel" class = "form__student--select">
                        <option>--Seleccione--</option>
                    </select>
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Seccion</label>
                    <select name = "seccion" class = "form__student--select">
                        <option>--Seleccione--</option>
                    </select>
                </div>
                <div class = "form__student--data">
                    <label class = "form__student--label">Foto</label>
                    <input class = "form__student--input" type = "file" />
                </div>
                
                <button class = "form__student--button">Registrar</button>
            </form>
        </div>
    </body>
    <script src = "../../src/js/alumno.js"></script>
    <script src = "../../src/js/index.js"></script>
</html>
