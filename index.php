<?php
    $title = 'Home';
    require_once 'includes/nav.php';
    ?>
    <?php include 'includes/sidenav.php'  ?>
    <br><br>
    <?php 
    $product = get_product();     
        if(isset($_GET['id']) && isset($_GET['qty'])){
            if (isset($_SESSION['USER'])) {
                add_cart();
                display_message() ;
            }else{
                set_message(display_error("You Should <a href='login.php' class='text-danger' >Login</a> Or <a href='register.php' class='text-danger' >Register</a>"));
                display_message() ;
            }
        }
    ?>
    <h1 id="prd" class="text-center" ><b>Featured Products</b></h1><br><br>
    <div style="width:98%" class="row">
            <?php while($row = mysqli_fetch_assoc($product)){ ?>
                <div class="col-md-3">    
                <div class="card" style="width: 20rem; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); 
                    border-radius: 10px; /* Coins arrondis pour un effet esthétique */
                    padding: 20px; /* Ajoute de l'espace interne dans la carte */
                    background-color: #fff; margin-bottom: 30px;  ">
                        <img height="300px" width="100%" style="object-fit: contain;" src="admin/img/<?php echo $row['img']?>" alt="">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['prod_name'] ?></h4>
                            <h5 class="card-title"><?php echo $row['price'] ?> DA</h5>
                            <form action="" method="get">
                                <a class="btn" href="product.php?id=<?php echo $row['id'] ?>&id_cat=<?php echo $row['cat_name'] ?>">View More</a>
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" value="Add To Cart" class="btn btn-success">
                            </form>
                        </div>   
                    </div>
                </div>    
                <?php }?>
            </div>

<br>
<?php include 'includes/footer.php'  ?>