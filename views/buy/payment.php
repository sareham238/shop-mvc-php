<h1><?php echo Payment; ?></h1>
<br/><br/>
<?php
if (!empty($this->massage)) {
  if (isset($this->massage['err_paygate']) && $this->massage['err_paygate'] == 1) {
    echo ERR_EMP_Paygate;
  }
} ?>
<br/><br/>
<h2><?php echo Info_Customer; ?></h2>
<table class="table">
  <tr>
    <td><?php echo Name_Customer; ?></td>
    <td><?php echo Address_Customer; ?></td>
    <td><?php echo Tel_Customer; ?></td>
  </tr>
  <tr>
    <td><?php echo $this->customerinfo['name_ui'] ?></td>
    <td><?php echo $this->customerinfo['address_ui'] ?></td>
    <td><?php echo $this->customerinfo['tel_ui'] ?></td>
  </tr>
</table>
<h2><?php echo List_Product; ?></h2>
<table class="table">
  <tr>
    <td><?php echo Name_Product; ?></td>
    <td><?php echo Count_Product; ?></td>
    <td><?php echo Price_Product; ?></td>
    <td><?php echo Price_Product_Cart; ?></td>
  </tr>
  <tfoot>
    <tr>
      <th><?php echo Sum_count_cart; ?></th>
      <th><?php echo $this->sumCount; ?></th>
      <th><?php echo Sum_price_cart; ?></th>
      <th><?php echo $this->sumPrice; ?></th>
    </tr>
  </tfoot>
  <?php foreach ($this->cart as $cart) { ?>
    <tr>
      <td><?php echo $cart['name_p']; ?></td>
      <td><?php echo $cart['count_c']; ?></td>
      <td><?php echo $cart['price_p']; ?></td>
      <td><?php echo $cart['price_all']; ?></td>
    </tr>
  <?php } ?>
</table>
<br />
<br />
<h2><?php echo Payment_Mode; ?></h2>
<form action="" method="post">
  <ul class="list-group">
    <?php foreach ($this->paygates as $paygate) { ?>
      <div class="radio">
        <label>
          <input type="radio" name="paygate" id="paygate" value="<?php echo $paygate['id_pg']; ?>">
          <?php echo $paygate['name_pg']; ?>
        </label>
      </div>
    <?php } ?>
  </ul>
  <input type="submit" name="send_btn" id="send_btn" value="<?php echo Payment; ?>" />
  <input type="hidden" name="priceAll" id="priceAll" value="<?php echo $this->sumPrice; ?>" />
</form>
