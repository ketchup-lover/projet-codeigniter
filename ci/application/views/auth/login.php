<div class="affichage_login col-3 offset-4">
<?php echo form_open('login'); ?>
<div class="offset-2">
  <h4 class="color_white col-4 d-none d-md-block">Connexion</h4>
  
  <input type="text" name="login" placeholder="Login" class="form-control col-8">
  <?php echo form_error('login');?>
  <br>
  <input type="password" name="password" placeholder="Password" class="form-control col-8" >
  <?php echo form_error('password');?>
  <br>
  <button type="submit" class="btn btn-success">Go !</button>
  
</form>     
<span class="white"><?= isset($erreurs) ? $erreurs : null; ?></span>
<br>
<a href="<?php echo base_url(); ?>index.php/register">Click here to register!</a>
</div>
</div>