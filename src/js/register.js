//Variables for Register and Validation
const employeeName = document.getElementById('employee-name-id');
const employeeLastName = document.getElementById('employee-last-name-id');
const employeeDui = document.getElementById('employee-dui-id');
const employeeAddress = document.getElementById('employee-address-id');
const employeeDateBirthday = document.getElementById('employee-date-birthday-id');
const employeeEmail = document.getElementById('employee-email-id');
const employeeCellphone = document.getElementById('employee-cellphone-id');
const employeeWork = document.getElementById('work-position-id');

const registerEmployeeModal = document.getElementById(
    'register-employee-modal');
const containerModalId = document.getElementById('container-modal-id');
const containerModalClose = document.getElementById('container-modal-span-id');
const buttonRegisterEmployee = document.getElementById('button-register-employee-id');
const mainTbody = document.getElementById('main-container__tbody');
const searchId = document.getElementById('search-employee-id');

//Variables for delete employee
const containerDelete = document.getElementById('container-delete-id');
const titleDeleteEmployee = document.getElementById('title-delete');
const contentDeleteEmpleyee = document.getElementById('content-delete-id');
const buttonDeleteEmployee = document.getElementById('button-delete');
const buttonDeleteCancelEmployee = document.getElementById('button-delete-cancel');


mainTbody.addEventListener('click', (e) => {
    if(e.target.getAttribute('option') === 'edit-employee') {
        console.log(e.target.getAttribute('value'));
        console.log("Editacion del empleado");
    }
    if(e.target.getAttribute('option') === 'delete-employee') {
        console.log(e.target.getAttribute('value'));
        const element = e.target.parentNode.parentNode.parentNode.childNodes[2];
        contentDeleteEmpleyee.innerHTML = element.innerHTML;
        contentDeleteEmpleyee.setAttribute('employee-id', e.target.getAttribute('value'));
        containerDelete.classList.add('show-error-modal');
    }
});

buttonDeleteEmployee.addEventListener('click', (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append('function', 'delete-employee');
    formData.append('employee-id', parseInt(contentDeleteEmpleyee.getAttribute('employee-id')));
    fetch('../../Controller/EmployeeController.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data === "Deleted") {
            mainTbody.innerHTML = "";
            showEmployees();
            console.log(data);
            containerDelete.classList.remove('show-error-modal');
        }
    })
    .catch(error => console.log(error));
});


let valueErrors = {
    "name": false,
    "lastName": false,
    "dui": false,
    "address": false,
    "dateBirthday": false,
    "email": false,
    "cellphone": false,
    "workPosition": false
}
//Variables for error
const errorContainer = document.getElementById('container-error-id');
const errorTitle = document.getElementById('title-error-id');
const errorContent = document.getElementById('content-error-id');
const buttonError = document.getElementById('button-alert');

//Variables for errorBlock
const errorDui = document.getElementById('error-dui');
const errorAddress = document.getElementById('error-address');
const errorDate = document.getElementById('error-date');
const errorEmail = document.getElementById('error-email');
const errorCellphone = document.getElementById('error-cellphone');
const errorPosition = document.getElementById('error-position');
const errorName = document.getElementById('error-name');
const errorLastName = document.getElementById('error-last-name');


//Events for validation 
employeeName.addEventListener('input', () => {
    const regularExpression = /\d/g;
    let valueTemp = employeeName.value;
    employeeName.value = valueTemp.replaceAll(regularExpression, "");
});

employeeName.addEventListener('blur', (e) => {
    showErrorBlockInput(e.target, "nombre", errorName, "name");
});

employeeLastName.addEventListener('input', () => {
    const regularExpression = /\d/g;
    let valueTemp = employeeLastName.value;
    employeeLastName.value = valueTemp.replaceAll(regularExpression, "");
});

employeeLastName.addEventListener('blur', (e) => {
    showErrorBlockInput(e.target, "apellido", errorLastName, "lastName");
});

employeeDui.addEventListener('input', () => {
    const regularExpression = /\D/g;
    let valueTemp = employeeDui.value;
    employeeDui.value = valueTemp.replaceAll(regularExpression, "");
});

