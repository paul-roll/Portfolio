<?php
    $first = $last = $email = $phone = $subject = $message = "";
    $validationErrors = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first = ucfirst(strtolower(trim(filter_input(INPUT_POST,"first",FILTER_SANITIZE_SPECIAL_CHARS))));
        $last = ucfirst(strtolower(trim(filter_input(INPUT_POST,"last",FILTER_SANITIZE_SPECIAL_CHARS))));
        $email = strtolower(trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL)));
        $phone = str_replace([" ", "-"], "", trim(filter_input(INPUT_POST,"phone",FILTER_SANITIZE_SPECIAL_CHARS)));
        $subject = ucfirst(strtolower(trim(filter_input(INPUT_POST,"subject",FILTER_SANITIZE_SPECIAL_CHARS))));
        $message = trim(filter_input(INPUT_POST,"message",FILTER_SANITIZE_SPECIAL_CHARS));

        // checking the truthiness of the variables not comparing them
        if ($firstErr = validateName($first, "First")) {
            $validationErrors["first"] = $firstErr;
        }
        if ($lastErr = validateName($last, "Last")) {
            $validationErrors["last"] = $lastErr;
        }
        if ($emailErr = validateEmail($email)) {
            $validationErrors["email"] = $emailErr;
        }
        if ($phoneErr = validatePhone($phone)) {
            $validationErrors["phone"] = $phoneErr;
        }
        if ($subjectErr = validateSubject($subject)) {
            $validationErrors["subject"] = $subjectErr;
        }
        if ($messageErr = validateMessage($message)) {
            $validationErrors["message"] = $messageErr;
        }

        if (!$validationErrors) {
            // Database push here
            $validationErrors["success"] = "Your message has been sent!";
            $first = $last = $email = $phone = $subject = $message = "";
        }
    }
?>
            <section class="contact">
                <div class="wrapper">
                    <a id="contact"></a>
                    <div class="flex-container">
                        <div>
                            <h3>Get In Touch</h3>
                            <p>Feel free to contact me by telephone or email and I will be sure to get back to you as soon as possible.</p>
                            <p>Tel: <a class="bold" href="tel:07884441688">0788 444 1688</a></p>
                            <p>Email: <a class="bold" href="mailto:paul.roll@netmatters-scs.com">paul.roll@netmatters-scs.com</a></p>
                        </div>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>#contact" id="contact">

                            <label class="first"><input id="first" name="first" type="text" placeholder="First Name (Required)" value="<?php echo $first; ?>"<?php if(!empty($validationErrors["first"])) {echo " class='error'><p>" . $validationErrors["first"] . "</p>";}else{echo ">";} ?></label>
                            <label class="last"><input id="last" name="last" type="text" placeholder="Last Name (Required)" value="<?php echo $last; ?>"<?php if(!empty($validationErrors["last"])) {echo " class='error'><p>" . $validationErrors["last"] . "</p>";}else{echo ">";} ?></label>
                            <label class="email"><input id="email" name="email" type="email" placeholder="Email Address (Required)" value="<?php echo $email; ?>"<?php if(!empty($validationErrors["email"])) {echo " class='error'><p>" . $validationErrors["email"] . "</p>";}else{echo ">";} ?></label>
                            <label class="phone"><input id="phone" name="phone" type="text" placeholder="Phone Number" value="<?php echo $phone; ?>"<?php if(!empty($validationErrors["phone"])) {echo " class='error'><p>" . $validationErrors["phone"] . "</p>";}else{echo ">";} ?></label>
                            <label class="subject"><input id="subject" name="subject" type="text" placeholder="Subject" value="<?php echo $subject; ?>"<?php if(!empty($validationErrors["subject"])) {echo " class='error'><p>" . $validationErrors["subject"] . "</p>";}else{echo ">";} ?></label>
                            <label class="message"><textarea rows="5" id="message" name="message" placeholder="Message (Required)"<?php if(!empty($validationErrors["message"])) {echo " class='error'";} ?>><?php echo $message; ?></textarea><?php if(!empty($validationErrors["message"])) {echo "<p>" . $validationErrors["message"] . "</p>";} ?></label>
                            <input class="btn-submit bold" type="submit" value="Submit">
                            <?php
                        if (!empty($validationErrors["success"])) {
                            echo "<p id='successMessage'>" . $validationErrors["success"] . "</p>\n";
                        }
                    ?>
                        </form>
                    </div>
                </div>
            </section>
