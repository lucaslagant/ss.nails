const checkPassword = (event) => {
    event.preventDefault();
    let password = document.getElementById('password');
    let confirmPassword = document.getElementById('confirmPassword');

    if(confirmPassword.value != password.value){
        document.getElementById('errorPassword').innerHTML = 'Les mots de passe ne correspondent pas';
    } else {
        formRegister.submit();
    }

}
formRegister = document.getElementById('formRegister');

formRegister.addEventListener('submit', checkPassword);
