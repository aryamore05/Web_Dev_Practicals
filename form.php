```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stylish POST Form</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(270deg, #667eea, #764ba2, #6dd5ed);
            background-size: 600% 600%;
            animation: gradientBG 10s ease infinite;
        }

        /* Animated background */
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            width: 360px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            color: white;
            animation: fadeIn 1s ease;
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: none;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            box-shadow: 0 0 8px #fff;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(45deg, #ff7eb3, #ff758c);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        input[type="submit"]:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .output {
            margin-top: 20px;
            padding: 15px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.4);
            animation: fadeIn 0.8s ease;
        }

        .output h3 {
            margin-bottom: 10px;
            color: #ffd;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Contact Form</h2>

    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        echo "<div class='output'>";
        echo "<h3>Submitted Data:</h3>";
        echo "Name: $name <br>";
        echo "Email: $email";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
```
