<?php
/*
Plugin Name: coord.ch Geocaching shortcut
Plugin URI: http://coord.ch/
Description: Adds a shortcode for geocache waypoints for a lot of Listing Sites.
Version: 0.1.0
Author: DunkleAura
Author URI: http://blog.dunkleaura.ch/
License: GPLv2
*/

/*  Copyright 2011  DunkleAura  (email : dunkleaura {at} gmail {dot} com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
	
class coord_ch {
	const BASE_URL = 'http://coord.ch/';
	
	static function wp_func($atts) {
		extract(shortcode_atts(array(
			'id' => '',
			'text' => null,
			'title' => null
		), $atts));
	
		$url = coord_ch::BASE_URL . trim($id);
		
		if ( is_null($text) )
			return $url;
		
		$ret = "<a href='$url'";
		
		if ( ! is_null($title) )
			$ret .= " title='$title'";
		
		$ret .= '>' . trim($text) . '</a>';

		return $ret;
	}
}
add_shortcode( 'wp', array('coord_ch', 'wp_func') );


