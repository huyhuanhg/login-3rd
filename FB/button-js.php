<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Button</title>
    <style>
        .btn-login {
            display: inline-block;
            border: 1px solid green;
            padding: 10px 15px;
            text-decoration: none !important;
            border-radius: 4px;
            background-color: green;
            color: white;
            font-size: 20px;
            font-weight: bold;
            transition: .3s ease-in-out;
        }

        .btn-login:hover {
            color: gray;
            background-color: greenyellow;
        }
    </style>
</head>

<body>

    <div id="fb-root"></div>
    <a class="btn-login" href='javascript:void(0)' onclick='login();'>Facebook Login</a>
    <script type="text/javascript">
        //<![CDATA[
        window.fbAsyncInit = function() {
            FB.init({
                appId: '<?=FB_APP_ID?>', // App ID
                channelURL: '', // Channel File, not required so leave empty
                status: true, // check login status
                cookie: true, // enable cookies to allow the server to access the session
                oauth: true, // enable OAuth 2.0
                xfbml: false // parse XFBML
            });
        };
        // logs the user in the application and facebook
        function login() {
            FB.getLoginStatus(function(r) {
                if (r.status === 'connected') {
                    var token = r.authResponse.accessToken;
                    window.location.href = '?file=button-js&page=finish&token=' + token;
                } else {
                    FB.login(function(response) {
                        if (response.authResponse) {
                            //if (response.perms)
                            var token = response.authResponse.accessToken;
                            window.location.href = '?file=button-js&page=finish&token=' + token;
                        } else {
                            // user is not logged in
                        }
                    }, {
                        scope: 'email'
                    }); // which data to access from user profile
                }
            });
        }
        // Load the SDK Asynchronously
        (function() {
            var e = document.createElement('script');
            e.async = true;
            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e);
        }());
        //]]>
    </script>
</body>

</html>