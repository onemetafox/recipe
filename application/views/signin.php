<!DOCTYPE html><!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Tue Apr 06 2021 10:37:59 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="606c3380434b8b60d6d84490" data-wf-site="606c337f434b8bec59d84465">
<head>
  <meta charset="utf-8">
  <title>Sign in</title>
  <meta content="Software is a premium Webflow Template for top-notch Software and SaaS companies. If you are looking for a premium dark mode template to take your company website to the next level, Software is the template for you." name="description">
  <meta content="Sign In - Software UI Kit - Webflow Ecommerce Website Template" property="og:title">
  <meta content="Software is a premium Webflow Template for top-notch Software and SaaS companies. If you are looking for a premium dark mode template to take your company website to the next level, Software is the template for you." property="og:description">
  <meta content="https://uploads-ssl.webflow.com/5fbd60e9c0e04c6e2ff0c2e0/5fdd0543a1a0356de75df318_Software%20-%20Featured%20Image.png" property="og:image">
  <meta content="Sign In - Software UI Kit - Webflow Ecommerce Website Template" property="twitter:title">
  <meta content="Software is a premium Webflow Template for top-notch Software and SaaS companies. If you are looking for a premium dark mode template to take your company website to the next level, Software is the template for you." property="twitter:description">
  <meta content="https://uploads-ssl.webflow.com/5fbd60e9c0e04c6e2ff0c2e0/5fdd0543a1a0356de75df318_Software%20-%20Featured%20Image.png" property="twitter:image">
  <meta property="og:type" content="website">
  <meta content="summary_large_image" name="twitter:card">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="<?=asset_url()?>css/normalize.css" rel="stylesheet" type="text/css">
  <link href="<?=asset_url()?>css/webflow.css" rel="stylesheet" type="text/css">
  <link href="<?=asset_url()?>css/inspeqo-b2b.webflow.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="<?=asset_url()?>images/favicon.svg" rel="shortcut icon" type="image/x-icon">
  <link href="<?=asset_url()?>images/webclip.svg" rel="apple-touch-icon">
</head>
<body>
  <div class="page-wrapper utility-page">
    <div data-collapse="medium" data-animation="default" data-duration="400" role="banner" class="header-utility-pages w-nav">
      <div data-w-id="b0cb64df-da64-7f05-5fb0-c0b4610581fe" class="container-header-utility-pages">
        <a href="<?= base_url()?>" class="brand-header-utility-pages w-nav-brand"><img src="<?=asset_url()?>images/logo-software-ui-kit.svg" alt="" class="header-utility-pages-logo"></a>
      </div>
    </div>
    <div class="section utility-page">
      <div data-w-id="f0d1ea51-b3e6-7493-4f14-8ce4ef8a5f92" style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.85, 0.85, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.85, 0.85, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.85, 0.85, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.85, 0.85, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0" class="container-medium-635px">
        <div class="card sign-in">
          <h1 class="title sign-in">Log in to your account</h1>
          <p class="paragraph sign-in">Lorem ipsum dolor sit amet, consectetur adipiscing elit amet odio semper egestas.</p>
          <div class="sign-in-form-block w-form">
            <form id="email-form" name="email-form" data-name="Email Form" redirect="https://softwaretemplate.webflow.io/" data-redirect="https://softwaretemplate.webflow.io/" class="sign-in-form">
              <div class="input-wrapper">
                <label for="Email-2">Email Address</label>
                <input type="email" class="input w-input" maxlength="256" name="Email" data-name="Email" placeholder="Enter email address" id="Email" required="">
              </div>
              <div class="input-wrapper">
                <div class="top-content input-wrapper"><label for="Password">Password</label>
                  <a href="<?= base_url()?>welcome/forget_password" class="recovery-password-link">Forgot Password?</a>
                </div><input type="password" class="input w-input" maxlength="256" name="Password" data-name="Password" placeholder="Enter password" id="Password" required=""><label class="w-checkbox sign-in-checkbox-field">
                  <div class="w-checkbox-input w-checkbox-input--inputType-custom sign-in-checkbox"></div><input type="checkbox" id="checkbox" name="checkbox" data-name="Checkbox" style="opacity:0;position:absolute;z-index:-1"><span class="w-form-label">Remember Password</span>
                </label>
              </div>
              <input type="submit" value="Login" data-wait="Please wait..." class="button-primary w-button">
            </form>
            <div class="success-message w-form-done">
              <div>Welcome back!</div>
            </div>
            <div class="error-message w-form-fail">
              <div>Oops! Something went wrong.</div>
            </div>
          </div>
          <div class="sign-in-new-user-text">Not an user yet? <a href="<?=base_url()?>welcome/signup" class="sign-in-new-user-link">Create an account</a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-utility-pages">
      <div data-w-id="d42c14f3-8713-78af-6796-a7b2fd239a67" class="container-footer-utility-pages">
        <div class="small-print-utility-pages">Copyright 2021 © Software | Designed by <a href="https://brixtemplates.com/" target="_blank">BRIX Templates</a> - Powered by <a href="https://webflow.com/" target="_blank">Webflow</a>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {
        $("form").submit(function (event) {
            var formData = {
                email: $("#Email").val(),
                password: $("#Password").val()
            };
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>/welcome/login",
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function (data) {
              if (data["success"] == true ){
                var user = data["user"];
                if(user.role == 1){
                  window.location = "<?=base_url()?>admin";
                }else{
                  window.location = "<?=base_url()?>dashboard";
                }
              }else{
                $(".error-message > div").html(data["msg"]);
                $(".error-message").attr("display","block");
                $(".success-message").attr("display","none");
              }
              
            });
            event.preventDefault();
        });
    });
  </script>
  <script src="<?= asset_url()?>js/jquery.js" type="text/javascript"></script>
  <script src="<?= asset_url()?>js/webflow.js" type="text/javascript"></script>

  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
  </body>
</html>