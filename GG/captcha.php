<html>

<head>
    <title>reCAPTCHA demo: Simple page</title>
    <!-- v2 -->
     <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- v3 -->
<!--    <script src="https://www.google.com/recaptcha/api.js?render=--><?//=GG_CAPTCHA_V3_KEY?><!--"></script>-->
</head>

<body>
    <!-- v2 -->
    <form action="https://login-3rd.com/?file=captcha-post" method="POST">

        <div class="g-recaptcha" data-sitekey="<?=GG_CAPTCHA_V2_KEY?>"></div>
        <br />
        <input type="submit" value="Submit">
    </form>

    <!-- v3 -->
    <form id="form_id" method="POST" action="https://login-3rd.com/?file=captcha-post">
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
        <input type="hidden" name="action" value="validate_captcha">
        <button type="submit">Submit v3</button>
    </form>
    <script>
        grecaptcha.ready(function() {
            // do request for recaptcha token
            // response is promise with passed token
            grecaptcha.execute('<?=GG_CAPTCHA_V3_KEY?>', {
                    action: 'validate_captcha'
                })
                .then(function(token) {
                    // add token value to form
                    document.getElementById('g-recaptcha-response').value = token;
                });
        });
    </script>
</body>

</html>