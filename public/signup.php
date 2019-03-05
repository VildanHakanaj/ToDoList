<?php

require_once('../private/init.php');
$errors = array();
$user = array();

$user['name'] = '';
$user['email'] = '';
$user['username'] = '';

//Check if the user has submited the form
if (isPostRequest()) {

    $user = getValues($_POST);
    $errors = validateUser($user);
    if (empty($errors)) {
        $user['id'] = insertUser($user);
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header('Location: index.php');
    }
}
//Get the title of the page
$page_title = "Signup";
include(SHARED_PATH . DS . '_header.php');
?>
    <main class="container">
        <section class="card signup-card">
            <h1>Signup</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" id="signup">
                <?php if(array_key_exists('empty', $errors)): ?>
                    <span><?= $errors['empty'] ?></span>
                <?php endif; ?>
                <div>
                    <input type="text" name="name" placeholder="Name" id="name" value="<?= $user['name'] ?>">
                    <?php if (array_key_exists("name", $errors)): ?>
                        <span><?= $errors['name'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="text" name="email" placeholder="Email" id="email" value="<?= $user['email'] ?>">
                    <?php if (array_key_exists("email", $errors)): ?>
                        <span><?= $errors['email'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="text" name="username" placeholder="Username" id="username"
                           value="<?= $user['username'] ?>">
                    <?php if (array_key_exists("username", $errors)): ?>
                        <span><?= $errors['username'] ?></span>
                    <?php endif; ?>
                </div>
                <div>
                    <input type="text" name="password" placeholder="Password" id="password">
                    <?php if (array_key_exists("password", $errors)): ?>
                        <span><?= $errors['password'] ?></span>
                    <?php endif; ?>
                </div>
                <input type="submit" name="submit" id="submit-btn" value="Signup">
                <a href="#" class="btn btn-large">Already a member</a>
            </form>
        </section>
    </main>
<?php
include(SHARED_PATH . '/_footer.php');
?>