<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
Name: {{ $user['name'] }}<br>
Email: {{ $user['email']}}<br>
Telephone: {{ $user['telephone'] }}<br><br>

{{ $user['message'] }}

</body>
</html>