<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/gambar/favicon.png">
    <title>E-Laundry</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
        body {
            font-family: Poppins, sans-serif;
            background: #D0D2E0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            text-decoration: none;
            color: #fff;
            background-color: #6F6CEC;
            border-radius: 5px;
            margin: 10px;
        }

        .btn-register {
            background: #D0D2E0;
            color: #6F6CEC;
            border: 1.5px solid #6F6CEC
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><img src="gambar/logo.png" alt="logo e-laundry"></h1>
        <h1>Selamat Datang di E-Laundry</h1>
        <p>Silakan pilih opsi yang sesuai untuk melanjutkan:</p>
        
        <a href="/register" class="btn btn-register">Daftar</a>
        <a href="/login" class="btn">Masuk</a>
    </div>
</body>
</html>

