<?php 
$title= 'Product - Page';
require_once 'includes/nav.php';
?>
    <br><br><br><br><br>
<?php

if(isset($_GET['id']) && isset($_GET['id_cat']) ){
    $cat_id = $_GET['id_cat'];
    $prod_id = $_GET['id'];
    if(isset($_GET['qty'])){
        if(isset($_SESSION['USER'])) {
            add_cart();
            display_message() ;
        }else{
            set_message(display_error("You Should <a href='login.php' class='text-danger' >Login</a> Or <a href='register.php' class='text-danger' >Register</a>"));
            display_message() ;
        }
    }
}else{
    header('Location: index.php');
}
$product = get_product('',$prod_id);
$result = mysqli_fetch_assoc($product);
$products = product_related();
?>
<br><br>
<div style="width:97%" class="row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="card" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
                    border-radius: 10px; /* Coins arrondis pour un effet esthétique */
                    padding: 20px; /* Ajoute de l'espace interne dans la carte */
                    background-color: #fff; margin-bottom: 30px;  ">
            <img height="500px" weight="500px" src="admin/img/<?php echo $result['img'] ?>" alt="">
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
                    border-radius: 10px; /* Coins arrondis pour un effet esthétique */
                    padding: 20px; /* Ajoute de l'espace interne dans la carte */
                    background-color: #fff; margin-bottom: 30px;  ">
            <h1 class="card-body text-center mt-3" ><?php echo $result['prod_name'] ?></h1>
            <hr>
            <h4 class="text-center" ><?php echo $result['price'] ?> DA</h4>
            <hr>
            <p class="card-text p-3" ><?php echo $result['description'] ?></p>
            <form class="p-2" action="" method="get">
                <div class="d-flex justify-content-center">
                    <input type="hidden" name="id" value="<?php echo $prod_id ?>">
                    <input type="hidden" name="id_cat" value="<?php echo $cat_id ?>">
                    <input class="text-center" type="number" name="qty" value="1" min="1" max="10" required>&nbsp;
                    <input type="submit" class="btn" value="Add To Cart">&nbsp;
                    <a class="btn btn-success" href="cart.php">Go To Cart</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="" 
style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2) inset; 
                    
    background-color: aliceblue;
    background-size: cover;
    background-position: center;
    align-items: center; /* Centre verticalement la carte */
    padding-left: 50px; /* Padding à gauche */
">
<hr style="color:aliceblue;">
<br>
<h1 class="text-center" ><b>Related Product</b</h1><br>
<br>

<div style="width:95%;margin-left:29px" class="row">
            <?php while($row = mysqli_fetch_assoc($products)){ ?>
            <div class="col-md-3">    
                <div class="card" style="box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
                    border-radius: 10px; /* Coins arrondis pour un effet esthétique */
                    background-color: #fff; margin-bottom: 30px;  ">
                    <img height="300px" width="100%" style="object-fit: contain;" src="admin/img/<?php echo $row['img']?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $row['prod_name'] ?></h4>
                        <h5 class="card-title"><?php echo $row['price'] ?> DA</h5>
                        <a class="btn btn-success" href="product.php?id=<?php echo $row['id'] ?>&id_cat=<?php echo $row['cat_name'] ?>">View More</a>
                    </div>   
                </div>
            </div>    
            <?php }?>
            </div>
            
<br><br>
<?php include 'includes/footer.php' ?>

