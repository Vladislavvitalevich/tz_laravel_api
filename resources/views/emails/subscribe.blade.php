<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to Our weather service!</h1>

    <p>Dear {{ $user_name }},</p>
    
    <p>Thank you for subscribing to the weather in the city {{ $city_name }}.</p>
    
    <p>Your Website Team</p>
</body>
</html>