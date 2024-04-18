<?php
session_start();
$message ="";
// echo $message = $_SESSION["ERROR"];
if (!empty($_SESSION["ERROR"])) {
    $message = $_SESSION["ERROR"];
    $_SESSION["ERROR"] = "";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="backgroundlogin">
    <header>
        <!-- Header content -->
    </header>

   <!-----okay-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="./mew gif2.gif" width="50px" alt="Cryptocurrency Investment" class="img-fluid"><a class="navbar-brand" href="#">Mew-Wallet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="./">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./">About</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="./register">Register</a>
        </li>
      </ul>
    </div>
  </nav>

<!-----end of okay-->
<!---login-->
<form action="./auth" method="post">
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Login</h2>
                        <form id="loginForm">
                            <div class="form-group">
                                <label for="email">Email or username:</label>
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<script>
                var url = 'https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?30028';
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = url;
                var options = {
                "enabled":true,
                "chatButtonSetting":{
                    "backgroundColor":"#00e785",
                    "ctaText":"Chat with us",
                    "borderRadius":"25",
                    "marginLeft": "0",
                    "marginRight": "20",
                    "marginBottom": "20",
                    "ctaIconWATI":false,
                    "position":"right"
                },
                "brandSetting":{
                    "brandName":"Mew-wallet",
                    "brandSubTitle":"undefined",
                    "brandImg":"https://www.wati.io/wp-content/uploads/2023/04/Wati-logo.svg",
                    "welcomeText":"Hi there!\nHow can I help you?",
                    "messageText":"Hello, %0A I have a question about {{Mew-wallet}}",
                    "backgroundColor":"#00e785",
                    "ctaText":"Chat with us",
                    "borderRadius":"25",
                    "autoShow":false,
                    "phoneNumber":"17608071240"
                }
                };
                s.onload = function() {
                    CreateWhatsappChatWidget(options);
                };
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            </script>
<!------------footer-->
<footer class="footer mt-auto py-3 bg-dark">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <span class="text-muted">© 2024 Mew-Wallet</span>
      </div>
      <div class="col-md-6 text-md-right">
        <a href="#" class="text-muted">Privacy Policy</a>
        <span class="text-muted mx-2">|</span>
        <a href="#" class="text-muted">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>
<!---------END Footer-->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

<script>
    // const toastLiveExample = document.getElementById('liveToast')
    var message = "<?php echo $message ?>"

    if (message) {
        Swal.fire({
            title: 'Error!',
            text: message,
            icon: 'error',
            confirmButtonText: 'Ok'
        })

    }
   
</script>

<!-- <script src="script.js"></script> -->

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Custom JavaScript -->
<script src="script.js"></script>

</body>
</html>