employeeDui.addEventListener('blur', (e) => {
    showErrorBlockInput(e.target, "un dui", errorDui, "dui");
});

employeeAddress.addEventListener('blur', (e) => {
    showErrorBlockInput(e.target, "una direccion", errorAddress, "address");
});

employeeDateBirthday.addEventListener('blur', (e) =>{
    showErrorBlockInput(e.target, "una fecha", errorDate, "dateBirthday");
});

employeeEmail.addEventListener('blur', (e) => {
    showErrorBlockInput(e.target, "un email", errorEmail, "email");
});

employeeCellphone.addEventListener('blur', (e) => {
    showErrorBlockInput(e.target, "u numero de telefono", errorCellphone, "cellphone");
});

employeeWork.addEventListener('blur', (e) => {
    showErrorBlockSelect(e.target, errorPosition, "workPosition");
});


function showErrorBlockInput(e, campo, errorBlock, campoObject) {
    if(e.value === "") {
        errorBlock.innerHTML = `Debe ingresar ${campo}`;
        errorBlock.classList.add('show-error-block');
        valueErrors[campoObject] = false;
    } else {
        errorBlock.classList.remove('show-error-block');
        valueErrors[campoObject] = true;
    }
}

function showErrorBlockSelect(e, errorBlock, campoObject) {
    if(e.value === "", e.value === "--Seleccione--") {
        errorBlock.innerHTML = `Debe de seleccionar un campo`;
        errorBlock.classList.add('show-error-block');
        valueErrors[campoObject] = false;
    } else {
        errorBlock.classList.remove('show-error-block');
        valueErrors[campoObject] = true;
    }
}


registerEmployeeModal.addEventListener('click', (e) => {
    e.preventDefault();
    containerModalId.classList.add('show-modal');
    containerModalId.classList.remove('hidden-modal');
});

containerModalClose.addEventListener('click', () => {
    containerModalId.classList.add('hidden-modal');
    containerModalId.classList.remove('show-modal');
    cleanCamps();

});

//Events for Buttons
buttonRegisterEmployee.addEventListener('click', (e) => {
    e.preventDefault();
    RegisterNewEmployee();
});

buttonError.addEventListener('click', (e) => {
    e.preventDefault();
    errorContainer.classList.remove('show-error-modal');
})



//Conexion for DataBase
function RegisterNewEmployee() {
    if(valueErrors.name && valueErrors.lastName && valueErrors.dui && 
    valueErrors.address && valueErrors.dateBirthday, valueErrors.email &&
    valueErrors.cellphone && valueErrors.workPosition) {

        const registerEmployeeId = document.getElementById('form-register-employee-id');
        const formData = new FormData(registerEmployeeId);
        formData.append('function', 'register');
        fetch('../../Controller/EmployeeController.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data =>{
            if(data === "User registered") {
                mainTbody.innerHTML = "";
                showEmployees();
                console.log(data);
                showErrorModal("Registro", "Se ha registrado");
                containerModalId.classList.add('hidden-modal');
                containerModalId.classList.remove('show-modal');
                cleanCamps();
            } else {
                if(data === "Exits email") {
                    showErrorModal("Error", "Ya se encuentra un registro con ese email");
                }
                else {
                    if(data === "Exits dui") {
                        showErrorModal("Error", "Ya se encuentrta un registro con ese dui");
                    }
                }
            }
        })
        .catch(error => console.log(error));

    } else {
        valueErrors.name === false ? showErrorBlockInput(employeeName, "un nombre", errorName, "name"): "";
        valueErrors.lastName === false ? showErrorBlockInput(employeeLastName, "un apellido", errorLastName, "lastName"): "";
        valueErrors.dui === false ? showErrorBlockInput(employeeDui, "un dui", errorDui, "dui"): "";
        valueErrors.address === false ? showErrorBlockInput(employeeAddress, "una direccion", errorAddress, "address"): "";
        valueErrors.dateBirthday === false ? showErrorBlockInput(employeeDateBirthday, "una fecha de nacimiento", errorDate, ""): "";
        valueErrors.email === false ? showErrorBlockInput(employeeEmail, "un email", errorEmail, "email"): "";
        valueErrors.cellphone === false ? showErrorBlockInput(employeeCellphone, "un telefono", errorCellphone, "cellphone"): "";
        valueErrors.workPosition === false ? showErrorBlockSelect(employeeWork, errorPosition, "workPosition"): "";
        showErrorModal("Error", "Uno de los campos esta vacio");
    }
}


