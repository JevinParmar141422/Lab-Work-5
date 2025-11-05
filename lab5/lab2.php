<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Password Reset Token Generator</title>
</head>
<body>
    <h2>Password Reset Token Generator</h2>
    <form method="POST" action="">
        <label for="email">Enter your email:</label><br />
        <input type="email" id="email" name="email" required />
        <br /><br />
        <button type="submit">Generate Token</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email'])) {

        $email = trim($_POST['email']);
   
        $data = $email . time();

        $token = md5($data);

        echo "<h3>Your Password Reset Token:</h3>";
        echo "<p><strong>$token</strong></p>";

        echo "<h4>How to use this token:</h4>";
        echo "<p>This token can be included in a password reset URL as a unique identifier for the reset request. For example:</p>";
        echo "<code>https://yourwebsite.com/reset_password.php?token=$token</code>";
        echo "<p>When the user clicks the link, the system verifies the token, ensures it matches a valid request, and allows the user to reset their password securely.</p>";
    }
    ?>
</body>
</html>
