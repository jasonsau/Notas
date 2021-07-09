<div class = "container__encargado" id = "container-encargado-id">
    <h2 class = "subtitle">Registro de Encargado</h2>
    <form class = "form__encargado" method="POST" id = "form-encargado-id">
        <div class = "form__student--data">
            <label class = "form__student--label" for = "dui-encargado-id">Dui</label>
            <input 
                class = "form__student--input" 
                type = "text" 
                name = "dui-encargado" 
                id = "dui-encargado-id" 
            />
        </div>
        <div class = "form__student--data">
            <label class = "form__student--label">Nombre Encargado</label>
            <input 
                class = "form__student--input" 
                type = "text" 
                name = "nombre-encargado"
                id = "nombre-encargado-id"
            />
        </div>
        <div class = "form__student--data">
            <label class = "form__student--label">Direccion</label>
            <input 
                class = "form__student--input" 
                type = "text" 
                name = "direccion-encargado" 
                id = "direccion-encargado-id"
            />
        </div>
        <div class = "form__student--data">
            <label class = "form__student--label">Parentesco</label>
            <select name = "parentesco" class = "form__student--select" id = "parentesco-id">
                <option>--Seleccione--</option>
                <option value = "Papa">Papa</option>
                <option value = "Mama">Mama</option>
                <option value = "Familiar Cercano">Familar Cercano</option>
            </select>
        </div>
        <div class = "form__student--data">
            <button 
                class = "form__student--button" 
                id = "button-register-id"
            >
                Registrar
            </button>
            <button 
                class = "form__student--button" 
                id = "button-cancelar-id"
            >
                Cancelar
            </button>
        </div>
    </form>
</div>