function showErrorModal(title, message) {
    errorTitle.innerHTML = title;
    errorContent.innerHTML = message;
    errorContainer.classList.add('show-error-modal');
}

function cleanCamps() {
    employeeName.value = "";
    employeeLastName.value = "";
    employeeDui.value = "";
    employeeAddress.value = "";
    employeeDateBirthday.value = "";
    employeeEmail.value = "";
    employeeCellphone.value = "";
    employeeWork.value = "";
    errorName.classList.remove('show-error-block');
    errorLastName.classList.remove('show-error-block');
    errorDui.classList.remove('show-error-block');
    errorAddress.classList.remove('show-error-block');
    errorDate.classList.remove('show-error-block');
    errorEmail.classList.remove('show-error-block');
    errorCellphone.classList.remove('show-error-block');
    errorPosition.classList.remove('show-error-block');
}

function showEmployees() {
    formData = new FormData();
    formData.append('function', 'show-employees');
    fetch('../../Controller/EmployeeController.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
            createTbody(data);
        })
    .catch(error => console.log(error));
}

function createTbody(data) {
    const fragment = document.createDocumentFragment();
    data.forEach(da => {
        const tr = document.createElement('tr');
        tr.classList.add('main-container__tr');

        const tdNum = document.createElement('td');
        tdNum.classList.add('main-container__td');
        const tdDui= document.createElement('td');
        tdDui.classList.add('main-container__td');
        tdDui.innerHTML = da.employeeDui;
        const tdName = document.createElement('td');
        tdName.classList.add('main-container__td');
        tdName.innerHTML = `${da.employeeName} ${da.employeeLastName}`;
        const tdEmail = document.createElement('td');
        tdEmail.classList.add('main-container__td');
        tdEmail.innerHTML = da.employeeEmail;
        const tdWork = document.createElement('td');
        tdWork.classList.add('main-container__td');
        tdWork.innerHTML = da.workPositionName;
        const tdOption = document.createElement('td');
        tdOption.classList.add('main-container__td');
        const spanEdit = document.createElement('span');
        spanEdit.classList.add('main-container__span');
        const imgEdit = document.createElement('img');
        imgEdit.classList.add('main-container__img');
        imgEdit.setAttribute('src', '../../src/img/icon/edit_white.svg');
        imgEdit.setAttribute('option', 'edit-employee');
        imgEdit.setAttribute('value', da.employeeId);
        spanEdit.appendChild(imgEdit);
        spanEdit.setAttribute('value', da.employeeId);
        spanEdit.setAttribute('option', 'edit-employee');
        const spanDelete = document.createElement('span');
        spanDelete.classList.add('main-container__span--alert');
        const imgDelete = document.createElement('img');
        imgDelete.classList.add('main-container__img');
        imgDelete.setAttribute('src', '../../src/img/icon/delete_white.svg');
        imgDelete.setAttribute('option', 'delete-employee');
        imgDelete.setAttribute('value', da.employeeId);
        spanDelete.appendChild(imgDelete);
        spanDelete.setAttribute('value', da.employeeId);
        spanDelete.setAttribute('option', 'delete-employee');
        tdOption.appendChild(spanEdit);
        tdOption.appendChild(spanDelete);

        tr.appendChild(tdNum);
        tr.appendChild(tdDui);
        tr.appendChild(tdName);
        tr.appendChild(tdEmail);
        tr.appendChild(tdWork);
        tr.appendChild(tdOption);
        fragment.appendChild(tr);
    });
    mainTbody.appendChild(fragment);

}

showEmployees();
