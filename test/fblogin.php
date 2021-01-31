<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<body>

<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '323884005467375',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : 'v9.0'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };
  function login() {
    FB.login(function(response) {
        if (response.authResponse) {
            // connected
        testAPI();
        } else {
            // cancelled
        }
    }, { scope: 'email' });
    }

  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me/?fields=picture,name,email', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, '+'<br>' + 'User Name:\n\n'+response.name 
        + '<br>' + 'User Email:\n\n'+ response.email+'<br>'+ 'User ID:\n\n'+response.id
        +'<br>'+ 'User Gender:\n\n'+response.first_name;
        var userInfo = document.getElementById('profilephoto');
        
        location.href="login.php?value="+response.id;
    userInfo.innerHTML = '<img src="https://graph.facebook.com/' + response.id + '/picture">' + response.name ;    });
  }

</script>


<!-- The JS SDK Login Button -->

<!--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>-->
<div class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" data-width="" data-size="large" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="true"></div>
<div id="status">
</div>
<div id="profilephoto">
</div>

<!-- Load the JS SDK asynchronously -->
<!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>-->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v9.0&appId=323884005467375&autoLogAppEvents=1" nonce="vWZBURQm"></script><body>


  <?php
  if (!isset($_GET['value'])) {
  }else{

    echo $_GET['value'];
  }
  ?>
</body>
</html>