<?php
/**
 * Plugin Name: Woocommerce Product backend
 * Description: A product backend page without tags and the default editor.
 * Version:     1.0
 * Author:      Ramiro Neher
 * Author URI:  https://ramironeher.com
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

 /**
  * Remove the default editor from the product page
  */
 function rn_remove_product_editor() {
    remove_post_type_support( 'product', 'editor' );
  }

  add_action( 'init', 'rn_remove_product_editor' );

  /**
   * Removes tags from products
   */
  function rn_tags_unregister_tags() {
      unregister_taxonomy_for_object_type( 'product_tag', 'product' );
  }

  add_action( 'init', 'rn_tags_unregister_tags' );

   /**
   * Carga el estilo que oculta la etiqueta tag de la tabla de la lista de productos. 
   */
   function rn_admin_theme_style() {
       wp_enqueue_style('my-admin-theme', plugins_url('/admin/css/style.css', __FILE__));
   };

   add_action('admin_enqueue_scripts', 'rn_admin_theme_style');
