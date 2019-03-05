<?php
require_once('../private/init.php');

//Check if the user is logged in or not.
if(isLoggedIn()){
    header('Location: index.php');
    exit(1);
}
$error = false;
if(isPostRequest()){


    $username   = htmlentities(htmlspecialchars(strip_tags($_POST['username'])));
    $password   = htmlentities(htmlspecialchars(strip_tags($_POST['password'])));
    $rememberMe = $_POST['remember'] ?? '';


    if(empty($username) || empty($password)){
        $error = true;
    }else{
        $id = validateLogin($username, $password);
        echo $id;
    }

    if(!$error){
        $_SESSION['username']   = $username;
        $_SESSION['id']         = $id;
        header('Location: index.php');
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
                <div><input type="text" name="username" placeholder="Username" class="fields"></div>
                <div><input type="text" name="password" placeholder="Password" class="fields"></div>
                <div><label for="remember">Remember me</label><input id="remember" type="checkbox" name="remember"></div>
                <input type="submit" id="submit-btn" name="submit" value="Login">
                <a href="#" class="btn btn-large">Forgot Password!</a>
            </form>
        </section>
    </main>
<?php
include(SHARED_PATH . '/_footer.php');
?>