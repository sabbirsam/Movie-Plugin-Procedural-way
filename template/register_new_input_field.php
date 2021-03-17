<?php
$first_name=$_POST['first_name']??'';
$last_name=$_POST['last_name']??'';
$phone_number=$_POST['phone_number'];
?>
<p>
    <label for="first_name"><?php _e("Firstname","saplugin")?></label>
    <input type="text"  name="first_name" id="first_name" value="<?php echo  esc_attr($first_name);?>">
    </p>

<p>
    <label for="last_name"><?php _e("Lastname","saplugin")?></label>
    <input type="text" name="last_name" id="last_name" value="<?php echo  esc_attr($last_name);?>">
</p>
<p>
    <label for="phone_number"><?php _e("Phone Number","saplugin")?></label>
    <input type="text" name="phone_number" id="phone_number" value="<?php echo  esc_attr($phone_number);?>">
</p>
