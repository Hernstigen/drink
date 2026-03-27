<!DOCTYPE html>
<?php require_once("asset.php"); ?>
<?php
$mess="";
if(isset($_SESSION['mess'])){
    $mess=$_SESSION['mess'];
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Drinks</h1>
    </header>
<?php require_once("_nav.php"); ?>
    <main>
<h1><?=$mess;?></h1>

<a href="add_drink.php" class="addDrink">Add your drink!</a>

<?php
    $sql="SELECT * FROM tbl_drinks ORDER BY rating DESC";
    $result=mysqli_query($conn, $sql);
?>

<?php while($row=mysqli_fetch_assoc($result)): ?>
<details>
    <summary>
        <div class="drinkCard"><h2><?=$row['drinkname']?>&nbsp&nbsp<span><?=isAlcoholic(intval($row['alcoholic']))?></span></h2><h4><?=$row['description']?></h4></div>
        <div class="filler"></div>
        <div>Rated: <?=showRating($row['rating'])?></div>
        <div></div>
    </summary>
    
    <div class="ingredients">
    <pre><?=$row['ingredients']?></pre>
    </div>

    <div class="recipe">
    <pre><?=$row['recipe']?></pre>
    </div>
</details>
<?php endwhile; ?>

    </main>
<?php require_once("_footer.php"); ?>
        <dialog id="login" popover>
            <form action="_login.php" method="POST">
                <input type="text" name="user" id="user" placeholder="Username" required>
                <input type="password" name="pass" id="pass" placeholder="Password" required>
                <input type="submit" name="btn_login" value="Log in">
            </form>
        </dialog>
</body>
</html>