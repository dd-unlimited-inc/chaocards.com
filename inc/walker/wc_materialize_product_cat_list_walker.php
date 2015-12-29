<?php
/**
 * CreativePop_Product_Cat_List_Walker class.
 *
 * @extends 		WC_Product_Cat_List_Walker
 * @class 		WC_Materialize_Product_Cat_List_Walker
 * @version		2.3.0
 * @author 		tdan
 */
require_once(ABSPATH . '/wp-content/plugins/woocommerce/includes/walkers/class-product-cat-list-walker.php');
class WC_Materialize_Product_Cat_List_Walker extends WC_Product_Cat_List_Walker {

	/**
	 * @see Walker::start_el()
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of category in reference to parents.
	 * @param integer $current_object_id
	 */
	public function start_el( &$output, $cat, $depth = 0, $args = array(), $current_object_id = 0 ) {
		$output .= '<li class="cat-item cat-item-' . $cat->term_id;

		if ( $args['current_category'] == $cat->term_id ) {
			$output .= ' current-cat active';
		}

		if ( $args['has_children'] && $args['hierarchical'] ) {
			$output .= ' cat-parent';
		}

		if ( $args['current_category_ancestors'] && $args['current_category'] && in_array( $cat->term_id, $args['current_category_ancestors'] ) ) {
			$output .= ' current-cat-parent active';
		}

		if ( $args['has_children'] ) {
			$output .=  '"><a class="collapsible-header transparent">' . __( $cat->name, 'woocommerce' ) . '</a>';
			$output .= '<div class="collapsible-body animated fadeIn">';
		} else {
			$output .=  '"><a href="' . get_term_link( (int) $cat->term_id, $this->tree_type ) . '">' . __( $cat->name, 'woocommerce' ) . '</a>';
		}

		if ( $args['show_count'] ) {
			$output .= ' <span class="count">(' . $cat->count . ')</span>';
		}
	}
	
	/**
	 * @see Walker::end_el()
	 * @since 2.1.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of category. Not used.
	 * @param array $args Only uses 'list' for whether should append to output.
	 */
	public function end_el( &$output, $cat, $depth = 0, $args = array() ) {
		if ($args['has_children']) {
			$output .= "</div></li>\n";
		}
		else {
			$output .= "</li>\n";
		}
	}
}
