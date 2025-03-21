<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логи</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Логи обращений к сайту</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Время</th>
                    <th>Длительность</th>
                    <th>IP адрес</th>
                    <th>URL</th>
                    <th>Метод</th>
                    <th>Ввод</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->time }}</td>
                    <td>{{ $log->duration }} секунды</td>
                    <td>{{ $log->ip }}</td>
                    <td>{{ $log->url }}</td>
                    <td>{{ $log->method }}</td>
                    <td>{{ $log->input }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>