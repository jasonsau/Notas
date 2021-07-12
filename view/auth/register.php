<?php
require_once "../../Controller/WorkPositionController.php";

$data = ShowWorkPosition();
?>
<?php require_once "../static/header.php" ?>

<div class = "container-modal" id = "container-modal-id">
    <span 
        class = "container-modal__span--close"
        id = "container-modal-span-id"
    >
        <img src = "../../src/img/icon/close_white.svg" />
    </span>
    <h1 class = "title">Nuevo Empleado</h1>
    <form 
        class = "container-form" 
        method = "POST" 
        name = "form-register-employee"
        id = "form-register-employee-id"
    >
        <input type = "hidden" name = "register" value = "register"/>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-name">
                Esto es un error
            </div>
            <label class = "container-form__label">Nombres</label>
            <span class = "container-form__icon">
                <img 
                    src = "../../src/img/icon/person.svg" 
                    alt = "Icon person" 
                />
            </span>
            <input
                class = "container-form__input"
                type = "text" 
                placeholder = "Nombres de Empleado" 
                name = "employee-name"
                id = "employee-name-id"
            />
        </div>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-last-name">
                Esto es un error
            </div>
            <label class = "container-form__label">
                Apellidos
            </label>
            <span class = "container-form__icon">
                <img
                    src = "../../src/img/icon/person.svg" 
                    alt = "Icon person" 
                />
            </span>
            <input 
                class = "container-form__input" 
                type = "text" 
                placeholder = "Apellidos de Empleado" 
                name = "employee-last-name"
                id = "employee-last-name-id"
            />
        </div>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-dui">
                Esto es un error
            </div>
            <label class = "container-form__label">
                Dui
            </label>
            <span class = "container-form__icon">
                <img 
                    src = "../../src/img/icon/person.svg" 
                    alt = "Icon person" 
                />
            </span>
            <input 
                class = "container-form__input" 
                type = "text" placeholder = "Dui de Empleado" 
                name = "employee-dui"
                id = "employee-dui-id"
            />
        </div>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-address">
                Esto es un error
            </div>
            <label class = "container-form__label">
                Direccion
            </label>
            <span class = "container-form__icon">
                <img 
                    src = "../../src/img/icon/person.svg" 
                    alt = "Icon person" 
                />
            </span>
            <textarea 
                rows = 3
                class = "container-form__input--tex-area" 
                type = "text" placeholder = "Direccion de Empleado" 
                name = "employee-address"
                id = "employee-address-id"
            ></textarea>
        </div>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-date">
                Esto es un error
            </div>
            <label class = "container-form__label">
                Fecha de Nacimiento
            </label>
            <span class = "container-form__icon">
                <img 
                    src = "../../src/img/icon/date.svg" 
                    alt = "Icon date" 
                />
            </span>
            <input 
                class = "container-form__input" 
                type = "date" placeholder = "Password" 
                name = "employee-date-birthday"
                id = "employee-date-birthday-id"
            />
        </div>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-email">
                Esto es un error
            </div>
            <label class = "container-form__label">
                Email
            </label>
            <span class = "container-form__icon">
                <img 
                    src = "../../src/img/icon/mail.svg" 
                    alt = "Icon mail" 
                />
            </span>
            <input 
                class = "container-form__input" 
                type = "email" 
                placeholder = "Email" 
                name = "employee-email"
                id = "employee-email-id"
            />
        </div>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-cellphone">
                Esto es un error
            </div>
            <label class = "container-form__label">
                Telefono
            </label>
            <span class = "container-form__icon">
                <img 
                    src = "../../src/img/icon/cell.svg" 
                    alt = "Icon cellphone" 
                />
            </span>
            <input 
                class = "container-form__input" 
                type = "text" 
                placeholder = "Telefono" 
                name = "employee-cellphone"
                id = "employee-cellphone-id"
            />
        </div>
        <div class = "container-form__data">
            <div class = "container-form__error" id = "error-position">
                Esto es un error
            </div>
            <label class = "container-form__label">
                Tipo
            </label>
            <span class = "container-form__icon">
                <img 
                    src = "../../src/img/icon/admin.svg" 
                    alt = "Icon type" 
                />
            </span>
            <select 
                class = "container-form__select" 
                name = "work-position"
                id = "work-position-id"
            >
                <option>--Seleccione--</option>
                <?php foreach($data as $da) { ?>
                    <option 
                        value = "<?php echo $da['workPositionId'] ?>">
                        <?php echo $da['workPositionName'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class = "container-form__data">
            <button 
                class = "container-form__button"
                id = "button-register-employee-id"
            >
                Registrar
            </button>
        </div>
    </form>
</div>

