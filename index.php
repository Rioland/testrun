<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Add custom styles here */
    .background-image {
      background-image: url('.');
      /* Adjust background properties */
      background-size: cover;
      /* Cover the entire container */
      background-position: center;
      /* Center the background image */
      /* You can also add other background properties like repeat, attachment, etc. */
      height: 100vh;
      /* Set container height to full viewport height */
      /* Add additional styles for your container */
    }

    /* Add custom styles here */
    .center-text {
      text-align: center;
      /* Horizontally center text */
      display: flex;
      justify-content: center;
      /* Horizontally center flex items */
      align-items: center;
      /* Vertically center flex items */
      height: 50vh;
    }
  </style>
</head>

<body class="container-fluid background-image">
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
          <a class="nav-link" href="./dashboard">About</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="./login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./register">Register</a>
        </li>
      </ul>
    </div>
  </nav>




  <!-----end of okay-->

  <main>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6">
          <br>
          <h4>Unlocking Seamless Transactions: Your Gateway to Effortless Crypto Payments.</h4>
          <p>In the fast-paced world of digital finance, the crypto wallet stands as a beacon of security and convenience, revolutionizing the way we send, receive, and store digital assets. As the backbone of the burgeoning cryptocurrency ecosystem, a well-designed crypto wallet is not
            merely a tool but a gateway to a world of seamless transactions and unparalleled financial freedom.</p>
        </div>
        <div class="col-12 col-md-6">
          <img src="./mew wallet 9.jpg" alt="Cryptocurrency Trading" class="img-fluid">
        </div>
      </div>

    </div>

    <div class="container">

      <div class="row">
        <div class="col-md-6">
          <img src="./buy_ether_phone@2x.jpg" alt="Cryptocurrency Investment" class="img-fluid">
        </div>
        <div class="col-md-6">
          <br><br>
          <h3>Buy crypto with just a few taps</h3>
          <p>Buy Ethereum right inside MEW wallet using your bank card or Apple Pay</p>
          <a href="https://changelly.com/buy-crypto" class="btn btn-primary">BUY</a>
          <br><br><br>
          <h3>Own your funds</h3>
          <p>MEW has always been a client-side, truly non-custodial Ethereum interface, and the MEW wallet app carries forward this decentralized philosophy. Cryptocurrency is quite different from traditional banking — you are the only one in control of your funds, and no one can freeze your account or impose restrictions on what you do with your assets.

            This also means that you are the only one who will have your wallet recovery information, so don’t forget to back up your wallet, write down your recovery phrase, and keep it in a safe location!
          </p>
          <p>Imagine a digital safe-deposit box, tailored to your needs, where your funds are not only safeguarded with military-grade encryption but are also accessible at the tip of your fingers, anytime, anywhere. This is the promise of the modern
            crypto wallet—a versatile, user-friendly platform designed to empower individuals and businesses alike.</p>

          <p>At its core, a crypto wallet is your personal vault for storing and managing your digital assets, from Bitcoin to Ethereum and beyond. With its intuitive interface and robust security features, it
            provides a secure haven for your funds, shielding them from unauthorized access and potential threats.</p>
        </div>
      </div>
    </div>


  </main>
  </main>
  <!---- main content again-->
  <div class="container pt-5 mt-5" >



    <p>But a crypto wallet is much more than just a storage solution; it is your gateway to the global economy. With the ability to send and receive payments in seconds, across borders and without intermediaries, it transcends the limitations of traditional banking systems. Whether you're a freelancer seeking payment from clients overseas or a business owner looking to accept crypto payments from customers worldwide, a crypto wallet opens up a world of possibilities.

      Moreover, with the proliferation of decentralized finance (DeFi) platforms, your crypto wallet becomes not only a repository for assets but also a gateway to a wide array of financial services. From earning interest on your idle assets to participating in decentralized exchanges and lending protocols, the possibilities for wealth creation are limitless.

      But perhaps the most compelling aspect of the crypto wallet is its inclusivity. In a world where millions remain unbanked or underserved by traditional financial institutions, crypto wallets offer a lifeline—a chance to participate in the global economy on equal footing. With nothing more than a smartphone and an internet connection,
      anyone, anywhere can create a crypto wallet and join the digital revolution.</p>



  </div>
  <!----------END--------->

  <!---------LIVE CHART-->
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
  
  <h5>Live Crypto Price</h5>

  <div id="cryptoPrices"></div>

  <script>
    // Function to fetch live cryptocurrency prices
    function fetchCryptoPrices() {
      // Replace 'bitcoin' with other cryptocurrency symbols as needed
      const url = 'https://api.coingecko.com/api/v3/simple/price?ids=bitcoin&vs_currencies=usd';

      fetch(url)
        .then(response => response.json())
        .then(data => {
          const cryptoPricesDiv = document.getElementById('cryptoPrices');
          cryptoPricesDiv.innerHTML = ''; // Clear previous content

          for (const [key, value] of Object.entries(data)) {
            const priceElement = document.createElement('p');
            priceElement.textContent = `${key.toUpperCase()} Price: $${value.usd}`;
            cryptoPricesDiv.appendChild(priceElement);
          }
        })
        .catch(error => console.error('Error fetching data:', error));
    }

    // Fetch cryptocurrency prices initially and then every 5 seconds
    fetchCryptoPrices();
    setInterval(fetchCryptoPrices, 5000);
  </script>



  <!--------END LIVE CHART---->



  <!------------footer-->
  <footer class="footer mt-auto py-3 bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <span class="text-white">© 2024 Mew-Wallet</span>
        </div>
        <div class="col-md-6 text-md-right">
          <a href="#" class="text-white">Privacy Policy</a>
          <span class="text-white mx-2">|</span>
          <a href="mailto:support@mew-wallet.com" class="text-white">support@mew-wallet.com</a><span class="text-white mx-2">|</span>
          
          <a href="#" class="text-white">Terms of Service</a>
        </div>
      </div>
    </div>
  </footer>


  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Custom JavaScript -->
  <script src="script.js"></script>


</body>

</html>