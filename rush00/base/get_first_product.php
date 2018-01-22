<?php
require_once('connection.php');
$link = connection();
$produit = mysqli_query($link, "SELECT * FROM t_produit");
while (($array = mysqli_fetch_array($produit, MYSQLI_ASSOC)) !== NULL) {
   $img = file_get_contents($array['image']);
   $file = base64_encode($img);
   ?>
	<tr>
  	<td align="center" width=30%><?= $array['nom'] ?></td>
  	<td align="center" width=30%><img style="width: 160px; height:160px" src="data:image/png;base64,<?= $file ?>">
    </td>
  <td align="center" width=30%><?= $array['prix'] ?>€ </td>
	<td align="center" width=30%>
    <form method='post' action='base/ajoutpanier.php'>
      <input type="hidden" name="id" value="<?=$array['id']?>" >
      <input type="hidden" name="image" value='<?=$array["image"]?>'>
      <input type="hidden" name="prix" value='<?=$array["prix"]?>'>
      <input type="number" name="quantite" value="">
      <input type="submit" name="submit" value="Acheter" class="btn_buy">
    </form>
  </td></tr>
<?php
}
mysqli_close($link);
?>
