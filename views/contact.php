<?php

use tompk\micromvc\Form;

$this->title = "Contact";

?>
<h1>Contact us</h1>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->text($model, 'subject') ?>
    <?php echo $form->text($model, 'email') ?>
    <?php echo $form->textarea($model, 'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php $form = Form::end() ?>