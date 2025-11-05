<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>CSV Parsing for Batch Evaluation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-size: 16px;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .results {
            margin-top: 20px;
        }

        .results ul {
            list-style-type: none;
            padding: 0;
        }

        .results li {
            background-color: #e7f7e7;
            margin: 8px 0;
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .note {
            font-size: 14px;
            color: #555;
            margin-top: 10px;
            text-align: center;
        }

    </style>
</head>
<body>
    <header>
        <h1>CSV Parsing for Batch Evaluation</h1>
    </header>

    <div class="container">
        <h2>Enter Student Data</h2>
        <form method="POST" action="">
            <label for="csvdata">Enter student data (one per line):</label>
            <textarea id="csvdata" name="csvdata" placeholder="John,85,90,78&#10;Alice,88,92,80"></textarea>
            <button type="submit">Evaluate Scores</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['csvdata'])) {
            $inputData = trim($_POST['csvdata']);
            $lines = explode("\n", $inputData);

            echo "<div class='results'>";
            echo "<h3>Batch Evaluation Results:</h3>";
            echo "<ul>";

            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '') continue; 

                $parts = explode(",", $line);
                $name = array_shift($parts);

                $scores = array_map('floatval', $parts);
                $avg = count($scores) > 0 ? array_sum($scores) / count($scores) : 0;

                $avgFormatted = number_format($avg, 2);
                $summaryArray = [$name, "Avg: $avgFormatted"];
                $summary = implode(" - ", $summaryArray);

                echo "<li>$summary</li>";
            }

            echo "</ul>";
            echo "</div>";
        }
        ?>

        <p class="note">Note: Use commas to separate the name and marks (e.g., John,85,90,78).</p>
    </div>
</body>
</html>
