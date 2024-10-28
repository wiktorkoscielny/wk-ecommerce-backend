<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 50px;
            margin-bottom: 40px;
        }
        p {
            font-size: 20px;
        }
        a {
            color: #3490dc;
            text-decoration: none;
        }
    </style>
</head>
<body>
<h1>404</h1>
<p>Oops! The page you are looking for could not be found.</p>
<p><a href="{{ url('/') }}">Go back to homepage</a></p>
</body>
</html>