<?php

    require_once('../private/init.php');
    include(SHARED_PATH . '/_header.php');
    $errors = array();
    $user['name'] = '';
    $user['uid'] = '';
    $user['email'] = '';

    //Check if the user has submited the form
    if(isPostRequest()){
        $user['name']   = htmlspecialchars(htmlentities($_POST['name']))    ?? '';
        $user['email']  = htmlspecialchars(htmlentities($_POST['email']))   ?? '';
        $user['uid']    = htmlspecialchars(htmlentities($_POST['uid']))     ?? '';
        $user['pass']   = htmlspecialchars(htmlentities($_POST['pass']))    ?? '';
        
        //Validate the form
        $errors = validateSignup($user, $errors);
        
        //Print the array
        print_array($errors);

        //if no errors continue on registration
        if(empty($errors)){

            registerUser($user);

        }        
    }
    ?>
    <main class="container">
        <section class="card signup-card">
            <h1>Signup</h1>
            <div class="message danger">Invalid Username/Password</div>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="signup">
                <div><input type="text" name="name" placeholder="Name" value="<?=$user['name']?>"></div>
                <div><input type="text" name="email" placeholder="Email" value="<?= $user['email'] ?>"></div>
                <div><input type="text" name="uid" placeholder="Username" value="<?= $user['uid'] ?>"></div>
                <div><input type="password" name="pass" placeholder="Password"></div>
                <input type="submit" name="submit" id="submit-btn" value="Signup"> 
                <a href="#" class="btn btn-large">Already a member</a>
            </form>
        </section>
    </main>
<?php
    include(SHARED_PATH . '/_footer.php');
?>