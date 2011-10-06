<?php

/**
 * Definition of the hProduct properties, and it's post-processing.
 * 
 * For definitions of hProduct Properties and Ocurrences see: http://microformats.org/wiki/hproduct<br>
 * 
 *  @author Renaud JENNY
 *  @package xmfp
 *  @subpackage mf_definitions
 */


//fn
$xmfp_hproduct["fn"] = array( 'ocurrences' => "1");
//brand
$xmfp_hproduct["brand"] = array( 'childs' => &$xmfp_hcard, 'ocurrences' => '?', 'skip' => true);
//category
$xmfp_hproduct["category"] = array(&$xmfp_rel_tag,'ocurrences' => '*', 'skip' => true);
//price
$xmfp_hproduct["price"] = array( 'ocurrences' => "?");
//description
$xmfp_hproduct["description"] = array( 'ocurrences' => "?");
//photo
$xmfp_hproduct["photo"] = array( 'ocurrences' => "*");
//url
$xmfp_hproduct["url"] = array( 'ocurrences' => '?', 'childs' => array(
    'url' => array('ocurrences' => '?', 'semopt' => array(
		array( 'tag' => 'a', 'att' => 'href' ),
		array( 'tag' => 'area', 'att' => 'href'),
		array( 'tag' => 'img', 'att' => 'src') ), 'postprocessing' => array('base', 'url') ),
    'rel-tag' => array( 'ocurrences' => '?', 'childs' => &$xmfp_rel_tag, 'skip' => true)));
//review
$xmfp_hproduct["review"] = array( 'ocurrences' => '*', 'childs' => &$xmfp_hreview, 'skip' => true);
//listing
$xmfp_hproduct["listing"] = array( 'ocurrences' => '*', 'childs' => &$xmfp_hlisting, 'skip' => true);
//identifier
$xmfp_hproduct["identifier"] = array( 'ocurrences' => "?", "childs" => array(
	//type
	'type' => array('ocurrences' => "?"),
	//value
	'value' => array('ocurrences' => "?")
    ));
?>
