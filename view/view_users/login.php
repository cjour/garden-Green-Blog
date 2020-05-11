<?php $title='LOGIN'; 
ob_start();
?>

<section class="row justify-content-center">
    
    <form class="col col-sm-10 col-md-8 col-lg-3 encart d-flex flex-column justify-content-center align-items-center" action="index.php?action=verifyMyLogin" method="POST">
        <h1>LOGIN</h1>
 
        <input class="form-control mb-4 mt-4" type="text" name= "Pseudo" placeholder="Pseudo" required>
        <input class="form-control mb-4" type="password" name= "Password" placeholder="Password" required>

        <button type="submit" class="btn btn-success">Log in</button>
              
    </form>
    
</section>

<?php $content = ob_get_clean();

require 'template.php';
?>

