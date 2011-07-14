<section class="container">

  <a href="<?php echo base_url(); ?>" title="Just Write Homepage" ><img src="<?php echo base_url(); ?>resources/imgs/just-write-logo.png" alt="Just Write" /></a>

  <div id="signup-form" class="generic-form">
    <h2>&mdash; Sign up &mdash;</h2>
    <?php
      echo form_open('member/create_member');
      echo form_input('username', set_value('A Username is required', 'Username'));
      echo form_input('email', set_value('Your e-mail is required', 'Email'));
    ?>
      <p class="message">Don't worry, we wont share your email with <em><strong>anyone</strong></em> &mdash; we hate spam too.</p>
    <?php
      echo form_password('password', set_value('Your password is required', 'Password'));

      echo form_submit('submit', 'Sign me up!');
    ?>

    <?php echo validation_errors('<p class="error">'); ?>
    <?php if(isset($error)): ?>
      <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    </form>

    <p>Got an account? 
      <a id="login" href="" title="Login to write">
        <img src="<?php echo base_url(); ?>resources/imgs/log-in.png" alt="->" />Login
      </a>
    </p>
  </div>

</section>
