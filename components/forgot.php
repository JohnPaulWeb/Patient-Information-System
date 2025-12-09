<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            background-image: url('/images/image.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0.4) 100%);
            pointer-events: none;
            z-index: 1;
        }

        header {
            background: linear-gradient(90deg, #0052cc 0%, #0052cc 100%);
            padding: 2rem 2rem;
            color: white;
            font-size: 1.5rem;
            font-weight: 300;
            letter-spacing: 1px;
            position: relative;
            z-index: 2;
        }

        header span {
            font-weight: 600;
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            z-index: 2;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 3rem 2.5rem;
            max-width: 380px;
            width: 100%;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .icon-container {
            margin-bottom: 2rem;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
        }

        .icon-ring {
            position: absolute;
            border-radius: 50%;
            border: 2px solid #0052cc;
            opacity: 0.3;
        }

        .icon-ring.ring-1 {
            width: 120px;
            height: 120px;
            animation: pulse 3s ease-in-out infinite;
        }

        .icon-ring.ring-2 {
            width: 160px;
            height: 160px;
            animation: pulse 3s ease-in-out infinite 0.5s;
        }

        .icon-main {
            width: 70px;
            height: 70px;
            background: #0052cc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            font-weight: bold;
            position: relative;
            z-index: 10;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.3;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.1;
            }
        }

        h1 {
            font-size: 1.75rem;
            color: #1a1a1a;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .description {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .input-group {
            margin-bottom: 0.5rem;
            text-align: left;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 0.75rem 1rem;
            background: #f9f9f9;
        }

        .input-icon {
            color: #0052cc;
            margin-right: 0.75rem;
            font-size: 1rem;
        }

        input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
            font-size: 0.95rem;
            color: #1a1a1a;
        }

        input::placeholder {
            color: #999;
        }

        .error-message {
            color: #d32f2f;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .submit-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-bottom: 1rem;
        }

        .submit-btn:hover {
            background: #229954;
        }

        .back-link {
            color: #0052cc;
            text-decoration: none;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #0041a3;
        }

        .back-link::before {
            content: '←';
            font-size: 1rem;
        }

        footer {
            text-align: center;
            padding: 2rem;
            color: #999;
            font-size: 0.85rem;
            position: relative;
            z-index: 2;
        }

        footer a {
            color: #0052cc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #0041a3;
        }

        @media (max-width: 480px) {
            .card {
                padding: 2rem 1.5rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            header {
                padding: 1.5rem 1rem;
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <span>Patient Information System</span>
    </header>

    <main>
        <div class="card">
            <div class="icon-container">
                <div class="icon-ring ring-1"></div>
                <div class="icon-ring ring-2"></div>
                <div class="icon-main">!</div>
            </div>

            <h1>Forgot Password</h1>
            <p class="description">Enter your email and we'll send you a link to reset your password.</p>

            <form>
                <div class="input-group">
                    <div class="input-wrapper">
                        <span class="input-icon">✉</span>
                        <input type="email" placeholder="Enter your Email:" value="">
                    </div>
                </div>
                <div class="error-message">We cannot find your email.</div>

                <button type="submit" class="submit-btn">Submit</button>
                <a href="../components/login.php" class="back-link">Back to Login</a>
            </form>
        </div>
    </main>

    <footer>
        Created with ❤ by Patient Information System.
    </footer>
</body>
</html>
