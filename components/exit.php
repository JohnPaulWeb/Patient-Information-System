<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            width: 100%;
            height: 100%;
            background-image: url('../image/patients.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(2px);
        }

        .content {
            position: relative;
            z-index: 10;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3rem;
        }

        h1 {
            font-size: 3.5rem;
            color: #1a3a52;
            font-weight: 700;
            letter-spacing: -1px;
            text-shadow: 0 2px 4px rgba(255, 255, 255, 0.3);
            margin-bottom: 1rem;
        }

        .button-group {
            display: flex;
            gap: 2rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        button {
            padding: 1rem 2.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .register-btn {
            background-color: #1e5fa8;
            color: white;
        }

        .register-btn:hover {
            background-color: #164a88;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 95, 168, 0.4);
        }

        .login-btn {
            background-color: #4caf50;
            color: white;
        }

        .login-btn:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .button-group {
                gap: 1rem;
            }

            button {
                padding: 0.75rem 2rem;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="overlay"></div>
        <div class="content">
            <h1>Patient Information System</h1>
            <div class="button-group">
                <a href="register.php"><button class="register-btn">Register</button></a>
                <a href="login.php"><button class="login-btn">Login</button></a>
            </div>
        </div>
    </div>
</body>

</html>