<?php
$title='SIGN IN';
ob_start();
?>      

<section class="row justify-content-center">
    <form class="col col-sm-10 col-md-8 col-lg-3 encart d-flex flex-column align-items-center" action="index.php?action=verifyMySignIn" method="POST">
        <h1>SIGN IN</h1>
        <input class="form-control mb-4 mt-4" type="text" name= "Pseudo" placeholder="Pseudo" required>
        <input class="form-control mb-4" type="email" name="Email" placeholder="E-mail" required>
        <input id="pass" class="form-control mb-4" type="password" name= "Password" placeholder="Password" required>
        <p id="warningInstruction"> Must contain digit, special character, upper and lower letter and have a length of 8.</p>
        <input id="passConfirm" class="form-control mb-4" type="password" name= "PasswordConfirm" placeholder="Confirm your password" required>
        <button id="submit_sign_in" type="submit" class="btn btn-success">Sign in</button>          
    </form>
</section>
<script src="js/VerificationData.js"></script>
<script src="js/main.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>