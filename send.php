
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

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Crypto</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body class="backgroundlogin1">

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
          <a class="nav-link" href="./account">Back</a>
      </ul>
    </div>
  </nav>




  <div class="container mt-5">
    <div class="card p-4" style="width: fit-content;">
      <h1>Send Crypto</h1>
      <form id="sendCryptoForm" method="POST"  action="./transfer-funds">
        <!-- <div class="form-group1">
          <label for="cryptoType">Select Cryptocurrency:</label>
          <select class="form-control" id="cryptoType" required>
            <option value="">Choose...</option>
            <option value="BTC">Bitcoin</option>
            <option value="ETH">Ethereum</option>
            <option value="LTC">Litecoin</option>
          </select>
        </div> -->
        <div class="form-group">
          <label for="receiverAddress">Receiver's Email Addess:</label>
          <input type="email" class="form-control w-100" name="recipients" id="receiverAddress" required>
        </div>
        <br>
        <div class="form-group">
          <label for="amount">Amount in USD:</label>
          <input type="number" name="amount" class="form-control w-100" id="amount" min="0"  required>
        </div>
        <br>
        <div class="form-group">
          <label for="receiverAddress">Description:</label>
          <input type="text" class="form-control w-100" name="desc" id="receiverAddress" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>



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
  <script src="script.js"></script>
</body>

</html>