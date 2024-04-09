<!DOCTYPE html>
<html>
<head>
    <title>Góp ý - STODED</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        textarea {
            height: 150px;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Góp ý</h1>
        <form action="submit.php" method="POST">
            <label for="name">Họ và tên:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="message">Nội dung:</label>
            <textarea id="message" name="message" required></textarea>
            
            <input type="submit" value="Gửi" class="btn">
        </form>
        
        <h2>Hoặc liên hệ qua:</h2>
        <p>Hotline: 910JQKA</p>
        <p>Fanpage: <a href="https://www.facebook.com/stoded">STODED</a></p>
        <p>Email: sneakerOffical@stoded.com</p>
    </div>
</body>
</html>