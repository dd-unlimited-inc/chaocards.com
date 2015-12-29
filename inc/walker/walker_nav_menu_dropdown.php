<?php
/*
 */

class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu {
	// don't output children opening tag (`<ul>`)
	public function start_lvl(&$output, $depth = 0, $args = array()){}
		
	// don't output children closing tag    
	public function end_lvl(&$output, $depth = 0, $args = array()){}
	
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		/*	
		// add spacing to the title based on the current depth
		$item->title = str_repeat("&nbsp;", $depth * 4) . $item->title;
		
		// call the prototype and replace the <li> tag
		// from the generated markup...
		parent::start_el($output, $item, $depth, $args, $id);
		$output = str_replace('<li', '<option', $output);
		 */

		// Here is where we create each option.
		$item_output = '';
 
        // add spacing to the title based on the depth
        $item->title = str_repeat("&amp;nbsp;", $depth * 4) . $item->title;
 
        // Get the attributes.. Though we likely don't need them for this...
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' value="'   . esc_attr( $item->url        ) .'"' : '';
 
        // Add the html
        $item_output .= '<option'. $attributes .'>';
        $item_output .= apply_filters( 'the_title_attribute', $item->title );
 
        // Add this new item to the output string.
        $output .= $item_output;
	}
	
	// replace closing </li> with the closing option tag
	public function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</option>\n";
	}
}
