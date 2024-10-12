document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('eyepassword');
    const validationMessage = document.getElementById('campoOK');

    const regex = /^(?=.*\d)(?=.*[a-záéíóúüñ])(?=.*[A-ZÁÉÍÓÚÜÑ])(?=.*[._;:_,-])/;

    // Validar la contraseña mientras se escribe
    passwordInput.addEventListener('input', function () {
        if (regex.test(passwordInput.value)) {
            validationMessage.innerText = "válido";
            validationMessage.style.color = "green";
        } else {
            validationMessage.innerText = "incorrecto";
            validationMessage.style.color = "red";
        }
    });

    // Alternar la visibilidad de la contraseña al hacer clic en el icono
    passwordToggle.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Cambiar el ícono dependiendo de si se muestra o no la contraseña
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Selecciona los dos campos de contraseña y el mensaje de validación
    const passwordInput = document.getElementById('password');
    const passwordInput2 = document.getElementById('password2');
    const passwordToggle = document.getElementById('eyepassword2');
    const validationMessage = document.getElementById('campoOK2');

    // Validar mientras se escribe en el segundo campo de contraseña
    passwordInput2.addEventListener('input', function () {
        // Verifica si ambas contraseñas coinciden
        if (passwordInput.value === passwordInput2.value) {
            validationMessage.innerText = "Las contraseñas coinciden";
            validationMessage.style.color = "green";
        } else {
            validationMessage.innerText = "Las contraseñas no coinciden";
            validationMessage.style.color = "red";
        }

        // Alternar la visibilidad de la contraseña al hacer clic en el icono
        passwordToggle.addEventListener('click', function () {
            const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput2.setAttribute('type', type);

            // Cambiar el ícono dependiendo de si se muestra o no la contraseña
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    })
});
