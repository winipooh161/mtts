<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Восстановление пароля</h1>
        <p>Вы запросили восстановление пароля для своей учетной записи на сайте mtscybercup.ru.</p>
        <p>Чтобы сбросить пароль, нажмите на кнопку ниже:</p>
        <a href="{{ $resetLink }}">Сбросить пароль</a>
        <p>Если вы не запрашивали сброс пароля, просто проигнорируйте это сообщение.</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} mtscybercup.ru. Все права защищены.</p>
        </div>
    </div>
</body>
</html>
