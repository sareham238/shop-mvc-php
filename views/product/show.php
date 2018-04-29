<table class="table">
  <?php
  $isLogin = Session::get('loggedIn');
  $userID = Session::get('userid');
    ?>
    <tr>
      <td><?php echo $this->product['name_p']; ?></td>
      <td><?php echo $this->product['disc_p']; ?></td>
      <td><?php echo $this->product['img_p']; ?></td>
      <td><?php echo $this->product['price_p']; ?></td>
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
            <input id="id_p" name="id_p" type="hidden" value="<?php echo $this->product['id_p'] ?>" />
            <input id="id_u" name="id_u" type="hidden" value="<?php echo $userID ?>" />
          </td>
          <td></td>
        </form>
      <?php }else{ ?>
        <td><a href="<?php echo URL ?>login"><?php echo Please_login_for_add_to_cart; ?></a></td>
      <?php } ?>
    </tr>
</table>
