<?php
require_once('../private/init.php');

if(!isset($_SESSION['id'])){
    header('Location: /login.php');
    exit();
}


//get the user id
$id = $_SESSION['id'];
//get the username
$username = $_SESSION['uid'];
//get the items
$results = getItems($id);

$error = false;
if(isPostRequest()){
    $itemTitle = htmlentities(strip_tags($_POST['title'])) ?? '';
    $itemRange = htmlentities(strip_tags($_POST['priority'])) ?? '';
    
    if($itemTitle == ""){
        $error = true;
    }

    $itemDesc = "This is a item";
    if(!$error){
        addItem($id, $itemTitle, $itemDesc, $itemRange);
    } 
}

$page_title = "Home";
include(SHARED_PATH . '/_header.php');
?>
    <div class="overlay" id="createItemModal">
        <div class="modalBox-content card">
            <span class="close-btn">&times;</span>
            <h1>Create Item</h1>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
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
    <div class="overlay" id="removeModal">
        <div class="modalBox-content card">
            <span class="close-btn">&times;</span>
            <p>Are you sure you want to remove all items</p>
            <div class="buttons">
                <a href="#" class="btn btn-small">Yes</a>
                <a href="#" class="btn btn-small">No</a></div>
        </div>
    </div>
    <main class="container">
        <section class="card home-card">
            <h1>School</h1>
            <?php if($results->num_rows > 0):?>
                <?php while($row = $results->fetch_assoc()): ?>
                    <ul>
                        <li><label><input type="checkbox"> <span class="label-text"><?= $row['title']; 
                        ?></span></label></li>
                    </ul>
                <?php endwhile;?>
            <?php else: ?>
                <ul>
                    <li>Try adding some items in the list</li>
                </ul>
            <?php endif;?>
            <div class="buttons">
                <a href="addItems.php" class="btn btn-small add">Add item</a>
                <a href="removeAll.php" class="btn btn-small remove">Remove All</a>
                <a href="#" class="btn btn-large">Clear finished</a>
            </div>
        </section>
    </main>

<?php include(SHARED_PATH . '/_footer.php');?>