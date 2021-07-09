const iconCrearId = document.getElementById('icon-create-id');
const containerEncargadoId = document.getElementById('container-encargado-id');
const containerBusquedaId = document.getElementById('container-busqueda-id');
const containerFormId = document.getElementById('container-form-id');
const nieId = document.getElementById('nie-id');
const alertId = document.getElementById('alert');
const contentId = document.getElementById('content-id');
const titleAlert = document.getElementById('title-alert')
const duiEncargadoAlu = document.getElementById('dui-encargado-alu');

//Variables for busquedaEncargado
const duiReadonly = document.getElementById('dui-readonly');
const nombreEncargadoReadonly = document.getElementById('nombre-encargado-readonly');
const direccionEncargadoReadonly = document.getElementById('direccion-encargado-readonly');
const parentescoEncargadoReadonly = document.getElementById('parentesco-encargado-readonly');
const tbodyId = document.getElementById('tbody-id');
const formStudentTableId = document.getElementById('form-student-table-id');
const duiEncargadoAluId = duiEncargadoAlu;


//Variables Button
const iconSearchId = document.getElementById('icon-search-id');
const containerSearchId = document.getElementById('container-search-id');
const okButtonId = document.getElementById('ok-encargado-id');
const buttonCancelarId = document.getElementById('button-cancelar-id');
const buttonRegisterId = document.getElementById('button-register-id');
const buttonAlert = document.getElementById('button-alert');

//Variables for Register Parent
let duiEncargadoId = document.getElementById('dui-encargado-id');
let nombreEncargadoId = document.getElementById('nombre-encargado-id');
let direccionEencargadoId = document.getElementById('direccion-encargado-id');
let parentescoId = document.getElementById('parentesco-id');

let validateRegisterEncargado = {
    "dui": null,
    "nombre": null,
    "direccion": null,
    "parentesco": null
}


//Events
iconCrearId.addEventListener('click', () => {
    containerEncargadoId.classList.add('fade-in');
    containerEncargadoId.classList.remove('fade-out');
});

iconSearchId.addEventListener('click', () => {
    if(duiEncargadoAlu.value.length > 9) {
        SearchEncargado();
    } else {
        console.log("erro");
        ModalAlert("Error", "Debe de ingresar un dui correcto");
    }

});

buttonCancelarId.addEventListener('click', (e) => {
    e.preventDefault();
    containerEncargadoId.classList.remove('fade-in');
    containerEncargadoId.classList.add('fade-out');
});

okButtonId.addEventListener('click', (e) => {
    e.preventDefault();
    containerSearchId.classList.remove('fade-in');
    containerSearchId.classList.add('fade-out');
    duiReadonly.value = "";
    nombreEncargadoReadonly.value = "";
    direccionEncargadoReadonly.value = "";
    parentescoEncargadoReadonly.value = "";
    tbodyId.innerHTML = "";
});

buttonRegisterId.addEventListener('click', (e) => {
    e.preventDefault();
    RegisterEncargado();
});

duiEncargadoId.addEventListener('blur', (e) => {
    showErrorInput(e.target, 'dui');
});
duiEncargadoId.addEventListener('input', (e) => {
    let editable = true;
    let tempValue = "";
    const regular = /\D/g;
    tempValue = e.target.value.replaceAll(regular, "");
    e.target.value = tempValue;

    if (e.target.value.length === 4) {
        console.log("Entra al if");
        if(editable) {
            e.target.value += "-";
            editable = false;
        } else {
            editable = true;
        }
    }
    
});

nombreEncargadoId.addEventListener('blur', (e) => {
    showErrorInput(e.target, 'nombre');
});

nombreEncargadoId.addEventListener('input', (e) => {
    let regular = /\d/g;
    let tempValue = e.target.value.replaceAll(regular, "");
    e.target.value = tempValue;
})


direccionEencargadoId.addEventListener('blur', (e) => {
    showErrorInput(e.target, 'direccion');
});

parentescoId.addEventListener('blur', (e) => {
    showErrorSelect(e.target, 'parentesco');
});

