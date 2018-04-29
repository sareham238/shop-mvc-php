<table class="table">
  <?php
  $isLogin = Session::get('loggedIn');
  $userID = Session::get('userid');
  foreach ($this->products as $product) {
    ?>
    <tr>
      <td><a href="<?php echo URL ?>product/show/<?php echo $product['id_p'] ?>"><?php echo $product['name_p']; ?></a></td>
      <td><?php echo $product['img_p']; ?></td>
      <td><?php echo $product['price_p']; ?></td>
      <?php
      if($isLogin){
        ?>
        <form action="<?php echo URL; ?>cart/nc" method="post">
          <td>
            <lable for="count"><?php echo Count_Product; ?></lable>
            <input id="count" name="count" type="text" value="<?php echo $this->count ?>" />
          </td>
          <td>
            <input id="sumbit" name="sumbit" type="submit" value="<?php echo Add_to_cart ?>" />
            <input id="id_p" name="id_p" type="hidden" value="<?php echo $product['id_p'] ?>" />
            <input id="id_u" name="id_u" type="hidden" value="<?php echo $userID ?>" />
          </td>
          <td></td>
        </form>
      <?php }else{ ?>
        <td><a href="<?php echo URL ?>login"><?php echo Please_login_for_add_to_cart; ?></a></td>
      <?php } ?>
    </tr>
  <?php } ?>
</table>
