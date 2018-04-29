<table class="table">
  <?php
  if(!empty($this->cart)){
    ?>
    <tfoot>
      <td></td>
      <td></td>
      <td align="left"><?php echo Sum_count_cart; ?> :</td>
      <th><?php echo $this->sumCount; ?></th>
      <td align="left"><?php echo Sum_price_cart; ?> :</td>
      <th><?php echo $this->sumPrice; ?></th>
      <th><a href="<?php echo URL ?>buy/customerinfo"><?php echo Get_Buy ?></a></th>
    </tfoot>
    <tbody>
      <tr>
        <td><?php echo NO; ?></td>
        <td><?php echo Name_Product; ?></td>
        <td><?php echo DateTime; ?></td>
        <td><?php echo Count_Product; ?></td>
        <td><?php echo Price_Product; ?></td>
        <td><?php echo Price_Product_Cart; ?></td>
        <td><?php echo Tools; ?></td>
      </tr>
      <?php
      $count = 0;
      foreach ($this->cart as $cart) {
        ?>
        <tr>
          <td><?php echo ++$count; ?></td>
          <td><?php echo $cart['name_p']; ?></td>
          <td><?php echo jdate('Y/m/d H:i:s',$cart['time_c']); ?></td>
          <td><?php echo $cart['count_c']; ?></td>
          <td><?php echo $cart['price_p']; ?></td>
          <td><?php echo $cart['price_all']; ?></td>
          <td><a href="<?php echo URL ?>cart/dc/<?php echo $cart['id_c'] ?>"><?php echo Delete ?></a></td>
        </tr>
        <?php
      }
      ?>
    </tbody>
    <?php
  }else {
    echo MSG_Empty_Cart;
  }
  ?>
</table>
