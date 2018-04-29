<br/><br/>
<?php if($this->user['id_u'] != 0){ ?>
  <h2><?php echo Edit ." ". $this->user['username_u'] ?></h2>
<?php } else { ?>
  <h2><?php echo New_User ?></h2>
<?php } ?>
<br/><br/>
<?php
if (!empty($this->massage)) {
  if (isset($this->massage['err_name']) && $this->massage['err_name'] == 1) {
    echo ERR_EMP_Username_User;
  }
} ?>
<br/><br/>
<form action="" method="post">
  <table class="table">
    <tr>
      <td><label for="username_u"><?php echo Username_User; ?> :</label></td>
      <td><input id="username_u" name="username_u" type="text" value="<?php echo $this->user['username_u'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="pass_u"><?php echo Password_User; ?> :</label></td>
      <td><input id="pass_u" name="pass_u" type="password" value="" /></td>
    </tr>
    <tr>
      <td><label for="email_u"><?php echo Email_User; ?> :</label></td>
      <td><input id="email_u" name="email_u" type="email" value="<?php echo $this->user['email_u'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="role_u"><?php echo Role_User; ?> :</label></td>
      <td><input id="role_u" name="role_u" type="text" value="<?php echo $this->user['role_u'] ; ?>" /></td>
    </tr>
    <tr>
      <td><label for="status_u"><?php echo Status_User; ?> :</label></td>
      <td><input id="status_u" name="status_u" type="text" value="<?php echo $this->user['status_u'] ; ?>" /></td>
    </tr>
    <tr>
      <td><input id="send_btn" name="send_btn" type="submit" value="<?php echo Send_btn ?>" /></td>
    </tr>
  </table>
</form>
