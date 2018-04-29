<br/><br/>
<?php if($this->paygate['id_pg'] != 0){ ?>
  <h2><?php echo Edit ." ". $this->paygate['name_pg'] ?></h2>
<?php } else { ?>
  <h2><?php echo Add_Payment_Gateway ?></h2>
<?php } ?>
<br/><br/>
<?php
if (!empty($this->massage)) {
  if (isset($this->massage['err_name']) && $this->massage['err_name'] == 1) {
    echo ERR_EMP_Name_Payment_Gateway;
  }
  echo "<br/>";
  if (isset($this->massage['err_api']) && $this->massage['err_api'] == 1) {
    echo ERR_EMP_API_Payment_Gateway;
  }
} ?>
<br/><br/>
<form action="" method="post">
  <table class="table">
    <tr>
      <td><label for="name_pg"><?php echo Payment_Gateway_Name; ?> :</label></td>
      <td><input id="name_pg" name="name_pg" type="text" value="<?php echo $this->paygate['name_pg'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="api_pg"><?php echo Payment_Gateway_API; ?> :</label></td>
      <td><input id="api_pg" name="api_pg" type="text" value="<?php echo $this->paygate['api_pg'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="status_pg"><?php echo Payment_Gateway_State; ?> :</label></td>
      <td><input id="status_pg" name="status_pg" type="text" value="<?php echo $this->paygate['status_pg'] ; ?>" /></td>
    </tr>
    <tr>
      <td><input id="send_btn" name="send_btn" type="submit" value="<?php echo Send_btn ?>" /></td>
    </tr>
  </table>
</form>
