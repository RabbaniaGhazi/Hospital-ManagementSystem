<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
     body {
    font-family: Arial, sans-serif;
    background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
    background-size:cover;
    background-position:center;
    margin: 0;
    padding: 0;
}

.container {
    width: 40%;
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    background:#e0dede;
    display: flex;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn {
    width: 100%;
    padding: 10px;
    background-color:rgb(81, 136, 168);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn:hover {
    background-color:rgb(108, 69, 180);
}

.message {
    text-align: center;
    margin-top: 10px;
}
.login{
	height: 460px;
	background: #eee;
	border-radius: 60% / 10%;
	transform: translateY(-180px);
	transition: .8s ease-in-out;
}
.login label{
	color: #573b8a;
	transform: scale(.6);
}

#chk:checked ~ .login{
	transform: translateY(-500px);
}
#chk:checked ~ .login label{
	transform: scale(1);	
}

.alert {
    padding: 10px;
    background-color: #f44336; 
    color: white;
    margin-bottom: 15px;
    border-radius: 5px;
}

.alert.alert-error {
    background-color: #f44336; 
}

    </style>
</head>
<body>
            <div class="container">
        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf
            <h2>Login</h2>
            @if(session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p> Don't have an account?<a href="/register">Register </a></p>
</div>
        </form>
    </div>
</body>
</html>