<?php $this->load->view('header'); ?>
<style type="text/css">
  body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }

  .form-signin {
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin input[type="text"],
  .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
  }

</style>
<div class="container">
      <form class="form-signin" method="post" action="<?php echo $base; ?>/login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="username" class="input-block-level" placeholder="Username" required>
        <?php echo form_error('username', '<span class="field-validation-valid">', '</span>'); ?>
        <input type="password" name="password" class="input-block-level" placeholder="Password" required>
        <?php echo form_error('password', '<span class="field-validation-valid">', '</span><br><br/>'); ?>        
        <input class="btn btn-large btn-primary" type="submit" name="login" value="login">
      </form>
</div>
<?php $this->load->view('footer'); ?>