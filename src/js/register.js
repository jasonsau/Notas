//Variables for Register
const employeeName = document.getElementById('employee-name');
const employeeLastName = document.getElementById('employee-last-name');
const employeeDui = document.getElementById('employee-dui');
const employeeAddress = document.getElementById('employee-address');
const employeeDateBirthday = document.getElementById('employee-date-birthday');
const employeeEmail = document.getElementById('employee-email');
const registerEmployeeModal = document.getElementById(
    'register-employee-modal');
const containerModalId = document.getElementById('container-modal-id');
const containerModalClose = document.getElementById('container-modal-span-id');

registerEmployeeModal.addEventListener('click', (e) => {
    e.preventDefault();
    containerModalId.classList.add('show-modal');
    containerModalId.classList.remove('hidden-modal');
})

containerModalClose.addEventListener('click', () => {
    containerModalId.classList.add('hidden-modal');
    containerModalId.classList.remove('show-modal');

})




