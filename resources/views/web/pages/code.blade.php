<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up Confirmation for Rentals Reimagined</title>
    </head>
    <body>
        <h1>Thanks for signing up!</h1>

        <h3>click this link to confirm your account: </h3>
        <a href="{{ url('/verify/'.$id. '/' . $code) }}">verify</a>

    </body>
</html>