function showErrorInput(input, valueValidate) {
    if(input.value === "") {
        input.classList.add('border-error');
        validateRegisterEncargado[valueValidate] = false;
    } else {
        input.classList.remove('border-error');
        validateRegisterEncargado[valueValidate] = true;
    }
}

function showErrorSelect(select, valueValidate) {
    if(select.value === "" || select.value === "--Seleccione--") {
        select.classList.add('border-error');
        validateRegisterEncargado[valueValidate] = false;
    } else {
        select.classList.remove('border-error');
        validateRegisterEncargado[valueValidate] = true;
    }
}

function RegisterEncargado() {
    if (validateRegisterEncargado.dui === true &&
        validateRegisterEncargado.nombre === true && 
        validateRegisterEncargado.direccion === true &&
        validateRegisterEncargado.parentesco === true 
    ) {
        const formElement = document.getElementById('form-encargado-id');
        const dataForm = new FormData(formElement);
        console.log(dataForm.get('nombre-encargado'));
        dataForm.append('function', 'register-encargado');
        fetch('../../Controller/EncargadoController.php', {
            method: 'POST',
            body: dataForm
        })
        .then(response => response.json())
        .then(data => {
            if(data == "Registrado") {
                containerEncargadoId.classList.remove('fade-in');
                containerEncargadoId.classList.add('fade-out');
                duiEncargadoAlu.value = dataForm.get('dui-encargado');
            }
            ModalAlert("Registro", data)
            console.log(data);
        })
        .catch(error => console.log(error));
    } else {
        showErrorInput(duiEncargadoId, 'dui');
        showErrorInput(nombreEncargadoId, 'nombre');
        showErrorInput(direccionEencargadoId, 'direccion');
        showErrorSelect(parentescoId, 'parentesco');
        ModalAlert("Error", "Uno de los campos no cumple los requerimientos");
    }
}

buttonAlert.addEventListener('click', (e) => {
    e.preventDefault();
    alertId.classList.remove('fade-in');
    alertId.classList.add('fade-out');
});

function SearchEncargado() {
    const dui = duiEncargadoAluId.value;
    const dataForm = new FormData();
    dataForm.append('dui', dui);
    dataForm.append('function', 'search-encargado');
    fetch('../../Controller/EncargadoController.php', {
        method: "POST",
        body: dataForm,
    })
    .then(response => response.json())
    .then(data => {
        if(data.length > 0){
            duiReadonly.value = data[0].dui;
            nombreEncargadoReadonly.value = data[0].nombre_encargado;
            direccionEncargadoReadonly.value = data[0].direcion;
            parentescoEncargadoReadonly.value = data[0].parentescto;
            if(data.length > 1) {
                formStudentTableId.style.display = "flex";
                const fragment = document.createDocumentFragment();
                data.forEach(da => {
                    InsertDataOnHtml(da, fragment);
                });
                console.log(fragment);
            }
            else {
                formStudentTableId.style.display = "none";
            }
            containerSearchId.classList.add('fade-in');
            containerSearchId.classList.remove('fade-out');
        }else {
            ModalAlert("Error", "No se ha encontrado el dui");
        }
    })
    .catch(error => console.log(error));
}

function InsertDataOnHtml(da, fragment) {
    const tr = document.createElement('tr');
    tr.classList.add('table__tbody--tr');
    const tdNie = document.createElement('td');
    tdNie.classList.add('table__tbody--td');
    tdNie.innerHTML = da.nie;
    const tdNombre = document.createElement('td');
    tdNombre.classList.add('table__tbody--td');
    tdNombre.innerHTML = `${da.nombre_alumno} ${da.apellidos_alumno}`;
    const tdGrado = document.createElement('td');
    tdGrado.classList.add('table__tbody--td');
    tdGrado.innerHTML = "General";
    tr.appendChild(tdNie);
    tr.appendChild(tdNombre);
    tr.appendChild(tdGrado);
    fragment.appendChild(tr);
    tbodyId.appendChild(fragment)
}

function ModalAlert(title, message) {
    contentId.innerHTML = message;
    titleAlert.innerHTML = title;
    alertId.classList.add('fade-in');
    alertId.classList.remove('fade-out');
};
