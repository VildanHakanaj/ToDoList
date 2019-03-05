<?php
require_once('../private/init.php');

$error = false;
$user_id = $_SESSION['id'];
//check if the user is logged in
if(!isLoggedIn()){
    header('Location: login.php');
    exit(1);
}

if(isPostRequest()){

    $item = getValues($_POST);
    insertItem($item, $user_id);
}


$row = getAllItems($user_id);
$page_title = "Home";
include(SHARED_PATH . '/_header.php');

?>
    <div class="overlay" id="createItemModal">
        <div class="modalBox-content card">
            <span class="close-btn">&times;</span>
            <h1>Create Item</h1>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" id="addItem">
                <div>
                    <label for="title">Name</label>
                    <input type="text" name="title">
                    <?php if($error): ?>
                        <span class="error">Error file</span>
                    <?php endif;?>
                </div>
                <div>
                    <label for="priority">Priority</label>
                    <input type="range" name="priority" min="1" max="3" value="0" step="1,2,3" class="slider" id="myRange">
                </div>
                <input type="submit" class="btn btn-large" name="submit">
            </form>
        </div>
    </div>
    <!--BOX OVERLAY-->
    <div class="overlay" id="removeModal">
        <div class="modalBox-content card">
            <span class="close-btn">&times;</span>
            <p>Are you sure you want to remove all items</p>
            <div class="buttons">
                <a href="<?= 'removeAll.php/' . $user_id ?>" class="btn btn-small">Yes</a>
                <a href="#" class="btn btn-small">No</a></div>
        </div>
    </div>
    <main class="container">
        <section class="card home-card">
            <h1>School</h1>
            <?php if(!empty($row)): ?>
                <ul>
                    <?php foreach($row as $item): ?>
                        <li><label><input type="checkbox"> <span class="label-text"><?= $item['title'] ?></span></label></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <li>No tasks yet?</li>
            <?php endif; ?>
            <div class="buttons">
                <a class="btn btn-small add">Add item</a>
                <a href="<?= 'removeAll.php?id='. $user_id ?>" class="btn btn-small remove">Remove All</a>
                <a href="#" class="btn btn-large">Clear finished</a>
            </div>
        </section>
    </main>

<?php include(SHARED_PATH . '/_footer.php');?>