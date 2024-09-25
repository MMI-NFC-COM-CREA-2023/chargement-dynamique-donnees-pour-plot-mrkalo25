<?php
/**
 * Affiche graph1
 *
 * @package   Affiche_Graph1
 *
 * @wordpress-plugin
 * Plugin Name:       Affiche graph1
 * Description:       Cherche un ID "graph1" et place un graphique dedans
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
    wp_enqueue_script('plot-graph1', plugins_url('plot-graph1.js', __FILE__ ), array('plot'), '1.0', array(
        'strategy'  => 'defer',
    ));
    wp_localize_script('plot-graph1', 'plotgraph1', array("json"=>plugins_url('graph1.json', __FILE__ )));
}
add_action('wp_enqueue_scripts', 'register_plot_graph1_scripts');