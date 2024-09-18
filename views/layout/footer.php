</div>
  <!-- alert -->

  <?php if(isset($_SESSION['alert'])) { ?>
<div class="alert">
    <span class="closebtn"
    onclick="this.parentElement.style.display='none';">&times;</span>
    <?php echo $_SESSION['alert']['message'];
    unset($_SESSION['alert']); ?>
</div>
<?php } ?>

</body>

</html>


