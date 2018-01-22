<?php
session_start();
?>
<html>
  <head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Ecom Lobby</title>
    <link href="index.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="menu">
      <div class="creation">
      <i class="material-icons">perm_identity</i></br></br>
          <a class="btn" href="create.html">Creer votre compte !</a>
      </div>
      <div class="profil">
        <?php
          if ($_SESSION['logged_user'] == "") {
            ?>
            <div>Vous n'êtes pas connectée =(
              <form method='post' action='login.php'>
                <div style="width: 150px">*Login :<input style="width: 200px; height: 25px" type="text" size="80" name="login" value=""/></div>
                <div style="width: 150px">*Mot de passe :<input style="width: 200px; height: 25px" type="password" size="80" name="passwd" value=""/></div>
                <div><input style="width: 200px; height: 25px" type="submit" size="80" name="submit" value="OK"></div>
              </form>
            </div>
            <?php
          }
          else {
            echo "Salut : ";
            echo $_SESSION['logged_user'];
            echo '<br/ >';
            echo "<a href='profil.php'>Vers votre profil</a>";
          }
        ?>
      </div>
      <div class="cart">
        <i class="material-icons">shopping_cart</i></br>
        <a  class="btn" style="margin: 25px; width: 90px; text-align: center" href="cart.php">Panier</a>
      </div>
      <div class="logout">
          <i class="material-icons">shopping_basket</i></br>
          <a  class="btn" style="margin: 2px width: 90px; text-align: center" href="logout.php">Déconnexion</a>
      </div>
    </div>
    <div class="category">
      <ul class="nav">
        <?php
        include('show_categories.php');
        ?>
    </ul>
    </div>
    <div class="container">
      <table>
        <tr>
          <th>
            Nom
          </th>
          <th>
            Image
          </th>
          <th>
             Prix
          </th>
           <th>
           Quantite
          </th>
        </tr>
        <?php
        if ($_GET == NULL)
          include('base/get_first_product.php');
        else
          include('base/display_categories.php');
      ?>
      </table>
    </div>
    <!-- <div class="footer">
    <form id="form_thingy" align="center">
    Recevez nos offres spéciales
    <input id="form_text" size="65" type="text" name="input" value="" title="fill me in">
    <input type="submit" value="S'ABONNER" title="press" style="border: 1px outset; background-color: white">
    </form>
    <div class="category">
      <ul class="nav">
  <li><a href="#">Mentions légales</a></li>
  <li><a href="#">Service client</a></li>
  <li><a href="#">A propos</a></li>
    </ul>
    </div> -->
  </body>
</html>
