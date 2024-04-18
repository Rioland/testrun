<?php
ob_start();
session_start();
if (empty($_SESSION["user_id"])) {
  $_SESSION["ERROR"] = "Please login";
  header("Location:./login");
}
$message = "";
if (!empty($_SESSION["ERROR"])) {
  $message = $_SESSION["ERROR"];
  $_SESSION["ERROR"] = "";
}
$success = "";
if (!empty($_SESSION["MESSAGE"])) {
  $success = $_SESSION["MESSAGE"];
  $_SESSION["MESSAGE"] = "";
}





require("./app/function.php");
require("./app/config/config.php");

$userDetails = getUserDetails($conn, $_SESSION["user_id"]);
$address = "";
if (empty($userDetails["btc_address"])) {
    $address = generateBitcoinAddress();
    if (!empty($address)) {
        updateBTCAddress($conn, $_SESSION["user_id"], $address);
    }
} else {
    $address = $userDetails["btc_address"];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
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
        <li class="nav-item">
          <a class="nav-link" href="./logout">Logout</a>
        </li>
      </ul>
    </div>
  </nav>




  <!-----end of okay-->
  <!--------dashboard------>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6">
        <div class="card1">
          <div class="card-body">
            <h5 class="card-title1"><strong>Wallet Balance</strong></h5>
            <p class="card-text1"><strong>$<?php echo round($userDetails["balance"] ?? 0, 2) ?></strong></p>
            <p>Bitcoin Deposit Address</p>
            <input type="text" class="form-controls p-1 w-100" style="width:fit-content;" value="<?php echo $address;  ?>" readonly>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Profits Balance</strong></h5>
            <p class="card-text"><strong>$<?php echo round(getUserTotalProfit($conn, $_SESSION["user_id"]) ?? 0, 2) ?></strong></p>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Send</strong></h5>
            <p class="card-text"><strong>cryptocurrency to other users.</strong></p>
            <a href="./send-money" class="btn btn-primary">Send</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Withdraw</strong></h5>
            <p class="card-text"><strong>Withdraw to Cryptowallet.</strong></p>
            <a href="./withdraw" class="btn btn-primary">Withdraw</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Transaction History</strong></h5>
            <div class="table-responsive wow border-bottom-0 border-secondary border">
              <table class="table ">




                <thead class="text-white">
                  <tr class="text-secondary">
                    <th scope="col">
                      <p class="ms-0">DESCRIPTION</p>
                    </th>
                    <th scope="col">
                      <p class="ms-5">TRANSACTION ID</p>
                    </th>
                    <th scope="col">
                      <p class="ms-5">TYPE</p>
                    </th>
                    <th scope="col">
                      <p class="ms-5">AMOUNT</p>
                    </th>
                    <th scope="col">
                      <p class="ms-5">FEE</p>
                    </th>
                    <th scope="col">
                      <p class="ms-5">STATUS</p>
                    </th>
                    <th scope="col">
                      <p class="ms-5">GETAWAY</p>
                    </th>
                  </tr>
                </thead>
                <tbody>


                  <?php
                  $allTransaction = getUserTransactions($conn, $_SESSION["user_id"]);
                  foreach ($allTransaction as $key => $value) {

                  ?>
                    <tr class="text-white">
                      <th scope="row">
                        <div class="d-flex">
                          <i class="fa-solid text-white mt-2 border-0 p-1 me-2 rounded-pill bg-primary fa-arrow-right"></i>
                          <div class="ms-3 mt-2">
                            <p class="text-white fw-bold fs-6"><?php echo ($value["description"]);  ?></p>
                            <p class="text-secondary"><?php echo (formatDateTime($value["created_at"]));  ?></p>
                          </div>
                      </th>
                      <td>
                        <p class="fw-bold fw-5 ms-5 mt-5 text-secondary"><?php echo ($value["transaction_id"]);  ?></p>
                      </td>
                      <td>
                        <p class="text-white border-0 mt-5 sendm bg-info p-2 rounded fw-semibold"><?php echo ($value["type"]);  ?></p>
                      </td>
                      <td>
                        <p class="
            
            <?php
                    if ($value["type"] == "Withdrawal" or $value["type"] == "Investment" or $value["type"] == "Transfer") {
                      echo ("text-danger");
                    } else {
                      echo ("text-primary");
                    }

            ?>
            
            fw-bold mt-5 ms-5 text-opacity-50 usd"><?php
                                                    if ($value["type"] == "Withdrawal" or $value["type"] == "Investment" or $value["type"] == "Transfer") {
                                                      echo ("- " . $value["amount"] - $value["fee"]);
                                                    } else {
                                                      echo ("+ " . $value["amount"] - $value["fee"]);
                                                    }





                                                    ?> USD</p>
                      </td>
                      <td>
                        <p class="text-info ms-5 mt-5 fw-bold">
                          <?php echo ($value["fee"]);  ?> USD
                        </p>
                      </td>
                      <td>
                        <p class="text-white ms-5 mt-5 border-0 <?php if ($value["status"] == "Completed") {
                                                                  echo "bg-success";
                                                                } elseif ($value["status"] == "Failed") {
                                                                  echo "bg-danger";
                                                                } else {
                                                                  echo "bg-infor";
                                                                }

                                                                ?>  p-1 rounded sendm fw-semibold"><?php echo ($value["status"]);  ?></p>
                      </td>
                      <td>
                        <p class="fw-bold ms-5 mt-5 text-primary"><?php echo ($value["gateway"]??"system");  ?></p>
                      </td>

                    </tr>
                  <?php

                  }


                  ?>



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <<script>
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    const toastLiveExample = document.getElementById('liveToast')
    var message = "<?php echo $message ?>"
    var success = "<?php echo $success ?>"
    if (message) {
      Swal.fire({
        title: 'Error!',
        text: message,
        icon: 'error',
        confirmButtonText: 'Ok'
      })

    }
    if (success) {
      Swal.fire({
        title: 'success!',
        text: success,
        icon: 'success',
        confirmButtonText: 'Ok'
      })

    }
  </script>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom JavaScript -->
  <script src="script.js"></script>

</body>

</html>