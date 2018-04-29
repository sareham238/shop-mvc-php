<br/><br/>
<h2><?php echo Products ?></h2>
<br/><br/>
<table class="table">
  <tr>
    <th><?php echo NO; ?></th>
    <th><?php echo Name_Product; ?></th>
    <th><?php echo Price_Product; ?></th>
    <th><?php echo Count_Product; ?></th>
    <th><?php echo Status_Product; ?></th>
    <th><?php echo Tools; ?></th>
  </tr>
  <?php $count = 0; foreach ($this->products as $product) {
    ++$count;
    ?>
    <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo $product['name_p']; ?></td>
      <td><?php echo $product['price_p']; ?></td>
      <td><?php echo $product['count_p']; ?></td>
      <td><?php echo $product['status_p']; ?></td>
      <td>
        <a href="<?php echo URL; ?>admin/products/dp/<?php echo $product['id_p']; ?>"><?php echo Delete; ?></a>
        <a href="<?php echo URL; ?>admin/products/ep/<?php echo $product['id_p']; ?>"><?php echo Edit; ?></a>
      </td>
    </tr>
  <?php } ?>
</table>
