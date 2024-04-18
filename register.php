<?php
session_start();
$error = "";
$success = "";
if (!empty($_SESSION["ERROR"])) {
    $error = $_SESSION["ERROR"];
    $_SESSION["ERROR"] = "";
}

if (!empty($_SESSION["MESSAGE"])) {
    $success =  $_SESSION["MESSAGE"];
    $_SESSION["MESSAGE"] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="backgroundlogin">

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
                    <a class="nav-link" href="./login">Login</a>
                </li>
            </ul>
        </div>
    </nav>




    <!-----end of okay-->

    <!-----register----->

    <form action="./createAccount" method="post">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center mb-4">Register</h3>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="fullName">FirstName:</label>
                                    <input type="text" class="form-control" id="firstname" name="firstName" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastname">LastName:</label>
                                    <input type="text" class="form-control" id="lastname" name="lastName" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <!-- <div class="form-group col-md-6">
                                <label for="sex">Sex:</label>
                                <select class="form-control" id="sex" name="sex" required>
                                    <option value="">Select...</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="female">Others</option>
                                </select>
                            </div> -->
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirmPassword">Confirm Password:</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="cpassword" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="country">Country:</label>
                                    <input type="text" class="form-control" id="country" name="country" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phoneNumber">Phone Number:</label>
                                    <input type="tel" class="form-control" id="phoneNumber" name="phone" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-check ms-0 ms-md-5">
                                <input class="form-check-input" name="terms" required type="checkbox" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <p>I agree with <span><a href="#" class="link-danger fw-bold link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover">Privacy
                                                & Policy</a></span> and <span><a href="#" class="link-danger fw-bold link-offset-2 link-underline-opacity-0 link-underline-opacity-0-hover">Terms
                                                & Condition</a></span></p>
                                </label>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>

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
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#00e785",
                "ctaText": "Chat with us",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginRight": "20",
                "marginBottom": "20",
                "ctaIconWATI": false,
                "position": "right"
            },
            "brandSetting": {
                "brandName": "Mew-wallet",
                "brandSubTitle": "undefined",
                "brandImg": "https://www.wati.io/wp-content/uploads/2023/04/Wati-logo.svg",
                "welcomeText": "Hi there!\nHow can I help you?",
                "messageText": "Hello, %0A I have a question about {{Mew-wallet}}",
                "backgroundColor": "#00e785",
                "ctaText": "Chat with us",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "17608071240"
            }
        };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>



    <!-- Footer content -->
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

    <script>
        var message = "<?php echo $message ?>";

        if (message.length > 0) {
            Swal.fire({
                title: 'Error!',
                text: message,
                icon: 'error',
                confirmButtonText: 'Ok'
            })

        }
        var success = "<?php echo $success ?>";

        if (success.length > 0) {
            Swal.fire({
                title: 'Success!',
                text: success,
                icon: 'success',
                confirmButtonText: 'Ok'
            })

        }

        // var succ = "<?php //echo $success; 
                        ?>";
        // if (succ.length>0 ) {
        //     Swal.fire({
        //         title: 'success!',
        //         text: success,
        //         icon: 'success',
        //         confirmButtonText: 'Ok'
        //     })

        // }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <!-- <script src="script.js"></script> -->
</body>

</html>