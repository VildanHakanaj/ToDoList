<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <title><?= $page_title; ?> - To Do App</title>
</head>
<body>
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