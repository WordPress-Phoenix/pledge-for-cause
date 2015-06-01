<?php

class sc_custom_columns {

    function __construct(){
        //User table
        add_filter('manage_users_columns', array(__CLASS__,'test_modify_user_table'));
        add_filter('manage_users_custom_column', array(__CLASS__,'test_modify_user_table_row'), 10, 3);

        //pledge option table
        add_filter('manage_edit-pledge-options_columns', array(__CLASS__, 'modify_pledge_options_table'));
        add_action( 'manage_pledge-options_posts_custom_column',array(__CLASS__, 'modify_pledge_options_table_row'), 10, 2 );

    }

    /**
     * Created the custom column
     */
    static function test_modify_user_table($column) {
        $column['registered-date'] = 'Registered Date';

        return $column;
    }

    /**
     * Grabs the data to dynamically fill in the custom column
     */
     static function test_modify_user_table_row($val, $column_name, $user_id) {
        get_currentuserinfo();
        $user_data = get_userdata($user_id);
        $registered_date = $user_data->user_registered;
        $date = strtotime($registered_date);

        switch ($column_name) {
            case 'registered-date' :
                return date('Y-m-d', $date);
                break;

            default:
        }

        return $return;
    }


    /**
     * Created the custom column
     */
    static function modify_pledge_options_table($column) {
        $column['pledge_option_is_active'] = 'Included in Campaign';

        return $column;
    }

    /**
     * Grabs the data to dynamically fill in the custom column
     */
    static function modify_pledge_options_table_row($column_name, $post_id)
    {
        global $post;

        /* Get post meta. */
        $terms = get_post_meta($post_id, 'pledge_option_is_active', true);

        switch ($column_name) {

            /* If displaying the 'article_category' column. */
            case 'pledge_option_is_active' :
                if($terms == 1) {
                    echo 'active';
                }else {

                }
                return $terms;
                break;

            default:
        }
        return $return;
    }

}
$custom_columns = new sc_custom_columns();