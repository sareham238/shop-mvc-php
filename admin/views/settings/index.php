<h1><?php echo Settings; ?></h1>
<br />
<br />
<h2><?php echo Payment; ?></h2>
<h3><?php echo Payment_Gateway ?></h3>
<a href="<?php echo URL; ?>admin/settings/npg"><?php echo Add_Payment_Gateway ?></a>
<table class="table">
  <tr>
    <td><?php echo NO; ?></td>
    <td><?php echo Payment_Gateway_Name; ?></td>
    <td><?php echo Payment_Gateway_API; ?></td>
    <td><?php echo Payment_Gateway_State; ?></td>
    <td><?php echo Tools; ?></td>
  </tr>
  <?php $count = 0; foreach ($this->paygates as $paygate) {
    $count++;
    ?>
    <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo $paygate['name_pg']; ?></td>
      <td><?php echo $paygate['api_pg']; ?></td>
      <td><?php echo $paygate['status_pg']; ?></td>
      <td>
        <a href="<?php echo URL; ?>admin/settings/dpg/<?php echo $paygate['id_pg']; ?>"><?php echo Delete; ?></a>
        <a href="<?php echo URL; ?>admin/settings/epg/<?php echo $paygate['id_pg']; ?>"><?php echo Edit; ?></a>
      </td>
    </tr>
  <?php } ?>
</table>
