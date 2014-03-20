<?php
/*
Plugin Name: WP ezPlugins Templates List js
Plugin URI: https://github.com/WPezPlugins/wp-ezplugins-templates-list-js
Description: Demo plugin! Leans on WP ezClasses templates: class-wp-ezclasses-templates-list-js (https://github.com/WPezClasses/class-wp-ezclasses-templates-list-js) to implement List.js (http://Listjs.com).
Version: 0.5.0
Author: Mark Simchock
Author URI: http://chiefalchemist.com
Text Domain: TODO
*/

/*
 * CHANGE LOG
 *
 */
 
 
/**
 * IMPORTANT: IMPLEMENTATION
 * 
 * 1) Do your homework. Check out Listjs.com.
 *
 * 2) In the file where you want the List.js controls to appear add this snippet:
 *
 *	 if ( class_exists('WP_ezPlugins_Templates_List_js') && true ){
 *		// get an instance (see plugin R4M List JS)
 *		$obj_wp_ezclasses_list_js = WP_ezPlugins_Templates_List_js::ezc_get_instance(); 
 *		
 *		// get the controls presets defined for this page / list
 *		$obj_wp_ezclasses_list_js->list_js_controls_view('YOUR-PRESET-NAME-HERE');
 *	}
 *
 */

if ( ! class_exists('WP_ezPlugins_Templates_List_js')){
	class WP_ezPlugins_Templates_List_js extends Class_WP_ezClasses_Templates_List_js {
			
		/**
		 * Define when the js should / should not be enqueue'd based on WP ezClasses conditional_tags
		 *
		 * For more details: WP ezClasses > ezCore > class-wp-ezclasses-utilities-conditional-tags (https://github.com/WPezClasses/ezcore)
		 */		
		public function wp_enqueue_conditional_tags(){
		
			$arr_return = array(	
								'tags'	=> array(
											'is_admin' => false,
											)
								);
			
			return 	$arr_return;
		
		}
		
		
		/*
		 * Define the buttons and js args for a given set of search+buttons
		 *
		 * Searching, sorting and filtering lists is universal. But your markup might be list-centric. This method allows you to configure for a particular list.
		 */
		public function list_js_controls_view_presets($str_preset=NULL){
		
			if ( is_null($str_preset) ){
				return false;
			}
			
			$arr_list_js_presets = array();
			
			switch($str_preset){
			
				case 'some-preset-name':
				
					$arr_list_js_presets = array(
								
												/*
												 * IMPORTANT - Key names of 'echo_do', 'controls' and 'localize' are all required 
												 */

												'echo_do'		=> true,			// echo the output or false will just true a string.
												
												// IMPORTANT - The list.js search must be within the outer wrapper. The buttons on the other hand can be anywhere - more or less
												
												'controls'		=> array(
												
																		// IMPORTANT - These (e.g., 'search_box', 'filter_all', etc.) key values don't matter. 
																		
																		'search_box'			=> array(
																									'active' 			=> true,
																									'control'			=> 'input',
																									'id'				=> 'search',
																									'class'				=> 'search',
																									'placeholder'		=> 'Search',
																									'button_text'		=> NULL,
																									'button_type'		=> NULL, 	// 'sort' or 'filter'
																									'data_sort'			=> NULL,	// if 'sort' then what's the arg?
																									'data_filtername'	=> NULL,	// if filter then the name of the filter 
																									'data_filter_value'	=> NULL, 	// if filter the value
																								),
																								
																		'filter_all'			=> array(
																									'active' 			=> true,
																									'control'			=> 'button',
																									'id'				=> 'filter-all',
																									'class'				=> 'filter-button btn btn-default',
																									'placeholder'		=> NULL,			// note: when button, this will be ignored anyway. 
																									'button_text'		=> 'All',
																									'button_type'		=> 'filter', 		// 'sort' or 'filter'
																									'data_sort'			=> NULL,			// if 'sort' then what's the arg?
																									'data_filtername'	=> 'coupon-filter',	// if filter then the name of the filter 
																									'data_filter_value'	=> 'all', 			// if filter the value
																								),
																								
																		'filter_x'				=> array(
																									'active' 			=> true,
																									'control'			=> 'button',																			
																									'id'				=> 'filter-x',
																									'class'				=> 'filter-button btn btn-default',
																									'placeholder'		=> NULL,			// note: when button, this will be ignored anyway. 
																									'button_text'		=> 'Filter X',
																									'button_type'		=> 'filter', 		// 'sort' or 'filter'
																									'data_sort'			=> NULL,			// if 'sort' then what's the arg?
																									'data_filtername'	=> 'my-filter',		// if filter then the name of the filter 
																									'data_filter_value'	=> 'value_x', 		// if filter the value
																								),
																								
																		'filter_y'				=> array(
																									'active' 			=> true,
																									'control'			=> 'button',																			
																									'id'				=> 'filter-y',
																									'class'				=> 'filter-button btn btn-default',
																									'placeholder'		=> NULL,			// note: when button, this will be ignored anyway. 
																									'button_text'		=> 'Filter Y',
																									'button_type'		=> 'filter', 		// 'sort' or 'filter'
																									'data_sort'			=> NULL,			// if 'sort' then what's the arg?
																									'data_filtername'	=> 'my-filter',		// if filter then the name of the filter 
																									'data_filter_value'	=> 'value_y', 		// if filter the value
																								),
																	),
																
												'localize'		=> array(
																		'wrapClass'				=> 'loop-wrap-outer',
																		'listClass'				=> 'loop-wrap',
																		'searchClass'			=> 'coupon-search',
																		'classFilterButtons' 	=> 'filter-button',  // "styling" classes should not be included. this is stritly the name of the selector class for the js to find the correct buttons for this set of filter
																		'valueNames'			=> array('search-this', 'coupon-filter'),
																		'stripTags'				=> array('coupon-filter' => false),
																		'filterDelimiter'		=> array(),
																	),		
											);
					/*
					 * Define the values to be passed to the js. 
					 */
					
					break;
					
				case 'some-other-preset':
				
					break;
					
				default:
				
					break;
			}
			
			return $arr_list_js_presets;
				
		}
	

	
	} // close class
} // close if class_exists()

$obj_wp_ezplugins_templates_list_js = WP_ezPlugins_Templates_List_js::ezc_get_instance(); 



?>