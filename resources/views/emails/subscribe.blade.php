<!DOCTYPE html>
<html>
<head>
    <title>Subscribe Email</title>
</head>
<body>
    <h1>Welcome </h1>

    <p>Dear {{ $data[user_name] }},</p>
    
    <p>You subscribed to the weather in the city of ' . {{ $data[user_name] }}</p>
</body>
</html>