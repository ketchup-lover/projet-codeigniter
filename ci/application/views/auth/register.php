<div class="affichage_login col-3 offset-4">
<?php echo form_open('new_register'); ?>
<div class="offset-2">
  <h4 class="color_white d-none d-md-block">Inscription</h4>
  <br>
  <input type="text" name="email" placeholder="E-mail"  maxlength="100" autofocus class="form-control col-8"> 
  
  <?php echo form_error('email');?>
  <br>

  <input type="text" name="login" placeholder="Login"  maxlength="30" class="form-control col-8">
  
  <?php echo form_error('login');?>
  <br>

  <input type="password" name="password" placeholder="Password"  maxlength="30" class="form-control col-8">
  
  <?php echo form_error('password');?>
  <br>
  <button type="submit">Send !</button>
  </form>    
</form>
</div>
</div>