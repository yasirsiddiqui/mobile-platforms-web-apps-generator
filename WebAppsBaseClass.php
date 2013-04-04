<?php
/**
 * Mobile Platforms Web App Generator
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Apps\Base;

class WebAppsBase {
	
	private $htmlcode;
	private $bodycontentcode;
	
	protected $headercode;
	protected $toolbarbuttonscode;
	protected $footertoolbarbuttonscode;
	protected $formcode;
	protected $formelementscode;
	protected $bodycode;
	protected $footercode;
	protected $appiconscode;
	
	/**
	 * Constructor
	 *
	 * Initializes page html code
	 *
	 * @param Page title $pagetitle  // Title of the page
	 *
	 * @param Page width $pagewidth  // Page width usually given as device-width to be compatable along all width devices
	 * 
	 */
	
	function __construct($pagetitle,$pagewidth) {
	
		$this->headercode = "";
		$this->footercode = "";
		$this->toolbarbuttonscode = "";
		$this->bodycode = "";
		$this->formcode = "";
		$this->bodycontentcode = "<div data-role=\"content\">{FORM_CODE}{BODY_CONTENT}</div>";
		$this->appiconscode = "";

		$this->htmlcode = <<<EOT
		<!DOCTYPE html>
		<html>
		<head>
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=$pagewidth, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>$pagetitle</title>
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css" />
		<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
		<script src="http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js"></script>
		{APP_ICONS}
		<style type="text/css">
		.align-left {
		float: left; 
		}
		.align-right {
		float: right;
		}
		</style>
		</head>
		<body>
		<div data-role="page">
		
		{HEADER_CODE}
		{CONTENT_CODE}
		{FOOTER_CODE}
		
		</div>
		</body>
		</html>
EOT;
	}
	
	
	/**
	 * Function getClassCode
	 *	
	 * Replaces all values of the tags and returns complete html code
	 *
	 */
	
	private function getClassCode() {
		
		$searcharray = array("{HEADER_CODE}","{CONTENT_CODE}","{FOOTER_CODE}","{BODY_CONTENT}","{FOOTER_CONTENT}","{TOOL_BAR_BUTTONS}","{FORM_CODE}","{FORM_ELEMENTS}","{FOOTER_TOOL_BAR_BUTTONS}","{APP_ICONS}");
		$replacearray = array($this->headercode,$this->bodycontentcode,$this->footercode,$this->bodycode,$this->footercode,$this->toolbarbuttonscode,$this->formcode,$this->formelementscode,$this->footertoolbarbuttonscode,$this->appiconscode);	
		return str_replace($searcharray, $replacearray, $this->htmlcode);
	}
	
	
	/**
	 * Function saveToFile
	 *	
	 * Saves the html code to the specifed file
	 * 
	 * @param File Path title $filepath  // Path to the file where to save the html code
	 *
	 */
	
	function saveToFile($filepath) {
		
		$classcode =  $this->getClassCode();
		
		$fp = fopen($filepath, "w");
		if($fp) {
		
			fwrite($fp, $classcode);
			fclose($fp);
			return true;
		}
		else return false;
	}
		
}