<?php $title='SIGN IN' ?>
<?php ob_start();?>      

<section class="row justify-content-center">
    <form class="col col-sm-10 col-md-8 col-lg-3 encart d-flex flex-column align-items-center" action="index.php?action=verifyMySignIn" method="POST">
        <h1>SIGN IN</h1>
        
        <input class="form-control mb-4 mt-4" type="text" name= "Pseudo" placeholder="Pseudo" required>
        <input class="form-control mb-4" type="email" name="Email" placeholder="E-mail" required>
        <input class="form-control mb-4" type="password" name= "Password" placeholder="Password" required> 
        <input class="form-control mb-4" type="password" name= "PasswordConfirm" placeholder="Confirm your password" required>

        <button type="submit" class="btn btn-success">Sign in</button>
    
            
    </form>
</section>

<?php $content = ob_get_clean();
require 'template.php';
?>