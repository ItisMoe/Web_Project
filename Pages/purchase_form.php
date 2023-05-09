<!-- this form is for confirmation of the purchase done by the fan-->
<?php 
session_start();
//if no login done before, the user can not access the page and this will take the user back to the login page directly 
if(!isset($_SESSION["USERNAME"])){
    header("location:../index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Payment Form for Merchandise</title>
    <!--favicon-->
    <link rel='icon' type='image/x-icon' href='../images/fav/purchase-logo.jpg'/>
    <!--link for getting icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--purchase form styling-->
    <link rel="stylesheet" href="../css/purchase_form.css">
</head>
<body>
    <div class="container">
        <h2>Payment Form for Merchandise</h2>
        <!--note for getting points and how they can use them-->
        <small>If you need points, you can win by expecting games' result. Click <a href='#!' style='color:red;'>here</a> to expect.</small>
        <b><span style='color:black;'> Each 200 POINTS is EQUIVELANT to $50.</span></b>
        <form id="paymentForm" action="../php/updateDB.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="cardNumber">Credit Card Number:</label>
            <input type="password" id="cardNumber" name="cardNumber" required>

            <label for="confirmCardNumber">Confirm Credit Card Number:</label>
            <input type="password" id="confirmCardNumber"  name="confirmCardNumber" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="payment">Payment:</label>
            <input type="number" id="payment"  name="payment" min=0 value=0 required>

            <label for="points">Points:</label>
            <input type="number" id="points" name="points" min=0 value=0 required>

            <input type="submit" value="Submit">

            <!-- use these hidden inputs to save the cart value and the quantity chosen by for each item by the fan-->
            <input type="hidden" id="pcart1" name="pcart1" value=<?php echo $_POST["hidden"]; ?>>

            <input type="hidden" id="hidden1" name="hidden1" value=<?php echo $_POST["hidden1"]; ?>>
            <input type="hidden" id="hidden2" name="hidden2" value=<?php echo $_POST["hidden2"]; ?>>
            <input type="hidden" id="hidden3" name="hidden3" value=<?php echo $_POST["hidden3"]; ?>>
            <input type="hidden" id="hidden4" name="hidden4" value=<?php echo $_POST["hidden4"]; ?>>
            <input type="hidden" id="hidden5" name="hidden5" value=<?php echo $_POST["hidden5"]; ?>>
            <input type="hidden" id="hidden6" name="hidden6" value=<?php echo $_POST["hidden6"]; ?>>
            <input type="hidden" id="hidden7" name="hidden7" value=<?php echo $_POST["hidden7"]; ?>>
            <input type="hidden" id="hidden8" name="hidden8" value=<?php echo $_POST["hidden8"]; ?>>

        </form>
        <p class="success-message" id="successMessage"></p>
        <div class="button-container">
            <button id="resetButton"><i class="fas fa-sync"></i> Reset</button>
            <button id="returnButton"><i class="fas fa-arrow-left"></i> Return to Merchandise</button>
        </div>


</div>
<script src="../js/purchase_form.js"></script>

</body>
</html>
