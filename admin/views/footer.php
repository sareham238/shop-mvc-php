

</div>


<script src="<?php echo URL . URL_JS; ?>jquery.js"></script>
<script src="<?php echo URL . URL_JS; ?>bootstrap.min.js"></script>
<script src="<?php echo URL . URL_JS; ?>custom.js" type="text/javascript"></script>
<?php
if (isset($this->js)) {
  foreach ($this->js as $js) {
    echo "<script src='" . URL . $js . "' type='text/javascript'></script>";
  }
}
?>
</body>
</html>
