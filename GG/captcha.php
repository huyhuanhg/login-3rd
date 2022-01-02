<html>

<head>
    <title>reCAPTCHA demo: Simple page</title>
    <!-- v2 -->
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->

    <!-- v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LfQzuUdAAAAAKD6eRsh1QjBbdiav1cciY0n85Fj"></script>
</head>

<body>
    <!-- v2 -->
    <form action="https://login-3rd.com/?file=captcha-post" method="POST">
        <!-- 
            https://www.google.com/recaptcha/admin/create
            https://www.google.com/recaptcha/admin/site/501564546/setup
            key: 6LeCROUdAAAAAEETq3oPt-oHmgeZzaDXwt6QAZEl
            secret: 6LeCROUdAAAAABSo1y5ONUW08XaMDnMj_G4rPARx
        -->
        <!-- 
            https://www.google.com/recaptcha/admin/site/501599952/setup
            key: 6LfQzuUdAAAAAKD6eRsh1QjBbdiav1cciY0n85Fj
            secret: 6LfQzuUdAAAAAHu_A1htokBviQo2XsNny9StXzen
        -->
        <div class="g-recaptcha" data-sitekey="6LeCROUdAAAAAEETq3oPt-oHmgeZzaDXwt6QAZEl"></div>
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
            grecaptcha.execute('6LfQzuUdAAAAAKD6eRsh1QjBbdiav1cciY0n85Fj', {
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