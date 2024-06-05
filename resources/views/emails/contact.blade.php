<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Mail</title>
</head>
<body>
    <h1>Nouveau message de contact</h1>
    <p><strong>Sujet:</strong> {{ $subject }}</p>
    <p><strong>Nom:</strong> {{ $name }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $messageContent }}</p>
</body>
</html>
