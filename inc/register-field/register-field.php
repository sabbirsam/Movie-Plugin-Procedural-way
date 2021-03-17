<?php


/**
 * Custom Register fields
 */


function saplugin_custom_register_field(){

}
add_action("register_form",function (){
/*
    $first_name=$_POST['first_name']??'';
    $last_name=$_POST['last_name']??'';
    $phone_number=$_POST['phone_number'];*/

    //above line is used for if empty then show an error

    ?>
    <!--<p>
    <label for="first_name"><?php /*_e("Firstname","saplugin")*/?></label>
    <input type="text"  name="first_name" id="first_name" value="<?php /*echo  esc_attr($first_name);*/?>">
    </p>

    <p>
    <label for="last_name"><?php /*_e("Lastname","saplugin")*/?></label>
    <input type="text" name="last_name" id="last_name" value="<?php /*echo  esc_attr($last_name);*/?>">
    </p>-->
    <?php
    include_once MYPLUGIN_PATH .'/template/register_new_input_field.php';
});

/**
 * Custom Register Error message if leave blank
 */

add_filter( 'registration_errors',function ($errors, $sanitized_user_login, $user_email){
    if(empty($_POST['first_name'])){
        $errors->add('first_name_blank',__('First Name Can not be Empty','saplugin'));

    }

    if(empty($_POST['last_name'])){
        $errors->add('last_name_blank',__('Last Name Can not be empty','saplugin'));
    }
    if(empty($_POST['phone_number'])){
        $errors->add('phone_number_blank',__('Phone Number Can not be empty','saplugin'));
    }

    return $errors;
} , 10, 3 );


/**
 * Save user input data in user setting on user account
 */

add_action( 'user_register', function ($user_id){

    if(!empty($_POST['first_name'])){
        update_user_meta($user_id,'first_name',sanitize_text_field($_POST['first_name']));
    }
    if(!empty($_POST['last_name'])){
        update_user_meta($user_id,'last_name',sanitize_text_field($_POST['last_name']));
    }
    if(!empty($_POST['phone_number'])){
        update_user_meta($user_id,'phone_number',sanitize_text_field($_POST['phone_number']));
    }
} );























