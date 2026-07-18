<?php
$values = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["values"])) {
        $values = $_POST["values"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Array Input Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #9face6);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #6c63ff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #5848d6;
        }

        .output {
            margin-top: 20px;
            padding: 15px;
            background: #f4f4f4;
            border-radius: 6px;
        }

        .item {
            background: #6c63ff;
            color: white;
            padding: 8px;
            margin: 5px 0;
            border-radius: 4px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Values to the Array:</h2>

    <form method="post">
        <input type="text" name="values[]" placeholder="Enter value 1" required>
        <input type="text" name="values[]" placeholder="Enter value 2" required>
        <input type="text" name="values[]" placeholder="Enter value 3" required>
        <button type="submit">Submit</button>
    </form>

    <?php if (!empty($values)): ?>
        <div class="output">
            <h3>Stored Values:</h3>
            <?php foreach ($values as $val): ?>
                <div class="item"><?php echo htmlspecialchars($val); ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>