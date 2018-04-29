<br/><br/>
<?php if($this->product['id_p'] != 0){ ?>
  <h2><?php echo Edit ." ". $this->product['name_p'] ?></h2>
<?php } else { ?>
  <h2><?php echo New_Product ?></h2>
<?php } ?>
<br/><br/>
<?php
if (!empty($this->massage)) {
  if (isset($this->massage['err_name']) && $this->massage['err_name'] == 1) {
    echo ERR_EMP_Name_Product;
  }
  echo "<br/>";
  if (isset($this->massage['err_disc']) && $this->massage['err_disc'] == 1) {
    echo ERR_EMP_Discription_Product;
  }
} ?>
<br/><br/>
<form action="" method="post">
  <table class="table">
    <tr><td><h3><?php echo General; ?></h3></td></tr>
    <tr>
      <td><label for="name_p"><?php echo Name_Product; ?> :</label></td>
      <td><input id="name_p" name="name_p" type="text" value="<?php echo $this->product['name_p'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="disc_p"><?php echo Discription_Product; ?> :</label></td>
      <td><textarea id="disc_p" name="disc_p" rows="4"><?php echo $this->product['disc_p'] ; ?></textarea></td>
    </tr>
    <tr><td><h3><?php echo Information; ?></h3></td></tr>
    <tr>
      <td><label for="img_p"><?php echo Image_Product; ?> :</label></td>
      <td><input id="img_p" name="img_p" type="text" value="<?php echo $this->product['img_p'] ; ?>"/></td>
    </tr>
    <tr>
      <td><label for="price_p"><?php echo Price_Product; ?> :</label></td>
      <td><input id="price_p" name="price_p" type="text" value="<?php echo $this->product['price_p'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="count_p"><?php echo Count_Product; ?> :</label></td>
      <td><input id="count_p" name="count_p" type="text" value="<?php echo $this->product['count_p'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="status_p"><?php echo Status_Product; ?> :</label></td>
      <td><input id="status_p" name="status_p" type="text" value="<?php echo $this->product['status_p'] ; ?>" /></td>
    </tr>
    <tr>
      <td><input id="send_btn" name="send_btn" type="submit" value="<?php echo Send_btn ?>" /></td>
    </tr>
  </table>
</form>
