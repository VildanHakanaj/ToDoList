<?php

    require_once('../private/init.php');
    

    $errors = array();
    $error = false;
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
        $errors = validateSignup($user);

        if(empty($errors)){
            registerUser($user);
        }else{
            $error = true;
        }
    }
    //Get the title of the page
    $page_title = "Signup";
    include(SHARED_PATH . '/_header.php');
    ?>
    <main class="container">
        <section class="card signup-card">
            <h1>Signup</h1>
                <?php  if($error): ?>
                    <div class="message danger">
                        <ul>
                            <?php if(is_array($errors)): ?>
                                <?php foreach($errors as $error => $value):?>
                                    <span><?= $value ?></span>    
                                <?php endforeach;?>
                            <?php else:?>
                                <span><?= $errors; ?></span>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>
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