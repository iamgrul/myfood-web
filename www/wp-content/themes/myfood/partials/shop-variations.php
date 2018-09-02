<?php function get_variations($label, $options, $class=""){
    ?>

<div class="selector <?php echo $class; ?>">

    <?php if($label): ?>
    <label class="selector__label" for="<?php echo sanitize_title($label); ?>">
        <?php echo $label; ?>
    </label>
    <?php endif ;?>

    <div class="selector__container">

        <i class="icon-arrow selector__icon"></i>

        <?php wc_dropdown_variation_attribute_options($options); ?>

    </div>

</div>

<?php }