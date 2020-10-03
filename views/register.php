<?php

use tompk\micromvc\Form;

$this->title = "Register";
?>
<h1>Register</h1>
<?php $form = Form::begin('', "post"); ?>
    <div class="row">
        <div class="col">
            <?php echo $form->text($model, 'firstName') ?>
        </div>
        <div class="col">
            <?php echo $form->text($model, 'lastName') ?>
        </div>
    </div>
    <?php echo $form->text($model, 'email') ?>
    <?php echo $form->text($model, 'password')->passwordField() ?>
    <?php echo $form->text($model, 'confirmPassword')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>
