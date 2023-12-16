let form = document.getElementById('forms');
let button = document.getElementById('btn');
let fullName = document.getElementById('fullname');
let mail = document.getElementById('mail');
let phoneNo = document.getElementById('pno');
let password = document.getElementById('password');
let confirmPassword = document.getElementById('confirmpassword');
let address = document.getElementById('adrs');

let validateSuccess = true;

let nameValidate;
let phoneNoValidate;
let mailValidate;
let passwordValidate;
let lengthValidate;


function errorInput(input,message){
    let formGroup = input.parentElement;
    formGroup.className = "form-group error";
    formGroup.querySelector("p").innerText = message;
}
function getName(input){
    return input.getAttribute("data-name");
}
function success(input){
    let parentClass = input.parentElement;
    parentClass.classList.remove("error");

}
function checkName(fullName){
    if(fullName.value.trim() === ""){
        errorInput(fullName,`${getName(fullName)} is Required`)
        nameValidate = false;
    }
    else if(fullName.value.trim()){
        success(fullName)
        nameValidate = true;
    }
    return nameValidate
}
function checkAddress(address){
    if(address.value.trim() === ""){
        errorInput(address,`${getName(address)} is Required`)
        addressValidate = false;
    }
    else if(address.value.trim()){
        success(address)
        addressValidate = true;
    }
    return addressValidate
}
function checkPhoneNumber(phoneNo){
    if(phoneNo.value.trim() === ""){
        errorInput(phoneNo,`${getName(phoneNo)} is Required`);
        phoneNoValidate = false;
    }
    else if(phoneNo.value.trim()){
        success(phoneNo)
        phoneNoValidate = true;
    }
    return phoneNoValidate;
}

function lengthPassword(input,min,max){
    let length = input.value.trim().length;
    if(length < min){
        errorInput(input,`${getName(input)} is must be atleast greater than ${min} charecters`);
        lengthValidate = false;
    }
    if(length > max){
        errorInput(input,`${getName(input)} is must be atleast less than ${max} charecters`);
        lengthValidate = false;
    }
    if(length < max && length > min){
        success(input)
        lengthValidate = true;
    }
    return lengthValidate;
}
function checkConfirmation(password,confirmPassword){
    let passwordValue = password.value.trim();
    let confirmPasswordValue = confirmPassword.value.trim();

    if(password.value.trim() === ""){
        errorInput(password,`password is Required`)
        passwordValidate = false;
    }
    if(confirmPassword.value.trim() === ""){
        errorInput(confirmPassword,`confirmation password is Required`)
        passwordValidate = false;
    }
    else if(confirmPassword.value.trim()){
        success(confirmPassword)
        passwordValidate = true;
    }
    if(passwordValue !== confirmPasswordValue){
        errorInput(confirmPassword,`password not match`)
        passwordValidate = false;
    }
    return passwordValidate;
    
}
function validMail(mail){
    return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()\.,;\s@\"]+\.{0,1})+([^<>()\.,;:\s@\"]{2,}|[\d\.]+))$/.test(mail);
}
function checkEmail(mail){
    if(mail.value.trim() === ""){
        errorInput(mail, `Email is Required`);
        mailValidate = false;

    }
    else if(!validMail(mail.value.trim())){
        errorInput(mail,`This is not a valid email address`);
        mailValidate = false;
    }
    else if(validMail(mail.value.trim())){
        success(mail);
        mailValidate = true;
    }
    return mailValidate;
}

function validateFormElements([fullName,mail,phoneNo,address,password,confirmPassword]){
    checkConfirmation(password,confirmPassword)
    checkName(fullName)
    checkPhoneNumber(phoneNo)
    lengthPassword(password,8,12)
    checkEmail(mail)
    checkAddress(address)

    if(nameValidate && nameValidate && phoneNoValidate && mailValidate && passwordValidate && lengthValidate && addressValidate == true){
        validateSuccess = true;
    }
    else{
        validateSuccess = false;
    }
    return validateSuccess;
}   
button.addEventListener("click", (e) => {

    if(!validateFormElements([fullName,mail,phoneNo,address,password,confirmPassword])){
        e.preventDefault();
    }
    
})