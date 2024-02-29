	<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Halaman Registrasi</title>
	    <style>
	        body {
	            margin: 0;
            padding: 0;
            background-color: #B0E0E6;
	            font-family: Arial, sans-serif;
	        }

	        .container {
	            height: 100vh;
	            display: flex;
	            justify-content: center;
	            align-items: center;
	        }
	
	        .card {
	            border: none;
	            border-radius: 10px;
	            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
              width: 100%;
	            margin: auto;
	        }
	
	        .card-header {
	            color: #fff;
	            background-color: #4682B4;
	            border-radius: 10px 10px 0 0;
	            padding: 15px;
	            text-align: center;
	        }

	        .card-body {
            padding: 20px;
	            background-color: #6495ED;
	        }
	
	        h1 {
	            color: #fff;
	            background-image: linear-gradient(to right, #4682B4, #00FFFF, #00FA9A);
            padding: 15px;
	            border-radius: 10px;
	            text-align: center;
	        }
	
	        form {
	            background-color: #fff;
	            padding: 20px;
            border-radius: 10px;
	            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	        }
	
	        table {
            width: 100%;
	            border-collapse: collapse;
	            margin-top: 15px;
	        }
	
	        table, th, td {
	            border: 1px solid #ddd;
	        }
	
        th, td {
	            padding: 10px;
            text-align: left;
	        }
	
        input[type="text"],
        input[type="password"],
	        input[type="email"] {
        width: calc(100% - 16px);
	            padding: 8px;
	            margin: 5px 0;
            box-sizing: border-box;
	        }
	
	        input[type="submit"] {
	            background-color: #4caf50;
	            color: #fff;
	            padding: 10px 20px;
            border: none;
	            border-radius: 4px;
	            cursor: pointer;
            width: 100%;
	        }
	
      input[type="submit"]:hover {
	            background-color: #45a049;
	        }
    </style>
	</head>
	
	<body>
	    <div class="container">
	        <div class="card">
	            <div class="card-header"><i class="fa fa-user"></i> Please Sign Up</div>
	            <div class="card-body">
	                <h1>Halaman Register</h1>
	                <form action="proses_register.php" method="post">
	                    <table>
	                        <tr>
	                            <td>Username</td>
	                            <td><input type="text" name="username"></td>
	                        </tr>
	                        <tr>
	                            <td>kata sandi</td>
	                            <td><input type="password" name="password"></td>
	                        </tr>
	                        <tr>
	                            <td>email</td>
	                            <td><input type="email" name="email"></td>
	                        </tr>
	                        <tr>
	                            <td>Nama Lengkap</td>
	                            <td><input type="text" name="namalengkap"></td>
	                        </tr>
	                        <tr>
	                            <td>Alamat</td>
	                            <td><input type="text" name="alamat"></td>
	                        </tr>
	                        <tr>
	                            <td></td>
	                            <td><input type="submit" value="Register"></td>
	                        </tr>
	                    </table>
	                </form>
	            </div>
	        </div>
	    </div>
	    <script>
               document.addEventListener('DOMContentLoaded', () => {
	            const form = document.querySelector('form')
	            form.addEventListener('submit', (e) => {
	                alert('Register berhasil ditambahkan, silahkan login')
	            })
	        })
	    </script>
	</body>
	</html>
