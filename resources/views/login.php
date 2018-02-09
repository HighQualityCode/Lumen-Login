<html>
  <head>
    <title>Lumen Login Test</title>
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
    </script>
    <script type="text/javascript">
      var api_key = $.cookie('apikey');
      var Token = "Token token\"" + api_key + "\""

      $.ajaxSetup({
        header: {
          "Accept": "application/vvv.website+json;version=1",
          "Authorization": Token
        }
          // beforeSend: function (xhr)
          // {
          //    xhr.setRequestHeader("Accept","application/vvv.website+json;version=1");
          //    xhr.setRequestHeader("Authorization", Token);        
          // }
      });
    </script>
  </head>
  <body>
    <div class="form">
      <div class="form-group">
        <label>Email</label>
        <input class="email" type="email" name="email">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="password" name="password">
      </div>
      <div class="form-group submit">
        <button>Login</button>
      </div>
    </div>

    <div class="loginafter">

    </div>
  </body>

  <script>
    $("button").click(function(){
      var email = $('.email').val();
      var password = $('.password').val();
      $.ajax({
        url: 'http://18.219.132.120/index.php/api/login',
        dataType: 'json',
        type: 'post',
        data: { 'email': email, 'password': password},
        crossDomain: true,
        success: function (data, status) {
          $('.form').hide();
          $('.loginafter').show();
          $('.loginafter').append('<div> Welcome <span style="color:red;">'+ data.name +'</span></div>');
          $('.loginafter').append('<div style="margin-top: 20px;"> Your API_KEY is <span style="color:red">'+ data.api_key +'</span></div>');
          $.cookie('apikey', data.api_key);
        },
        error: function(data) {
          $('.form').hide();
          $('.loginafter').show();
          $('.loginafter').append('<div> Email or Password is incorrect </div>');
        }
      });
    });
  </script>

  <style type="text/css">
    body {
      display: flex;
      align-content: center;
      justify-content: center;
    }

    .form {
      align-self: center;
      display: inline-block;
      width: 300px;
      background-color: #eee;
      padding: 20px;
    }

    .loginafter {
      align-self: center;
      display: none;
      background-color: #eee;
      padding: 20px; 
    }

    .form-group {
      padding: 10px 0px;
      width: 100%;
      display: inline-block;
    }

    label {
      float: left;
    }

    input {
      float: right;
    }

    .submit {
      text-align: center;
    }

    button {
      padding: 0 10px;
      font-size: 18px;
      width: 100px;
    }
  </style>
</html>