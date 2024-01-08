<!DOCTYPE html>
<html>

<head>
    <title>PPF Kuwait Password Reset Link</title>
</head>

<body>
    Dear {{ $user->name }},
    <p>Your password reset link shown below.</p><br />
    <a href="{{ route('reset.password', $token) }}" target="_blank">Click here to reset your password</a>
    <br />
    <br />
    Regards,<br />
    PPF Kuwait.
</body>

</html>