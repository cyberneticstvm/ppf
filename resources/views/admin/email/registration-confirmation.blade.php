<!DOCTYPE html>
<html>

<head>
    <title>PPF Kuwait Registration Confirmation</title>
</head>

<body>
    Dear {{ $data['name'] }},
    <p>You've successfully registered with PPF Kuwait. Your login credenetials are below and recommend to change the password immediately.</p>
    <p>Username: {{ $data['membership_number'] }}</p>
    <p>Password: {{ $data['membership_number'] }}</p>
    <a href="https://ppfkuwait.org/login" target="_blank">Click here to login</a>
    <br />
    <br />
    Regards,<br />
    PPF Kuwait.
</body>

</html>