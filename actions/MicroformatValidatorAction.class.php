<?php
/**
 * microformat_MicroformatValidatorAction
 * @package modules.microformat.actions
 */
class microformat_MicroformatValidatorAction extends change_Action
{
	/**
	 * @param change_Context $context
	 * @param change_Request $request
	 * @return string
	 */
	public function _execute($context, $request)
	{
	    define('XMFP_INCLUDE_PATH', PROJECT_HOME . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . 'microformat' . 
		    DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'xmf_parser' . DIRECTORY_SEPARATOR);
	    require_once(XMFP_INCLUDE_PATH . 'class.Xmf_Parser.php');
	    $html = $request->getParameter('html');
	    echo Xmf_Parser::create_by_HTML($mF_roots, $html)->get_parsed_mfs_as_JSON(true);
	}
	
	/**
	 * @return boolean false.
	 */
	public function isSecure()
	{
		return false;
	}	
}