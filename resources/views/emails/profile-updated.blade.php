<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
        .footer a {
            color: #007BFF;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Привет, {{ $name }}!</p>
        <p>Данные в профиле на сайте mtscybercup.ru успешно изменены.</p>
        <table>
            <tr>
                <th>Имя</th>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <th>Фамилия</th>
                <td>{{ $surname }}</td>
            </tr>
            <tr>
                <th>Отчество</th>
                <td>{{ $patronymic }}</td>
            </tr>
            <tr>
                <th>Почта (логин)</th>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <th>Номер телефона</th>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <th>Telegram</th>
                <td>{{ $telegram }}</td>
            </tr>
            <tr>
                <th>Компания</th>
                <td>{{ $company }}</td>
            </tr>
            <tr>
                <th>Город</th>
                <td>{{ $city }}</td>
            </tr>
        </table>
        <div class="footer">
            <p>*<a href="#">Условия обработки персональных данных</a></p>
            <p>*<a href="#">Регламент проведения турнира</a></p>
        </div>
    </div>
</body>
</html>
