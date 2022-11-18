<?php 
if ( !defined('ABSPATH')) exit;

function add_this_script_footer(){ ?>

    <script type="text/javascript">
    
    </script>

<?php } 
add_action('wp_footer', 'add_this_script_footer'); 