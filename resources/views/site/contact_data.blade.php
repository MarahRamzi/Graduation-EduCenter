<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="alert alert-success">
            <p><b>Name:</b> {{ $name }}</p>
            <p><b>Email:</b> {{ $mail }}</p>
            <p><b>Major:</b> {{ $major }}</p>
            <p><b>Message:</b> {{ $message }}</p>
        </div>
    </div>
</body>
</html>
 