<?php

/**
 * Definition of the hProduct properties, and it's post-processing.
 * 
 * For definitions of hProduct Properties and Ocurrences see: http://microformats.org/wiki/hlisting<br>
 * 
 *  @author Renaud JENNY
 *  @package xmfp
 *  @subpackage mf_definitions
 */


//version
$xmfp_hlisting["vesion"] = array( 'ocurrences' => "?");
//linsting action
$xmfp_hlisting["listing"] = array( 'ocurrences' => '1', 'childs' => array(
    'sell' => array('ocurrences' => '?'),
    'rent' => array('ocurrences' => '?'),
    'trade' => array('ocurrences' => '?'),
    'meet' => array('ocurrences' => '?'),
    'announce' => array('ocurrences' => '?'),
    'offer' => array('ocurrences' => '?'),
    'wanted' => array('ocurrences' => '?'), 
    'event' => array('ocurrences' => '?'),
    'service' => array('ocurrences' => '?')
    ));
//lister
$xmfp_hlisting["lister"] = array( 'ocurrences' => '1', 'childs' => ( array('vcard' => array('childs' => &$xmfp_hcard, 'ocurrences' => '1', 'skip' => true))));
//date listed
$xmfp_hlisting["dtlisted"] = array( 'ocurrences' => '?', 'postprocessing' => array('date'));
//date expired
$xmfp_hlisting["dtexpired"] = array( 'ocurrences' => '?', 'postprocessing' => array('date'));
//price
$xmfp_hlisting["item"] = array( 'ocurrences' => "1", 'childs' => array(
    'fn' => array('ocurrences' => '?'),
    'url' => array('ocurrences' => '?'),
    'photo' => array('ocurrences' => '?'),
    'geo' => array( 'ocurrences' => '*', 'childs' => &$xmfp_geo, 'skip' => true ),
    'adr' => array( 'ocurrences' => '*', 'childs' => &$xmfp_adr, 'skip'=> true ),
    'vcard' => array('childs' => &$xmfp_hcard,'ocurrences' => '?', 'skip' => true)
    )	
);
//summary
$xmfp_hlisting["summary"] = array( 'ocurrences' => "?");
//description
$xmfp_hlisting["description"] = array( 'ocurrences' => "1");
//photo
$xmfp_hlisting["tags"] = array(&$xmfp_rel_tag,'ocurrences' => '?', 'skip' => true);
//url
$xmfp_hlisting["permalink"] = array(&$xmfp_rel_tag,'ocurrences' => '?', 'skip' => true);
?>
