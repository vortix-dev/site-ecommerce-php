<?php
    if(isset($_GET['order'])){
        $title = 'My Orders';
    }elseif (isset($_GET['edit_id'])) {
        $title = 'Edit Account';
    }else{
        $title = 'Profile';
    }
    require_once 'includes/nav.php';
    ?>
    <br><br><br><br><br>
<?php
    if(!isset($_SESSION['USER'])){
        header("Location: login.php");
    }  
    $value = view_orders();
    edit_account();
    delete_account();
    display_message();
    display_category('');

?>
<div class="row" style="width:90%;">
    <hr>
    <div style="margin-top: 70px;margin-left:100px;" class="col-md-2 p-1">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link custom-side" href="profile.php?edit_id=<?php echo $_SESSION["USER"]["id"] ?>"><h5><b>EDIT ACCOUNT</b></h5></a></li><hr>
            <li class="nav-item"><a class="nav-link" href="profile.php?order"><h5><b>MY ORDERS</b></h5></a></li><hr>
            <li class="nav-item text-danger"><a class="nav-link" href="profile.php?id=<?php echo $_SESSION["USER"]["id"] ?>"><h5><b>DELETE ACCOUNT</b></h5></a></li><hr>
            <li class="nav-item btn btn-primary"><a class="nav-link" href="logout.php"><h5><b>LOGOUT</b></h5></a></li>
        </ul>
    </div>
    <div class="col">
        <br>
        <?php if(isset($_GET['order'])){?>
            <h2 class="text-center"><b>My Orders</b></h2><br>
            <div class="card">
                    <table class="table table-striped table-bordered table-hover" collspacing="0">
                        <thead>
                            <tr>
                                <th>Products</th>
                                <th>Prices</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                while($row = mysqli_fetch_assoc($value)){ ?>
                                <td><?php echo $row['product'];?></td>
                                <td><?php echo $row['total_price'];?></td>
                                <td><?php echo $row['order_date'];?></td>
                                <?php if($row['order_status'] == 'PENDING' || $row['order_status'] == 'REFUS'){ ?>
                                <td class="text-danger" ><?php echo $row['order_status'];?></td>
                                <?php }else{?>
                                <td class="text-success" ><?php echo $row['order_status'];?></td>
                                <?php } ?>
                            </tr>
                                <?php } ?>

                        </tbody>
                    </table>
            </div>
        <?php } ?>
        <?php if(isset($_GET['edit_id'])){ ?>
            <h2 class="text-center" ><b>Edit Account</b></h2>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-12 col-xl-6">
                    <form action="" method="post">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="">Full Name</label>
                            <input class="form-control" value="<?php echo $name ?>" type="text" name="f_name" placeholder="Full Name">
                        </div>
                        <div class="form-outline mb-4" >
                            <label class="form-label" for="">Username</label>
                            <input class="form-control" value="<?php echo $user ?>" type="text" name="user" placeholder="Username">
                        </div>
                        <div class="form-outline mb-4" >
                            <label class="form-label" for="">E-mail</label>
                            <input class="form-control" value="<?php echo $email ?>" type="email" name="email" placeholder="E-Mail">
                        </div>
                        <div class="form-outline mb-4" >
                            <label class="form-label" for="">Password</label>
                            <input class="form-control"value="<?php echo $pass ?>" type="password" name="pass" placeholder="Password">
                        </div>
                        <div class="form-outline mb-4" >
                            <input class="btn btn-success" name="edit" type="submit" value="Edit">
                        </div>    
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

