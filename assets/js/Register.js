const checkPassword = (event) => {
    event.preventDefault();
    let password = document.getElementById('password');
    let passwordConfirm = document.getElementById('passwordConfirm');

    if(passwordConfirm.value != password.value){
        document.getElementById('errorPassword').innerHTML = 'Les mots de passe ne correspondent pas';
    } else {
        formRegister.submit();
    }

}
formRegister = document.getElementById('formRegister');

formRegister.addEventListener('submit', checkPassword);
