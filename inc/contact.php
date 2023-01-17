<?php
    include("inc/functions.php");
    $first = $last = $email = $phone = $subject = $message = "";
    $validationErrors = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first = ucfirst(strtolower(trim(filter_input(INPUT_POST,"first",FILTER_SANITIZE_SPECIAL_CHARS))));
        $last = ucfirst(strtolower(trim(filter_input(INPUT_POST,"last",FILTER_SANITIZE_SPECIAL_CHARS))));
        $email = strtolower(trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL)));
        $phone = str_replace([" ", "-"], "", trim(filter_input(INPUT_POST,"phone",FILTER_SANITIZE_SPECIAL_CHARS)));
        $subject = ucfirst(strtolower(trim(filter_input(INPUT_POST,"subject",FILTER_SANITIZE_SPECIAL_CHARS))));
        $message = trim(filter_input(INPUT_POST,"message",FILTER_SANITIZE_SPECIAL_CHARS));

        if ($firstErr = validateName($first)) {
            $validationErrors["first"] = [0, $firstErr];
        }
        if ($lastErr = validateName($last)) {
            $validationErrors["last"] = [0, $lastErr];
        }
        if ($emailErr = validateEmail($email)) {
            $validationErrors["email"] = [0, $emailErr];
        }
        if ($phoneErr = validatePhone($phone)) {
            $validationErrors["phone"] = [0, $phoneErr];
        }
        if ($subjectErr = validateSubject($subject)) {
            $validationErrors["subject"] = [0, $subjectErr];
        }
        if ($messageErr = validateMessage($message)) {
            $validationErrors["message"] = [0, $messageErr];
        }

        if (!$validationErrors) {
            echo("validation OK!");
        } else {
            var_dump($validationErrors);
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
                            <label class="first"><input id="first" name="first" type="text" placeholder="First Name (Required)"></label>
                            <label class="last"><input id="last" name="last" type="text" placeholder="Last Name (Required)"></label>
                            <label class="email"><input id="email" name="email" type="email" placeholder="Email Address (Required)"></label>
                            <label class="phone"><input id="phone" name="phone" type="text" placeholder="Phone Number"></label>
                            <label class="subject"><input id="subject" name="subject" type="text" placeholder="Subject"></label>
                            <label class="message"><textarea rows="5" id="message" name="message" placeholder="Message (Required)"></textarea></label>
                            <input class="btn-submit bold" type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </section>
