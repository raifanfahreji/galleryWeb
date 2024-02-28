<?php
 session_start();
    if (isset($_SESSION['userid'])) {
        header('location: index.php');
       exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Font Awesome if you're using icons -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <link rel="stylesheet" type="text/css" href="path/to/your/stylesheet.css">
    <title>Halaman Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light gray background */
            font-family: 'Arial', sans-serif;
            background-color: #B0E0E6;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: #fff; /* White card background */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff; /* Blue header background */
            color: #fff; /* White text color */
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
            font-size: 1.5em;
            background-image: linear-gradient(to right, #4682B4, #00FFFF, #00FA9A);
        }

        .card-body {
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff; /* Blue header color */
            margin-bottom: 20px;
            
        }

        form {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ced4da; /* Light gray border */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #28a745; 
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        input[type="submit"]:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- If you're using Bootstrap or other grid system, ensure proper structure -->
        <div class="card card-login mx-auto mt-5 col-md-6">
            <div class="card-header"><i class="fa fa-user"></i> <i>Please Sign In</i></div>
            <div class="card-body">
                <h1>Halaman Login</h1>
                <form action="proses_login.php" method="post">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Login"></td>
                        </tr>
                    </table>
                </form>
                <p style="text-align: center; color: ;">Don't have an account? <a href="register.php">Create Account</a></p>
            </div>
        </div>
    </div>
</body>
<script>
                document.addEventListener('DOMContentLoaded', () => {
                    const form = document.querySelector('form');
                    form.addEventListener('submit', (e) => {
                        if (!confirm('Apakah anda ingin Login?')) {
                            e.preventDefault();
                        }
                    });
                });
            </script>
</html>
