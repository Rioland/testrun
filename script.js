// JavaScript code
// You can add JavaScript functionality here
// script.js
// for Login
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    // Here you can add your login logic, for example, sending data to a server for authentication
    console.log("Email: " + email + ", Password: " + password);
});

// script.js
// Register
document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission
    var fullName = document.getElementById('fullName').value;
    var sex = document.getElementById('sex').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var country = document.getElementById('country').value;
    var phoneNumber = document.getElementById('phoneNumber').value;
    // Here you can add your registration logic, for example, sending data to a server for registration
    console.log("Full Name: " + fullName + ", Sex: " + sex + ", Email: " + email + ", Password: " + password + ", Confirm Password: " + confirmPassword + ", Country: " + country + ", Phone Number: " + phoneNumber);
});
// live chart

$(document).ready(function() {
    // Function to fetch live crypto prices
    function fetchCryptoPrices() {
      // Replace these with actual crypto symbols (e.g., BTC, ETH, etc.)
      var cryptoSymbols = ['BTC', 'ETH', 'XRP'];
  
      // Loop through crypto symbols and fetch their prices
      cryptoSymbols.forEach(function(symbol) {
        $.get('https://api.coinbase.com/v2/prices/' + symbol + '-USD/spot', function(data) {
          var price = data.data.amount;
          $('#cryptoPrices').append('<p>' + symbol + ': $' + price + '</p>');
        });
      });
    }
  
    // Fetch crypto prices on page load
    fetchCryptoPrices();
  
    // Fetch crypto prices every 5 seconds (for demonstration purposes)
    setInterval(fetchCryptoPrices, 5000);
  });

