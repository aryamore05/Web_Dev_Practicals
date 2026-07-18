<?php
// Set the default timezone to India
date_default_timezone_set('Asia/Kolkata');

// Get current Date and Time
$currentDateTime = date('d-m-Y h:i:s A');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Website</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #ffffff;
            padding: 40px 60px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
        }

        b {
            color: #007BFF;
        }

	.container img{
		height:200px;
		width:400px;	
	}
    </style>
</head>

<body>

<div class="container">
    <img src="https://img.freepik.com/premium-vector/welcome-banner-with-flowers-vector-flat-vector-illustration-isolated-white-background_481273-753.jpg?w=2000",alt="Welcome Image">
    <h1>Welcome to my Website!</h1>
    <p>Today's Date and Time is: <b><?php echo $currentDateTime; ?></b></p>
</div>

</body>
</html>