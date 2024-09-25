<?php
/**
 * Affiche alphabet graph
 *
 * @package   Affiche_Alphabet_Graph
 *
 * @wordpress-plugin
 * Plugin Name:       Affiche alphabet graph
 * Description:       Cherche un ID "graph-aphabet" et place un graphique dedans
 */

// https://developer.wordpress.org/plugins/plugin-basics/best-practices/#avoiding-direct-file-access
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function register_plot_alphabet_scripts()
{
    wp_register_script('d3','https://cdn.jsdelivr.net/npm/d3@7',null, '7.0', array(
        'strategy'  => 'defer',
    ));
    wp_register_script('plot','https://cdn.jsdelivr.net/npm/@observablehq/plot@0.6',array('d3'), '0.6', array(
        'strategy'  => 'defer',
    ));
    wp_enqueue_script('plot-alphabet', plugins_url('plot-alphabet.js', __FILE__ ), array('plot'), '1.0', array(
        'strategy'  => 'defer',
    ));
    wp_localize_script('plot-alphabet', 'plotAlphabet', array("json"=>plugins_url('alphabet.json', __FILE__ )));
}
add_action('wp_enqueue_scripts', 'register_plot_alphabet_scripts');