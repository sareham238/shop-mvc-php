<br/><br/>
<h2><?php echo Users ?></h2>
<br/><br/>
<table class="table">
  <tr>
    <th><?php echo NO; ?></th>
    <th><?php echo Username_User; ?></th>
    <th><?php echo Email_User; ?></th>
    <th><?php echo Role_User; ?></th>
    <th><?php echo Status_User; ?></th>
    <th><?php echo Tools; ?></th>
  </tr>
  <?php $count = 0; foreach ($this->users as $user) {
    ++$count;
    ?>
    <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo $user['username_u']; ?></td>
      <td><?php echo $user['email_u']; ?></td>
      <td><?php echo $user['role_u']; ?></td>
      <td><?php echo $user['status_u']; ?></td>
      <td>
        <a href="<?php echo URL; ?>admin/users/du/<?php echo $user['id_u']; ?>"><?php echo Delete; ?></a>
        <a href="<?php echo URL; ?>admin/users/eu/<?php echo $user['id_u']; ?>"><?php echo Edit; ?></a>
      </td>
    </tr>
  <?php } ?>
</table>
