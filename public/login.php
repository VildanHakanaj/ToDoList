<?php
require_once('../private/init.php');

if(isLoggedIn()){
    header('Location: /index.php');
}

//Make the sticky footer
$user['uid'] = '';

//boolean for error display
$error = false;
//Check if the request is post
if(isPostRequest()){
    $user['uid']  = $_POST['uid']  ?? '';
    $user['pass'] = $_POST['pass'] ?? '';

    //Validate the user
    $rows = validateLogin($user);
    if(!empty($rows)){
        //Log in the user
        loginUser($rows);
    }else{
        $error = true;
    }
}

//Create the title of the file  
$page_title = "Login ";
include(SHARED_PATH . '/_header.php');
?>
    <main class="container">
        <section class="card login-card">
            <h1>Login</h1>
            <?php if($error):?>
                <div class="message danger">Invalid Username/Password</div>
            <?php endif; ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" id="login">
                <div><input type="text" name="uid" placeholder="Username" class="fields"></div>
                <div><input type="password" name="pass" placeholder="Password" class="fields"></div>
                <input type="submit" id="submit-btn" name="submit" value="Login">
                <a href="#" class="btn btn-large">Forgot Password!</a>
            </form>
        </section>
    </main>
<?php
    include(SHARED_PATH . '/_footer.php');
?>