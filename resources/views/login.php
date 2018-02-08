<html>
  <head>
    <title>Lumen Login Test</title>
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
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
        url: 'login',
        dataType: 'json',
        type: 'post',
        data: { 'email': email, 'password': password},
        success: function (data, status) {
          $('.form').hide();
          $('.loginafter').show();
          $('.loginafter').append('<div> Welcome <span style="color:red;">'+ data.name +'</span></div>');
          $('.loginafter').append('<div style="margin-top: 20px;"> Your API_KEY is <span style="color:red">'+ data.api_key +'</span></div>');
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