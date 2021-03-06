<?php
require_once('../private/init.php');

if(!isset($_SESSION['id'])){
    header('Location: /login.php');
    exit();
}
include(SHARED_PATH . '/_header.php');


?>
    
    <main class="container">
        <section class="card home-card">
            <?php if(isset($_GET['msg'])):?>
                <div class="message danger">
                    <ul>
                        <li>
                            <?= $_GET['msg'] ?> access
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
            <h1>School</h1>
            <ul>
                <li><label><input type="checkbox"> <span class="label-text">Finish Front End</span></label></li>
                <li><label><input type="checkbox"> <span class="label-text">Learn Laravel</span></label></li>
                <li><label><input type="checkbox"> <span class="label-text">Design the new website</span></label></li>
                <li><label><input type="checkbox"> <span class="label-text">Learn React Js</span></label></li>
            </ul>
            <div class="buttons">
                <a href="#" class="btn btn-small add">Add item</a>
                <a href="#" class="btn btn-small remove">Remove All</a>
                <a href="#" class="btn btn-large">Clear finished</a>
            </div>
        </section>
    </main>

<?php include(SHARED_PATH . '/_footer.php');?>