<br/><br/>
<h2><?php echo Info_Customer ?></h2>
<br/><br/>
<?php
if (!empty($this->massage)) {
  if (isset($this->massage['err_username']) && $this->massage['err_username'] == 1) {
    echo ERR_EMP_Username_User;
  }
  echo "<br/>";
  if (isset($this->massage['err_password']) && $this->massage['err_password'] == 1) {
    echo ERR_TRU_Password_User;
  }
  if (isset($this->massage['err_login']) && $this->massage['err_login'] == 1) {
    echo ERR_EMP_Login;
  }
} ?>
<br/><br/>
<form action="" method="post">
  <table class="table">
    <tr>
      <td><label for="name_ui"><?php echo Name_Customer; ?> :</label></td>
      <td><input id="name_ui" name="name_ui" type="text" value="<?php echo $this->customerinfo['name_ui'] ?>" /></td>
    </tr>
    <tr>
      <td><label for="address_ui"><?php echo Address_Customer; ?> :</label></td>
      <td><input id="address_ui" name="address_ui" type="text" value="<?php echo $this->customerinfo['address_ui'] ?>" /></td>
    </tr>
    <tr>
      <td><label for="tel_ui"><?php echo Tel_Customer; ?> :</label></td>
      <td><input id="tel_ui" name="tel_ui" type="tel" value="<?php echo $this->customerinfo['tel_ui'] ?>" /></td>
    </tr>
    <tr>
      <input id="status" name="status" type="hidden" value="<?php echo $this->status ?>" />
      <td><input id="infocustomer_btn" name="infocustomer_btn" type="submit" value="<?php echo infocustomer_btn ?>" /></td>
    </tr>
  </table>
</form>
