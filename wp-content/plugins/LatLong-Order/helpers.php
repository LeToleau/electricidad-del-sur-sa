<?php


//turn off admin notification emails for password reset
	add_filter( 'send_password_change_email', '__return_false' );


//Helper func to easily check user role
	function ll_is_user_of_role($role,$user=false){
        if(!$user)
            $user = wp_get_current_user();

        if(is_numeric($user))
            $user = get_user_by('id',$user);

        //check for bad data
        if(!$user || !is_a($user,'WP_User') || !isset($user->roles) || !is_array($user->roles))
            return false;

        //is this user in our role?
        if(in_array($role,$user->roles))
            return true;
        else
            return false;
    }