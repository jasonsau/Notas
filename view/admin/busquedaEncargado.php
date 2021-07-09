<div class = "container__encargado" id = "container-search-id">
    <h2 class = "subtitle">Busqueda de Encargado</h2>
    <form class = "form__encargado">
        <div class = "form__student--data">
            <label class = "form__student--label">Dui</label>
            <input 
                class = "form__student--input" 
                type = "text" 
                name = "dui"
                readonly = "true";
                id = "dui-readonly"
            />
        </div>
        <div class = "form__student--data">
            <label class = "form__student--label">Nombre Encargado</label>
            <input 
                class = "form__student--input" 
                type = "text" 
                name = "nombre-encargado"
                readonly = "true"
                id = "nombre-encargado-readonly"
            />
        </div>
        <div class = "form__student--data">
            <label class = "form__student--label">Direccion</label>
            <input 
                class = "form__student--input" 
                type = "text" 
                name = "direccion-encargado" 
                readonly = "true"
                id = "direccion-encargado-readonly"
            />
        </div>
        <div class = "form__student--data">
            <label class = "form__student--label">Parentesco</label>
            <input 
                class = "form__student--input"
                type = "text"
                name = "parentesco-encargado"
                readonly = "true"
                id = "parentesco-encargado-readonly"
            />
        </div>
        <div class = "form__student--table" id = "form-student-table-id">
            <label class = "form_student--label--table">Hijos</label>
            <table class = "table">
                <thead class = "table__thead">
                    <tr class = "table_thead--tr">
                        <th class = "table__thead--th">Nie</th>
                        <th class = "table__thead--th">Nombre</th>
                        <th class = "table__thead--th">Grado</th>
                    </tr>
                </thead>
                <tbody id=  "tbody-id">
                    
                </tbody>
            </table>
        </div>
        <div class = "form__student--data">
            <button 
                id = "ok-encargado-id"
                class = "form__student--button"
            >
                OK
            </button>
        </div>
    </form>
</div>
