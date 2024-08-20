<?php
# from the $_SERVER global variable, check if the HTTP method used is POST, if its not POST, redirect to the index.php page
# Reference: https://www.php.net/manual/en/reserved.variables.server.php

// Supply the missing code
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}

// Supply the missing code
$complete_name = $_POST['complete_name'];
$email = $_POST['email'];
$birthdate = $_POST['birthdate'];
$contact_number = $_POST['contact_number'];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>IPT10 Laboratory Activity #3A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css" />
</head>
<body>
<section class="section">
    <h1 class="title">Instructions</h1>
    <h2 class="subtitle">
        Greetings, <?php echo $complete_name;?>!
    </h2>

    <!-- Supply the correct HTTP method and target form handler resource -->
    <form method="$_POST" action="">
        <input type="hidden" value="<?php echo $complete_name; ?>" />
        <input type="hidden" value="<?php echo $email; ?>" />
        <input type="hidden" value="<?php echo $birthdate; ?>" />
        <input type="hidden" value="<?php echo $contact_number; ?>" />

        <!-- Display the instruction -->
        <p>Please read all the instructions before starting the quiz. Failure to follow will lead to consquences.</p>

        <div class="field">
            <label class="label">Terms and conditions</label>
            <div class="control">
                <textarea class="textarea" placeholder="Textarea">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                <input type="checkbox" name="disagree">
                I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <!-- Start Quiz button -->
        <button type="submit" class="button is-link">Start Quiz</button>
    </form>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.querySelector('input[name="disagree"]');
    const submitButton = document.querySelector('button[type="submit"]');

    function toggleSubmitButton() {
        submitButton.disabled = !checkbox.checked;
    }

    checkbox.addEventListener('change', toggleSubmitButton);

    // Initial check
    toggleSubmitButton();
});
</script>

</body>
</html>