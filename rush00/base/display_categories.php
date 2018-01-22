<?php
require_once('connection.php');
$link = connection();
$req_pre = mysqli_prepare($link, "SELECT id, nom, prix, image, categorie1, categorie2 FROM t_produit WHERE categorie1=? OR categorie2=?");
mysqli_stmt_bind_param($req_pre, "ss", $_GET['name'], $_GET['name']);
mysqli_stmt_execute($req_pre);
mysqli_stmt_bind_result($req_pre, $donnees['id'], $donnees['nom'], $donnees['prix'], $donnees['image'], $donnees['categorie1'], $donnees['categorie2']);
while (mysqli_stmt_fetch($req_pre) != NULL) {
  $img = file_get_contents($donnees["image"]);
  $file = base64_encode($img);
  ?>
  <tr><td align="center" width=30%><?=$donnees['nom']?></td>
  <td align="center" width=30%><img style="width: 160px; height:160px" src="data:image/png;base64,<?=$file?>"></td>
  <td align="center" width=30%><?=$donnees['prix']?>€ </td>
  <td align="center" width=30%>
  <form action="base/ajoutpanier.php" method="post">
    <input type="hidden" name="id" value='<?=$donnees["id"]?>'>
    <input type="hidden" name="image" value='<?=$donnees["image"]?>'>
    <input type="hidden" name="prix" value='<?=$donnees["prix"]?>'>
    <input type="number" name="quantite" value="">
    <input type="submit" name="submit" value="Acheter" class="btn_buy">
    </form></td></tr>
  <?php
}
mysqli_close($link);
?>
