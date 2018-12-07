<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url() ?>images/microphone.png"/>

    <title>Agent railway | Nguyễn Kiệt - Lộc Ngô</title>

    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?= base_url() ?>Admin_controller/checkUserAccount">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="password" />
              </div>
              <div>
                <input type="submit" class="btn btn-success" value="Log in">
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i></h1>
                  <p>©2018 AGENT RAILWAY </p>
                  <p>Nguyễn Kiệt - Lộc Ngô</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

  </body>
    
</html>
