<?php
session_start();
?>
<html>
  <head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Panier</title>
    <link href="cart.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <div class="menu">
      <div class="creation">
      <i class="material-icons">perm_identity</i></br></br>
          <a class="btn" href="create.html">Creer votre compte !</a>
      </div>
      <h1 text-align=center>Votre panier</h1>
      <div class="modifier">
      <i class="material-icons">perm_contact_calendar</i></br></br>
        <a class="btn" href="modif.html">Modifier votre compte</a>
      </div>
      <div ><a href="index.php">Retour au Lobby</a></div>
      <div class="logout">
          <i class="material-icons">shopping_basket</i></br>
          <a  class="btn" style="margin: 2px width: 90px; text-align: center" href="logout.php">Déconnexion</a>
      </div>
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
           Quantite au panier
          </th>
        </tr>
      <?php
      include('panier.php');
      ?>
    </table>
    </br>
    <a  href="panier.php?validation=ok" class="btn_conf" style="margin: 2px width: 160px; text-align: center">Confirmer ma commande</a>
    </div>
    <div class="footer">
    <form id="form_thingy" align="center">
    <a class="">Recevez nos offres spéciales</a>
    <input id="form_text" size="65" type="text" name="input" value="" title="fill me in">
    <input type="submit" value="S'ABONNER" title="press" style="border: 1px outset; background-color: white">
    </form>
    <div class="category">
      <ul class="nav">
  <li><a href="#">Mentions légales</a></li>
  <li><a href="#">Service client</a></li>
  <li><a href="#">A propos</a></li>
    </ul>
    </div>
  </body>
</html>

</table>
