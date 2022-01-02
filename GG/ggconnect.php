<!-- <html>
    <head>
    </head>
  <body>
      <script src="https://accounts.google.com/gsi/client" async defer></script>
      <div id="g_id_onload"
         data-client_id="552504942422-n1pgqclbnsb70mmkrbum6nabp92pkqo5.apps.googleusercontent.com"
         data-login_uri="https://login-3rd.com/?file=connect-gg.html"
         data-auto_prompt="false">
      </div>
      <div class="g_id_signin"
         data-type="standard"
         data-size="large"
         data-theme="outline"
         data-text="sign_in_with"
         data-shape="rectangular"
         data-logo_alignment="left">
      </div>
  </body>
</html> -->
<html>
  <body>
      <script src="https://accounts.google.com/gsi/client" async defer></script>
      <script>
        function handleCredentialResponse(response) {
          console.log("Encoded JWT ID token: " + response.credential);
        //   get userInfo from url
        //   https://www.googleapis.com/oauth2/v3/tokeninfo?id_token={accces_token}
        }
        window.onload = function () {
          google.accounts.id.initialize({
            client_id: "552504942422-n1pgqclbnsb70mmkrbum6nabp92pkqo5.apps.googleusercontent.com",
            callback: handleCredentialResponse
          });
          google.accounts.id.renderButton(
            document.getElementById("buttonDiv"),
            { theme: "outline", size: "large" }  // customization attributes
          );
          google.accounts.id.prompt(); // also display the One Tap dialog
        }
    </script>
    <div id="buttonDiv"></div> 
  </body>
</html>