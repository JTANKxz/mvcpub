<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Cadastro</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #1a1b2f;
    color: #fff;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 400px;
}

.form-box {
    width: 100%;
    padding: 20px;
    background: #232447;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    color: #9166cc;
}

.input-group {
    position: relative;
    margin: 20px 0;
}

.input-group input {
    width: 100%;
    padding: 10px;
    background: transparent;
    border: none;
    border-bottom: 2px solid #555;
    color: #fff;
    outline: none;
    font-size: 16px;
    transition: border-color 0.3s;
}

.input-group input:focus {
    border-color: #9166cc;
}

.input-group label {
    position: absolute;
    top: 10px;
    left: 0;
    color: #888;
    pointer-events: none;
    transition: 0.3s;
}

.input-group input:focus ~ label,
.input-group input:valid ~ label {
    top: -15px;
    font-size: 12px;
    color: #9166cc;
}

button {
    width: 100%;
    padding: 10px;
    background: #9166cc;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #7b4bb7;
}

.toggle-form {
    margin-top: 15px;
    font-size: 14px;
    color: #bbb;
}

.toggle-form span {
    color: #9166cc;
    cursor: pointer;
    font-weight: bold;
}

.toggle-form span:hover {
    text-decoration: underline;
}

/* Esconder o formulário de cadastro inicialmente */
.hidden {
    display: none;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <!-- Formulário de Login -->
            <form id="login-form" action="/login" method="POST">
                <h2>Login</h2>

                <div class="input-group">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required>
                    <label>Senha</label>
                </div>

                <button type="submit">Entrar</button>

                <p class="toggle-form">Não tem uma conta? <span id="show-signup">Cadastre-se</span></p>
            </form>

            <!-- Formulário de Cadastro (inicialmente oculto) -->
            <form id="signup-form" action="/register" method="POST" class="hidden">
                <h2>Cadastro</h2>

                <div class="input-group">
                    <input type="email" name="email" required>
                    <label>Email</label>
                </div>

                <div class="input-group">
                    <input type="text" name="username" required>
                    <label>Usuário</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" required>
                    <label>Senha</label>
                </div>

                <button type="submit">Cadastrar</button>

                <p class="toggle-form">Já tem uma conta? <span id="show-login">Faça login</span></p>
            </form>
        </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");
    const showSignup = document.getElementById("show-signup");
    const showLogin = document.getElementById("show-login");

    showSignup.addEventListener("click", () => {
        loginForm.classList.add("hidden");
        signupForm.classList.remove("hidden");
    });

    showLogin.addEventListener("click", () => {
        signupForm.classList.add("hidden");
        loginForm.classList.remove("hidden");
    });
});
    </script>
</body>
</html>