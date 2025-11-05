<?php
// List of banned words
$banned_words = ['spam', 'hack', 'phishing', 'malware', 'scam'];

// Function to moderate comment
function moderateComment($comment, $banned_words) {
    // Clean the comment
    $comment = trim($comment); // Removes extra spaces
    $comment_lower = strtolower($comment); // Convert to lowercase for easy comparison

    // Check for banned words
    foreach ($banned_words as $word) {
        if (strpos($comment_lower, $word) !== false) {
            // If any banned word is found, flag the comment
            return "Comment contains banned words and cannot be posted.";
        }
    }

    // Safely display the comment
    $safe_comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
    return "Comment approved: " . $safe_comment;
}

// Initialize result variable for later use
$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
    $user_comment = $_POST['comment'];
    $result = moderateComment($user_comment, $banned_words); // Pass banned words array here
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Moderation System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9f7ef;
            border: 1px solid #28a745;
            color: #155724;
            text-align: center;
        }
        .error {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Your Comment</h2>

        <!-- Comment Form -->
        <form method="POST" action="">
            <textarea name="comment" placeholder="Enter your comment here..." required></textarea>
            <button type="submit">Submit Comment</button>
        </form>

        <!-- Display Result -->
        <?php if ($result): ?>
            <div class="result"><?php echo $result; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
