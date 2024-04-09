<!DOCTYPE html>
<html>
<head>
    <title>Liên Hệ</title>
    <style>
        /* CSS cho phần liên hệ */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .contact {
            text-align: center;
            padding: 20px;
            background-color: #f2f2f2;
        }
        
        .contact h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .contact p {
            color: #666;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }
        
        .contact-form {
            max-width: 400px;
            margin: 0 auto;
        }
        
        .contact-form input[type="text"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .contact-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .contact-form input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
    <script>
        // JavaScript để hiển thị thông báo gửi thành công
        function showSuccessMessage() {
            alert("Gửi thành công!");
        }
    </script>
</head>
<body>
    <div class="contact">
        <h2>Liên Hệ</h2>
        <p>Hãy liên hệ với chúng tôi nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào.</p>
        
        <div class="contact-form">
            <form action="" method="post" onsubmit="showSuccessMessage()">
                <input type="text" name="name" placeholder="Họ và tên" required>
                <input type="text" name="email" placeholder="Email" required>
                <textarea name="message" placeholder="Nội dung" required></textarea>
                <input type="submit" value="Gửi">
            </form>
        </div>
    </div>
</body>
</html>