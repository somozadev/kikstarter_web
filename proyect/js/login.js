function SetFormMsg(formElement, type, msg) {
    const msgElement = formElement.querySelector(".form__message");
    msgElement.textContent = msg;
    msgElement.classList.remove("form__message--success", "form__message--error");
    msgElement.classList.add('form__message--' + type);
}
function SetInputError(inputElement, msg) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = msg;
}
function ResetInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}
function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
        return true;
    else
        return false;
}
function ValidatePasswords(){
    // console.log(document.querySelector("#registerPassword").value);
    // console.log(document.querySelector("#confirmRegisterPassword").value);
    if(document.querySelector("#registerPassword").value === document.querySelector("#confirmRegisterPassword").value)
        return true;
    else
        return false;
}
document.addEventListener("DOMContentLoaded", () => {

    const loginForm = document.querySelector("#login");
    const registerForm = document.querySelector("#register");

    //document.querySelector("#linkRegister").addEventListener("click", e => { //cuando se de a registrar, esconder el form de login y mostrar el de registro
    //    e.preventDefault();
    //    loginForm.classList.add("form--hidden");
    //    registerForm.classList.remove("form--hidden");
    //});
//
    //document.querySelector("#linkLogin").addEventListener("click", e => {//cuando se de a login, esconder el form de registro y mostrar el de login
    //    e.preventDefault();
    //    loginForm.classList.remove("form--hidden");
    //    registerForm.classList.add("form--hidden");
    //    SetFormMsg(loginForm, "", "");
    //});

   // loginForm.addEventListener("submit", e => {
   //     e.preventDefault();
   //     //ajax login?
   //     SetFormMsg(loginForm, "error", "usuario/contraseña incorrectos");
   // });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {

            if (e.target.id === "registerUsername") {
                if (e.target.value == "") {
                    SetInputError(inputElement, "escribe nombre de usuario");
                }
                else if (String(e.target.value).length > 12) {
                    SetInputError(inputElement, "12 carácteres son el máximo");
                }

                //check si existe otro usuario!!!!
            }
            if (e.target.id === "registerEmail") {
                if (e.target.value == "") {
                    SetInputError(inputElement, "escribe email");
                }
                if (!ValidateEmail(e.target.value)) {
                    SetInputError(inputElement, "email no válido");
                }
            }
            if (e.target.id === "registerPassword") {
                if (e.target.value == "") {
                    SetInputError(inputElement, "escribe contraseña");
                }
                if (String(e.target.value).length < 6) {
                    SetInputError(inputElement, "6 carácteres como mínimo");
                }
                
                //check pwdCompro

            }
            if (e.target.id === "confirmRegisterPassword") {
                if (e.target.value == "") {
                    SetInputError(inputElement, "escribe contraseña");
                }
                if (String(e.target.value).length < 6) {
                    SetInputError(inputElement, "6 carácteres como mínimo");
                }if(!ValidatePasswords()){
                    
                    SetInputError(inputElement, "las contraseñas deben ser iguales");
                }
                //check pwdCompro
                
            }
        });

        inputElement.addEventListener("input", e => {
            ResetInputError(inputElement);

        });
    });
})
