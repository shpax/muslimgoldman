<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;

if ( ! $post->post_excerpt ) return;
?>
<div itemprop="description" style="
    margin-top: -42px;
">
	Изделие:<br><br>
	Металл:<br><br>
	Проба:<br><br>
	Вес:<br><br>
	Вставка:<br><br>
</div>