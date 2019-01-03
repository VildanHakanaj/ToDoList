<?php
require_once('../private/init.php');
include(SHARED_PATH . '/_header.php');
?>
    <main class="container">
        <section class="card login-card">
            <h1>Login</h1>
            <!-- <div class="message danger">Invalid Username/Password</div> -->
            <form action="#" method="POST" id="login">
                <div><input type="text" placeholder="Username" class="fields"></div>
                <div><input type="password" placeholder="Password" class="fields"></div>
                <input type="submit" id="submit-btn" value="Login">
                <a href="#" class="btn btn-large">Forgot Password!</a>
            </form>
        </section>
    </main>
<?php
    include(SHARED_PATH . '/_footer.php');
?>