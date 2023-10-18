<?php
/*
Plugin Name: Chess Puzzle Vision
Description: A plugin to train to see checks, captures and threats.
Version: 1.0
Author: TADLAOUI Hamza
*/

function display_chess_puzzle() {
    ob_start();
    ?>
	<div id="chessboard"  style="width: 400px"></div>
    <?php
    return ob_get_clean();
}
add_shortcode('chess_puzzle', 'display_chess_puzzle');

function enqueue_chess_puzzle_scripts() {
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chess.js/0.10.2/chess.js"></script><br>
	<?php
    wp_enqueue_script('chessboard-js', plugin_dir_url(__FILE__) . 'js/chessboard-1.0.0.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_style('chessboard-css', plugin_dir_url(__FILE__) . 'css/chessboard-1.0.0.min.css');
    
    wp_enqueue_script('chess-puzzle-script', plugin_dir_url(__FILE__) . 'js/main.js', array('jquery', 'chessboard-js'), null, true);

	wp_localize_script('chess-puzzle-script', 'pluginParams', array(
    'pieceThemeBase' => plugin_dir_url(__FILE__) . 'img/chesspieces/wikipedia/'
));

}
add_action('wp_enqueue_scripts', 'enqueue_chess_puzzle_scripts');


?>

