<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Airbee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }
        body{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url(cidade4.jpg);
            animation: gradienteBG 15s ease infinite;
            overflow: hidden;
        }
        @keyframes gradienteBG{
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }
        .glass-container{
            position: relative;
            width: 380px;
            padding: 40px;
            border-radius: 20px;
            backdrop-filter: blur(15px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.4);
            z-index: 10;
            overflow: hidden;
        }
        .glass-container::before{   
            content:'';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.05);
            transform: scaleX(-15deg);
            transition: 0.5s;
            pointer-events: none;
        }

        .glass-container:hover::before{
            left: 120%;
        }

        .glass-container h2{
            color: #fff;
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            letter-spacing: 1px;
            margin-bottom: 40px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }  
        .input-group{
            position: relative;
            margin-bottom: 30px;
        } 

        .input-group input{
            width: 100%;
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            outline: none;
            border-radius: 35px;
            font-size: 16px;
            color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .input-group input::placeholder{
            color: rgba(255, 255, 255, 0.7)
        }

        .input-group input:focus{
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1)
        }

        .input-group label{
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .input-group input:focus + label,
        .input-group input:valid + label{
            top: 0;
            left: 15px;
            font-size: 12px;
            background: rgba(255, 255, 255, 0.2);
            padding: 2px 8px;
            border-radius: 10px;
            color: #fff;
        }

        .remember-forgot{
            display: flex;
            justify-content: space-between;
            align-content: center;
            margin-bottom: 25px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .remember-forgot label{
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .remember-forgot input{
            margin-right: 8px;
            accent-color: #fff;
        }

        .remember-forgot a{
            color: #fff;
            text-decoration: none;
            transition: all 0.3 ease;
        }

        .remember-forgot a:hover{
            text-decoration: underline;
        }

        .register-bnt{
            width: 100%;
            padding: 15px;
            background: rgba(255, 255, 255, 0.3);
            border: none;
            outline: none;
            border-radius: 35px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3 ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .register-bnt:hover {
            background: rgba(255, 255, 255, 0.4);
            transform: translate(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .login-link{
            text-align: center;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
        }

        .login-link a{
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .login-link a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="glass-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="input-group">
            <input type="email" id="email" name="email" required>
            <label >Email</label>
        </div>

        <div class="input-group">
            <input type="password" id="password" name="password" required>
            <label >Senha</label>
        </div>
        <div class="remember-forgot">
            <label for=""><input type="checkbox"> Lembrar de Mim</label>
            <a href="{{ "home" }}">Esqueceu a senha</a>
        </div>

        <button type="submit" class="register-bnt">Login</button>
        <div class="login-link">
            <p> Não possui uma conta? <a href="{{ route('register') }}">Cadastra-se</a></p>
        </div>
        </form>
    </div>

</body>
</html>



    


