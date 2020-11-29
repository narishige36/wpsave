<?php
/*
Plugin Name: tagplus
*/
/* 管理画面にオリジナルメニューを追加する */
add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page(){
    add_menu_page( 'オリジナルメニュー', 'オリジナルメニュー',
    'manage_options', 'custompage', 'my_custom_menu_page', '', 6 ); 
}
function my_custom_menu_page(){
    echo "<h2>オリジナルメニューページ</h2>";   
    echo "ここに自由にメニューを作成できます。";  
}
?>