<?php

use tompk\micromvc\Form;

$this->title = "Login";

?>
<h1>Login</h1>
<?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->text($model, 'email') ?>
    <?php echo $form->text($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
