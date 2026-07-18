<!DOCTYPE html>
<html>
<head>
    <title>String Manipulation in PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background: #2193b0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #17687a;
        }
        .result {
            margin-top: 20px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>String Manipulation</h2>
    <form method="post">
        <input type="text" name="text" placeholder="Enter a string" required><br>
        <input type="submit" name="submit" value="Process">
    </form>

    <div class="result">
        <?php
        if(isset($_POST['submit'])) {
            $text = $_POST['text'];

            echo "<h3>Results:</h3>";

            // Length
            $length = strlen($text);
            echo "<p><strong>Length:</strong> $length</p>";

            // Reverse
            $reverse = strrev($text);
            echo "<p><strong>Reversed String:</strong> $reverse</p>";

            // Substring (first 5 characters)
            $substring = substr($text, 0, 5);
            echo "<p><strong>Substring (first 5 chars):</strong> $substring</p>";
        }
        ?>
    </div>
</div>

</body>
</html>