<br/><br/>
<h2><?php echo Login ?></h2>
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
      <td><label for="username_u"><?php echo Username_User; ?> :</label></td>
      <td><input id="username_u" name="username_u" type="text" /></td>
    </tr>
    <tr>
      <td><label for="pass_u"><?php echo Password_User; ?> :</label></td>
      <td><input id="pass_u" name="pass_u" type="password" /></td>
    </tr>
    <tr>
      <td><input id="login_btn" name="login_btn" type="submit" value="<?php echo login_btn ?>" /></td>
    </tr>
  </table>
</form>
