<?php
    require_once 'header.php';
    $cat = display_category('');
    if(isset($_SESSION['USER'])){
      $row = view_account();
      while ($rows = mysqli_fetch_assoc($row)) {
        $name = $rows['f_name'];
        $user = $rows['username'];
        $email = $rows['email'];
        $pass = $rows['pass']; 
      }
      $num = display_cart();
      $nums = mysqli_num_rows($num);  
    }
?>
<style>
body {
  font-family: "Poppins", serif;
  margin: 0;
  padding: 0;
}

.navbar {
  background-color: white !important;
  box-shadow : 0px 0px 6px 1px rgb(145, 145, 145);
}

.navbar-nav-custom {
  padding-left: 350px;
}

/* Style des liens de navigation */
.navbar .nav-link {
  color: black !important;
  font-size: 1.2rem; /* Agrandit le texte */
  font-weight: bold;
  text-transform: uppercase;
  margin-left: 10px; /* Espacement entre les liens */
  margin-right: 10px; /* Espacement entre les liens */
  text-align: center;
  transition: transform 0.3s ease, color 0.3s ease; /* Transition douce */
}

.navbar .nav-link:hover {
  color: orange !important; /* Change la couleur en orange */
  transform: translateY(-3px); /* Soulevement léger de 3px */
}

/* Logo dans la navbar */
.d-inline-block {
  margin-left: 70px;
  width: 100px;
  height: 105px;
}

/* Centrage des liens de navigation */
.navbar-nav-custom {
  margin: 0 auto; /* Centrer les liens */
}

/* Style des icônes des réseaux sociaux */
.navbar .fa {
  color: orange; /* Couleur orange */
  font-size: 1.5rem; /* Taille des icônes */
}

.navbar .fa:hover {
  opacity: 0.8; /* Effet hover */
}

/* Changer la couleur du bouton du menu hamburger */
.navbar-toggler-icon {
  background-color: black !important; /* Bordure en noir */
}










/* contenue pricipale */
.slogan {
height: 400px;
  color: #FF5733; /* Remplace par la couleur de ton choix (hex, rgb, ou nom de couleur) */
  font-family: 'Poppins', sans-serif; /* Remplace 'Poppins' par la police que tu préfères */
  text-transform: capitalize; /* Capitalise la première lettre de chaque mot */
  letter-spacing: 1px; /* Espacement des lettres */
  text-align: center; /* Centre le texte horizontalement */
  margin-top: 170px; /* Ajuste l'espacement */
}
.fs-1 {
  font-size: 4.5rem !important;
}




#video-banner {
  position: relative;
  height: 40vh;
  overflow: hidden;
}

#video-banner video {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100%;
  height: 100%;
  object-fit: cover;
}



</style>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top navbar-scroll bg-dark navbar-dark">
            <div class="container-fluid">
                    <img 
                        src="./assets/img/des.png"
                        alt="Logo" 
                            width="80px" 
                            height="80px" 
                        class="d-inline-block align-text-center">

                        
                        <button
                        class="navbar-toggler ms-auto text-dark"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarExample01"
                        aria-controls="navbarExample01"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
</svg>                  </button>
                    
    
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav navbar-nav-custom me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                        <a class="nav-link active" aria-current="page"  href="index.php"><h5><b>Home</b> <span class="sr-only">(current)</span></h5></a>
                        </li>
                        <?php 
                            while($row = mysqli_fetch_assoc($cat)){
                        ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="category.php?id_cat=<?php echo $row['id'] ?>"><h5><b><?php echo $row["cat_name"] ?></b></h5></a>
                            </li>
     
                        <?php
                                }
                        ?>

                    <?php if (isset($_SESSION['USER'])) { ?>
                        <li class="nav-item active">
                        <a class="nav-link active" aria-current="page"  href="profile.php?order"><h5><b>Profile</b> <span class="sr-only">(current)</span></b></h5></a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link active" aria-current="page"  href="cart.php"><i class="fa-solid fa-cart-shopping fa-lg" style="color:rgb(0, 0, 0);"><sup><?php echo $nums ?></sup></i></a>
                            </li> 
                        <?php } else { ?>
                        <li class="nav-item active">
                        <a class="nav-link active" aria-current="page"  href="login.php"><h5><b>Login</b> <span class="sr-only">(current)</span></h5></a>
                        </li>
                        <li class="nav-item active">
                        <a class="nav-link active" aria-current="page"  href="register.php"><h5><b>Register</b> <span class="sr-only">(current)</span></h5></a>
                        </li>
                        <?php } ?>

                    </ul>
                   
                </div>
            </div>
        </nav>

