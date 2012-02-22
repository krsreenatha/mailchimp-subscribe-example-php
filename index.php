<?php
    /**
     * If an email address is sent in the POST...
     */
    if (isset($_POST['email']))
    {
        /**
         * Require config, MailChimp API class and Subscribe class
         */
        require('inc/config.php');
        require('inc/MCAPI.class.php');
        require('inc/MC-Subscribe.class.php');

        /**
         * Instantiate MC_Subscribe obj
         * ----------------------------
         *
         * You can check whether the subscription was successful by evaluating $sub->success (e.g. to add success/error class to an elem)
         * You can get the email with $sub->email and the message with $sub->message
         */
        $sub = new MC_Subscribe(new MCAPI($api_key), $messages, $list_id, $_POST['email']);

        /**
         * If this is an AJAX request...
         */
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
        {
            /**
             * Pass JSON-encoded success flag & message back to client-side
             */
            echo json_encode(array(
                'success' => $sub->success,
                'message' => $sub->message,
            ));

            /**
             * Exit to prevent further document parsing
             */
            exit;
        }
    }
?>
<!doctype html>
<html lang="en-gb">
<head>
    <meta charset="utf-8" />
    <title>Simple MailChimp Signup</title>
</head>
<body>
    <form method="post">
        <label for="email">
            Email address
            <input type="email" id="email" name="email" placeholder="Your email address..." value="<?php if (isset($sub->email)) echo $sub->email; ?>" />
        </label>
        <button type="submit" id="submit-btn">Submit</button>
    </form>

    <div id="message">
        <?php
            if (isset($sub->message))
            {
                echo $sub->message;
            }
        ?>
    </div> <!-- /#message -->

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>
    <script src="js/validate.js"></script>
</body>
</html>