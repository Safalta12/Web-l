<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $country = trim($_POST["country"]);
    $message = trim($_POST["message"]);
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $errors[] = "Only letters and white space allowed in name.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($phone)) {
        $errors[] = "Phone is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Invalid phone number. Only digits allowed, 10 characters.";
    }
    if (empty($country)) {
        $errors[] = "Country is required.";
    }
    if (empty($message)) {
        $errors[] = "Message is required.";
    }
     if (empty($errors)) {
       $success="Message sent successfully!!";
    }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>Error: $error</p>";
        }
    }
    if (isset($success)) {
        echo "<p style='color: green;'>$success</p>";
    }
    ?>
    <form action="lab-19.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required><br><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required><br><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo isset($country) ? htmlspecialchars($country) : ''; ?>" required><br><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
