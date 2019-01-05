<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <title>Home - To Do App</title>
</head>
<body>
    <div class="overlay" id="createItemModal">
        <div class="modalBox-content card">
            <span class="close-btn">&times;</span>
            <h1>Create Item</h1>
            <form action="">
                <div>
                    <label for="title">Name</label>
                    <input type="text" name="title">
                </div>
                <div>
                    <label for="priority">Priority</label>
                    <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
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
    <nav id="menu">
        <div class="container">
            <h3>Wish List</h3>
            <ul>
                <?php if(isset($_SESSION['id'])): ?>
                    <li> <a href="/index.php">Home</a></li>
                    <li> <a href="#">Items</a></li>
                    <li><a href="/logout.php">Logout</a></li>
                <?php else: ?>
                    <li> <a href="/login.php">Login</a></li>
                    <li> <a href="/signup.php">Signup</a></li>
                <?php endif;?>
            </ul>
        </div>
    </nav>