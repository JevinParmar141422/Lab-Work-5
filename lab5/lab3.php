<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificates</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #5a3e36;
        }
        form {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 18px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            width: 50%;
            display: block;
            margin: 0 auto;
        }
        button:hover {
            background-color: #45a049;
        }
        .certificate-box {
            text-align: center;
            background-color: #e0e0e0;
            padding: 30px;
            border: 3px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        .certificate-box h3 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #4d4d4d;
            text-transform: uppercase;
            font-weight: bold;
        }
        .certificate-box p {
            font-size: 22px;
            font-weight: bold;
            color: #2d2d2d;
        }
        .certificate-box {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Name Formatter for Certificates</h2>
        <form method="POST" action="">
            <label for="fullname">Enter full name:</label><br />
            <input type="text" id="fullname" name="fullname" required />
            <br /><br />
            <button type="submit">Format Name</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['fullname'])) {
            $fullName = trim($_POST['fullname']);


            $lowercaseName = strtolower($fullName);

    
            $words = explode(" ", $lowercaseName);

            foreach ($words as &$word) {
                $word = ucfirst($word);
            }
            unset($word);

            
            $formattedName = implode(" ", $words);
        ?>
        
        <div class="certificate-box">
            <h3>Certificate of Achievement</h3>
            <p>Congratulations, <strong><?php echo $formattedName; ?></strong>!</p>
            <p>You have successfully completed the program.</p>
        </div>
        
        <?php } ?>
    </div>
</body>
</html>
