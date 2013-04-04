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

namespace WebApps\App;

define("BLACK", "a");
define("BLUE", "b");
define("GRAY", "c");
define("WHITE", "d");
define("YELLOW", "e");

include_once 'WebAppsBaseClass.php';

class WebApp extends \Apps\Base\WebAppsBase {
	
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
		
		parent::__construct($pagetitle,$pagewidth);
	}
	
	/**
	 * Function addPhoneCallButton
	 *
	 * Adds a button to initiate a phone call using mobile phone dialer
	 *
	 * @param Button title $title  		// Title of the button
	 *
	 * @param Phone number $telnumber  // Phone number to be dialed when user clicks on the button
	 * 
	 * @param Theme $theme             // Button theme dafaults to Black
	 *
	 */
	public function addPhoneCallButton($title,$telnumber,$theme=BLACK) {
		
		$phpnecallcode = PHP_EOL.<<<EOT
		<a href="tel:$telnumber" data-role="button" data-theme="$theme">$title</a>
EOT;
		$this->bodycode.= PHP_EOL.$phpnecallcode;
	}
	
	/**
	 * Function addFaceTimeCallButton
	 *
	 * Adds a button to initiate facetime call (Only for Apple devices)
	 *
	 * @param Button title $title  		 // Title of the button
	 *
	 * @param Phone number $telnumber    // Phone number to be dialed when user clicks on the button
	 * 
	 *  @param Theme $theme              // Button theme dafaults to Black
	 *
	 */
	public function addFaceTimeCallButton($title,$number,$theme=BLACK) {
		
		$facetimecode =PHP_EOL. <<<EOT
		<a href="facetime:$number" data-role="button" data-theme="$theme">$title</a>
EOT;
		$this->bodycode.= PHP_EOL.$facetimecode;
	}
	
	/**
	 * Function addEmailLinkButton
	 *
	 * Adds a button to send email
	 *
	 * @param Email address $emailaddress  // Email address to send email to
	 *
	 * @param Title $title  			   // Button title
	 *
	 *  @param Theme $theme                // Button theme dafaults to Black
	 *
	 */
	public function addEmailLinkButton($emailaddress,$title,$theme=BLACK) {
		
		$emaillinkcode =PHP_EOL. <<<EOT
		<a href="mailto:$emailaddress" data-role="button" data-theme="$theme">$title</a>
EOT;
		$this->bodycode.= PHP_EOL.$emaillinkcode;
	}
	
	/**
	 * Function addSmsButton
	 *
	 * Adds a button to send SMS
	 *
	 * @param Phone number $number  // Phone number to which sms should be sent
	 *
	 * @param Title $title  		// Button title
	 *
	 *  @param Theme $theme         // Button theme dafaults to Black
	 *
	 */
	public function addSmsButton($number,$title,$theme=BLACK) {
		
		$smslinkcode = PHP_EOL.<<<EOT
		<a href="sms://$number" data-role="button" data-theme="$theme">$title</a>
EOT;
		$this->bodycode.= PHP_EOL.$smslinkcode;
	}
	
	/**
	 * Function addSkypeCallButton
	 *
	 * Adds a button to make Skype call
	 *
	 * @param Skype user name $username  // Skype id to which call should be made
	 *
	 * @param Title $title  			 // Button title
	 *
	 *  @param Theme $theme         	 // Button theme dafaults to Black
	 *
	 */
	public function addSkypeCallButton($username,$title,$theme=BLACK) {
		
		$skypecallcode = PHP_EOL. <<<EOT
		<a href="skype:$username?call" data-role="button" data-theme="$theme">$title</a>
EOT;
		$this->bodycode.= PHP_EOL.$skypecallcode;
		
	}
	
	/**
	 * Function addAudio
	 *
	 * Adds audio player
	 *
	 * @param Source $src  // Path to the audio file. The <audio> tag supports .wav, .mp3, .m4a and .acc files
	 *
	 */
	public function addAudio($src) {
		
		$audiocode = PHP_EOL.<<<EOT
		<audio src="$src" controls="controls" />
EOT;
		$this->bodycode.= PHP_EOL.$audiocode;
		
	}
	
	/**
	 * Function addVideo
	 *
	 * Adds video player
	 *
	 * @param Source $vodeosource  // Path to the video file. iOS supports only MPEG4 and H.264 video
	 * 
	 * @param Width $width // Width of the video player
	 * 
	 * @param Height $height // Height of the audio player
	 *
	 */
	public function addVideo($vodeosource,$width,$height) {
		
		$videocode = PHP_EOL.<<<EOT
		<video width="$width" height="$height" controls="controls" id="myvid">
		<source src="$vodeosource" type="video/mp4;" >
		</video>
EOT;
		$this->bodycode.=PHP_EOL. $videocode;
		
	}
	
	/**
	 * Function embedVideo
	 *
	 * Embeds videos This tag can be used to define other types of embedded content, like a .swf file
	 *
	 * @param Title $title   // Video title
	 *
	 * @param Width $width   // Width of the video player
	 *
	 * @param Height $height // Height of the audio player
	 * 
	 *  @param Source $src   // Path to the video file.
	 *
	 */
	public function embedVideo($title,$width,$height,$src) {
		
		$videocode = PHP_EOL.<<<EOT
		<embed height ="$height" width ="$width" src="$src" >$title</embed>
EOT;
		$this->bodycode.= PHP_EOL.$videocode;
	}
	
	/**
	 * Function addForm
	 *
	 * Adds form to the page
	 *
	 * @param Form name $formname   // Form name, will be replaced as <form name="value">
	 *
	 * @param Form Id $formid   	// Form Id, will be replaced as <form id="value">
	 *
	 * @param Action $formaction 	// Form action page will be replaced as <form action="value">
	 *
	 *  @param Form method $formmethod   // Http method of the form will be replaced as <form method="value">
	 *
	 */
	public function addForm($formname,$formid,$formaction,$formmethod) {
		
		$formcode = PHP_EOL.<<<EOT
		<form name="$formname" id="$formid" method="$formmethod" action="$formaction">
		{FORM_ELEMENTS}
		</form>
EOT;
		$this->formcode = PHP_EOL.$formcode;

	}
	
	/**
	 * Function addIphoneNonRetinaAppIcon
	 *
	 * Adds app icon for the iphone non retina devices
	 *
	 * @param Path name $iconpath   // Path to the icon file. Icon Dimensions should be 57X57
	 *
	 */
	public function addIphoneNonRetinaAppIcon($iconpath) {
		
		$appiconcode = PHP_EOL.<<<EOT
		<link rel="apple-touch-icon" href="$iconpath" sizes="57x57">
EOT;
		$this->appiconscode.= PHP_EOL.$appiconcode;
	}
	
	/**
	 * Function addIphoneRetinaAppIcon
	 *
	 * Adds app icon for the iphone retina devices
	 *
	 * @param Path name $iconpath   // Path to the icon file. Icon Dimensions should be 114X114
	 *
	 */
	public function addIphoneRetinaAppIcon($iconpath) {
	
		$appiconcode =PHP_EOL. <<<EOT
		<link rel="apple-touch-icon" href="$iconpath" sizes="114x114">
EOT;
		$this->appiconscode.= PHP_EOL.$appiconcode;
	}
	
	/**
	 * Function addIpadAppIcon
	 *
	 * Adds app icon for the iPad devices
	 *
	 * @param Path name $iconpath   // Path to the icon file. Icon Dimensions should be 72X72
	 *
	 */
	public function addIpadAppIcon($iconpath) {
	
		$appiconcode = PHP_EOL.<<<EOT
		<link rel="apple-touch-icon" href="$iconpath" sizes="72x72">
EOT;
		$this->appiconscode.= PHP_EOL.$appiconcode;
	}
	
	/**
	 * Function addAndroidAppIcon
	 *
	 * Adds app icon for the Android running devices
	 *
	 * @param Path name $iconpath   // Path to the icon file. Icon Dimensions should be 57X57
	 *
	 */
	public function addAndroidAppIcon($iconpath) {
	
		$appiconcode = PHP_EOL.<<<EOT
		<link rel="apple-touch-icon-precomposed" sizes="android-only" href="$iconpath">
EOT;
		$this->appiconscode.= PHP_EOL.$appiconcode;
	}
	
	/**
	 * Function addOtherPaltformsAppIcon
	 *
	 * Adds app icon for other devices like Nokia and BB devices
	 *
	 * @param Path name $iconpath   // Path to the icon file. Icon Dimensions should be 57X57
	 *
	 */
	public function addOtherPaltformsAppIcon($iconpath) {
	
		$this->addIphoneNonRetinaAppIcon($iconpath);
	}
	
	/**
	 * Function addSubmitButton
	 *
	 * Adds form submit button
	 *
	 * @param Title $buttontitle   // Title of the submit button
	 *
	 * @param Theme $theme         // Button Theme
	 *
	 */
	public function addSubmitButton($buttontitle,$theme=BLACK) {
		
		$submitcode = PHP_EOL.<<<EOT
		<input type="submit" value="$buttontitle" data-theme="$theme">
EOT;
		$this->formelementscode.=PHP_EOL. $submitcode;
		
	}
	
	/**
	 * Function addSplashImage
	 *
	 * Adds Splash screen image to the App
	 *
	 * @param Image path $imagepath   // Path to the image file.
	 * 
	 * Splash screen size for iphone = 320x460 , iPhone Retina = 640X920
	 *
	 */
	public function addSplashImage($imagepath) {
	
		$appiconcode = PHP_EOL.<<<EOT
		<link rel="apple-touch-startup-image" href="$imagepath">
EOT;
		$this->appiconscode.= PHP_EOL.$appiconcode;
	}
	
	/**
	 * Function addTextFieldToForm
	 *
	 * Adds Text field to the form
	 *
	 * @param Label path $label   // Field label
	 *
	 * @param Placeholder text $placeholder // Place holder text for the field
	 * 
	 * @param Field type $type   // Type of the field e.g. text,email,password,date,number,tel,url,search,month,day
	 *
	 */
	public function addTextFieldToForm($label,$placeholder,$type,$fieldname,$fieldid) {
		
		$fieldtext = PHP_EOL.<<<EOT
		<label for="$fieldid">$label:</label>
		<input type="$type" name="$fieldname" id="$fieldid"  placeholder="$placeholder" >
EOT;
		$this->formelementscode.= PHP_EOL.$fieldtext;
	}
	
	/**
	 * Function addTextAreaToForm
	 *
	 * Adds Text area field to the form
	 *
	 * @param Label path $label   // Field label
	 *
	 * @param Placeholder text $placeholder // Place holder text for the field
	 *
	 * @param Field name $fieldname   // name of the field will be reaplced as <textarea name="value">
	 * 
	 * @param Field id $fieldid   // id of the field will be reaplced as <textarea id="value">
	 *
	 */
	public function addTextAreaToForm($label,$placeholder,$fieldname,$fieldid) {
		
		$fieldtext = PHP_EOL.<<<EOT
		<label for="$fieldid">$label:</label>
		<textarea id="$fieldid" name="$fieldname" placeholder="$placeholder"></textarea>
EOT;
		$this->formelementscode.= PHP_EOL.$fieldtext;
	}
	
	/**
	 * Function addSliderToForm
	 *
	 * Adds Slider field to the form
	 *
	 * @param Label path $label   // Field label
	 *
	 * @param Field name $fieldname // name of the field will be replaced as <input type="range" name="value">
	 *
	 * @param Field id $fieldid   // id of the field will be reaplced as <input type="range" id="value">
	 * 
	 * @param Min value $min      // Minimum value of the slider
	 * 
	 * @param Max value $max      // Maximum value of the slider
	 * 
	 * @param Selected $selected  // Default selected value of the slider
	 * 
	 * @param Step value $stepvalue // value that should be incremented/decremented when user moves the slider
	 *
	 */
	public function addSliderToForm($label,$fieldname,$fieldid,$min,$max,$selected,$stepvalue) {
		
		$fieldtext = PHP_EOL.<<<EOT
		<label for="$fieldid">Quantity:</label>
		<input type="range" id="$fieldid" name="$fieldname" min="$min" max="$max" value="$selected" step="$stepvalue">
EOT;
		$this->formelementscode.= PHP_EOL.$fieldtext;
		
	}
	
	/**
	 * Function addToggleButtonToForm
	 *
	 * Adds Toggle field to the form
	 *
	 * @param Label path $label   // Field label
	 *
	 * @param Field name $fieldname   // name of the field will be reaplced as <select id="value">
	 *
	 * @param Field id $fieldid   // id of the field will be reaplced as <input type="range" id="value">
	 *
	 * @param First optin label $option1label  // Frontend label that should be shown to user
	 *
	 * @param Option Value $option1value // Backend value of the first label
	 *
	 * @param First optin label $option1labe2  // Frontend labe2 that should be shown to user
	 *
	 * @param Option Value $option2value // Backend value of the second label
	 *
	 */
	public function addToggleButtonToForm($label,$fieldname,$fieldid,$option1label,$option1value,$option2label,$option2value) {
		
		$fieldtext = PHP_EOL.<<<EOT
		<label for="$fieldid">$label</label>
		<select name="$fieldname" id="$fieldid" data-role="slider">
		<option value="$option1value">$option1label</option>
		<option value="$option2value">$option2label</option>
		</select>
EOT;
		$this->formelementscode.= PHP_EOL.$fieldtext;
	}
	
	/**
	 * Function addSelectMenuToForm
	 *
	 * Adds Select Menu field to the form
	 *
	 * @param Label path $label   // Field label
	 *
	 * @param Field name $fieldname // name of the field will be replaced as <selec name="value">
	 *
	 * @param Field id $fieldid   // id of the field will be reaplced as <selec id="value">
	 *
	 * @param Options  $options    // select field options to be added
	 *
	 * @param multiple selection $allowmultipleselection  // Allow/dis allow multilple selection
	 *
	 */
	public function addSelectMenuToForm($label,$fieldname,$fieldid,$options,$allowmultipleselection=FALSE) {
		
		$mulitselect = "";
		if($allowmultipleselection)
			$mulitselect = "multiple";
		
		$fieldtext = PHP_EOL.<<<EOT
		<label for="$fieldid">$label</label>
		<select id="$fieldid" name="$fieldname" $mulitselect>
EOT;
		foreach ($options as $option) {
			
			$fieldtext.= PHP_EOL.<<<EOT
			<option value="{$option['value']}">{$option['label']}</option>
EOT;
		}
		
		$fieldtext.=PHP_EOL."</select>";

		$this->formelementscode.= PHP_EOL.$fieldtext;
	}
	
	/**
	 * Function addRadioButtonToForm
	 *
	 * Adds Radio buttons to the form
	 *
	 * @param Group title path $grouptitle   // Title of the group field
	 *
	 * @param Buttons $radiobuttons // buttons array
	 *
	 * @param Alignment $alignment   // How fields should be aligned possible values "vertical and horizental"
	 * 
	 */
	public function addRadioButtonToForm($grouptitle,$radiobuttons,$alignment="vertical") {
		
		$fieldtext = PHP_EOL.<<<EOT
		<legend>$grouptitle</legend>
		<div data-role="controlgroup" data-type="$alignment">
EOT;
		foreach ($radiobuttons as $button) {
		
			$fieldtext.=PHP_EOL. <<<EOT
			<label for="{$button['id']}">{$button['label']}</label>
			<input type="radio" id="{$button['id']}" name="{$button['name']}" value="{$button['value']}">
EOT;
		}
		
		$fieldtext.=PHP_EOL."</div>";
		$this->formelementscode.= PHP_EOL.$fieldtext;

	}
	
	/**
	 * Function addCheckBoxesToForm
	 *
	 * Addscheck box buttons to the form
	 *
	 * @param Group title path $grouptitle   // Title of the group field
	 * 
	 * @param isGrouped $isgrouped // Either checkboxes should be grouped together or shown as individual items
	 *
	 * @param Buttons $buttons // buttons array
	 *
	 * @param Alignment $alignment   // How fields should be aligned possible values "vertical and horizental"
	 *
	 */
	public function addCheckBoxesToForm($grouptitle,$isgrouped,$buttons,$alignment='vertical') {
		
		$fieldtext = "";
		if($isgrouped) {
			
			$fieldtext.="<legend>$grouptitle</legend><div data-role=\"controlgroup\" data-type=\"$alignment\">";
		}
		
		foreach ($buttons as $button) {
		
			$fieldtext.= PHP_EOL.<<<EOT
			<label for="{$button['id']}">{$button['label']}</label>
			<input type="checkbox" id="{$button['id']}" name="{$button['name']}" value="{$button['value']}">
EOT;
		}
		if($isgrouped) {
			
			$fieldtext.=PHP_EOL."</div>";
		}
		$this->formelementscode.= PHP_EOL.$fieldtext;
	}
	
	/**
	 * Function addButtonToBody
	 *
	 * Adds button to html body
	 *
	 * @param url $pageurl   // Url to be loaded when button is clicked
	 *
	 * @param Fit text $fitwithtext // Either button size should be according to title or button should appear as per device width
	 *
	 * @param Title $buttontitle // Button title label
	 * 
	 * @param Dailog $openasdialog // Either url linked with this button should be opened as dialog or normal page loading
	 *
	 * @param Button icon $icon   // Button icon that should appear
	 * 
	 * @param Button icon Pos $iconposition   // Where the icon on the button should be placed
	 * 
	 * @param Animation $transitionstyle // Animation that should appear when button is clicked
	 *
	 */
	public function addButtonToBody($pageurl,$fitwithtext=TRUE,$buttontitle,$openasdialog=FALSE,$icon,$iconposition="left",$transitionstyle='slide', $theme = BLACK ) {
		
		$showtitle = "";
		$datainline = "";
		$iconcode = "";
		$iconposcode = "";
		
		if($buttontitle=="")
			$showtitle = "data-iconpos=\"notext\"";
		
		if($fitwithtext)
			$datainline = 'data-inline="true"';
		
		if($icon) {
			$iconcode = "data-icon=\"$icon\"";
			$iconposcode = "data-iconpos=\"$iconposition\"";
		}
		 
		$backbuttoncode =PHP_EOL. <<<EOT
		<a href="$pageurl" $datainline data-transition="$transitionstyle" data-role="button" $iconcode $showtitle $iconposcode data-theme="$theme">$buttontitle</a>
EOT;
		
		$this->bodycode.= PHP_EOL.$backbuttoncode;
	}
	
	/**
	 * Function addCollapseableContent
	 *
	 * Adds collapseable content to the page
	 *
	 * @param Title $title   // Title of the content
	 *
	 * @param Body $body // Body content of the collaseable item
	 *
	 * @param Collapsed $datacollapsed // Should content be collapsed by default
	 *
	 * @param Theme $theme   // Theme of the collapseable
	 *
	 */
	public function addCollapseableContent($title,$body,$datacollapsed=TRUE,$theme = BLACK) {
		
		$collapseablecode = PHP_EOL.<<<EOT
		<div data-role="collapsible" data-collapsed="$datacollapsed" data-theme="$theme">
		<h3>$title</h3>
		<p>
		$body
		</p>
		</div>
EOT;
		$this->bodycode.= PHP_EOL.$collapseablecode;
		
	}
	
	/**
	 * Function addCollapseableAccordion
	 *
	 * Adds collapseable accodion content to the page
	 *
	 * @param Array $collapseablearray   // Array of collapseable content
	 *
	 */
	public function addCollapseableAccordion($collapseablearray) {
		
		$collapseableaccor =PHP_EOL. <<<EOT
		<div data-role="collapsible-set">
EOT;
		foreach ($collapseablearray as $dataarray) {
			
			$collapseableaccor.=PHP_EOL. <<<EOT
			<div data-role="collapsible" data-collapsed="{$dataarray['collapsed']}" data-theme="{$dataarray['theme']}">
			<h3>{$dataarray['title']}</h3>
			<p>
			{$dataarray['body']}
			</p>
			</div>
EOT;
			
		}	
		
		$collapseableaccor.= PHP_EOL.'</div>';
		$this->bodycode.= PHP_EOL.$collapseableaccor;
	}
	
	/**
	 * Function addNumberedListView
	 *
	 * Adds Numbered list view to the page
	 *
	 * @param Array $linksarray   // Array of title and url
	 * 
	 * @param Search bar $searchbar // include search bar or not
	 *
	 */
	public function addNumberedListView($linksarray,$searchbar = FALSE) {
		
		$listviewcode =PHP_EOL. <<<EOT
		<ol data-role="listview" data-filter="$searchbar">
EOT;
		foreach ($linksarray as $data) {
		
			$listviewcode.=PHP_EOL. <<<EOT
			<li><a href="{$data['url']}">{$data['title']}</a></li>
EOT;
		
		}
		
		$listviewcode.= PHP_EOL."</ol>";
		$this->bodycode.= PHP_EOL.$listviewcode;
	}
	
	/**
	 * Function addInsetList
	 *
	 * Adds list view with rounded corners
	 *
	 * @param Array $linksarray   // Array of title and url
	 * 
	 * @param Theme $theme // Theme
	 *
	 * @param Search bar $searchbar // include search bar or not
	 *
	 */
	public function addInsetList($linksarray,$theme=BLACK,$searchbar = FALSE) {
		
		$listviewcode = PHP_EOL.<<<EOT
		<ul data-role="listview" data-filter="$searchbar" data-inset="true" data-theme="$theme">
EOT;
		foreach ($linksarray as $data) {
		
			$listviewcode.= PHP_EOL.<<<EOT
			<li><a href="{$data['url']}">{$data['title']}</a></li>
EOT;
		
		}
		
		$listviewcode.= PHP_EOL."</ul>";
		$this->bodycode.=PHP_EOL. $listviewcode;
	}
	
	/**
	 * Function addSplitButtonList
	 *
	 * Adds list view with two columns
	 *
	 * @param Array $linksarray   // Array of title and url
	 *
	 * @param Inset data $datainset // Should edges be rounded
	 *
	 * @param Split icon $spliticon // Icon for the second column
	 * 
	 * @param Theme $theme // Theme
	 *
	 * @param Search bar $searchbar // include search bar or not
	 */
	public function addSplitButtonList($linksarray,$datainset = TRUE ,$spliticon = 'gear',$theme=BLACK,$searchbar = FALSE) {
		
		$splitlistbutton = PHP_EOL.<<<EOT
		<ul data-role="listview" data-filter="$searchbar" data-split-icon="$spliticon" data-theme="$theme" data-inset="$datainset">
EOT;
		foreach ($linksarray as $data) {
		
			$splitlistbutton.= PHP_EOL.<<<EOT
			<li><a href="{$data['headingurl']}"><h3>{$data['heading']}</h3><p>{$data['subheading']}</p></a><a href="{$data['splitbuttonurl']}">{$data['splitbuttontitle']}</a></li>
EOT;
		}
		
		$splitlistbutton.= PHP_EOL."</ul>";
		$this->bodycode.= PHP_EOL.$splitlistbutton;
	}
	
	/**
	 * Function addMultiSectionListView
	 *
	 * Adds multiple sections list view
	 *
	 * @param Array $linksarray   // Array of title and url
	 *
	 * @param Inset data $datainset // Should edges be rounded
	 *
	 * @param Theme $theme // Theme
	 *
	 * @param Search bar $searchbar // include search bar or not
	 */
	public function addMultiSectionListView($linksarray,$datainset = TRUE,$theme=BLACK,$searchbar = FALSE) {
		
		$multisectioncode = PHP_EOL.<<<EOT
		<ul data-role="listview" data-filter="$searchbar" data-theme="$theme" data-inset="$datainset">
EOT;
		foreach ($linksarray as $data) {
			
			$multisectioncode.= PHP_EOL.<<<EOT
			<li data-role="list-divider">{$data['sectiontitle']}</li>
EOT;
			
			foreach ($data['sectionlist'] as $sectiondata) {

				$multisectioncode.= PHP_EOL.<<<EOT
				<li><a href="{$sectiondata['url']}">{$sectiondata['title']}</a></li>
EOT;
			}
		}
		
		$multisectioncode.= PHP_EOL."</ul>";
		$this->bodycode.= PHP_EOL.$multisectioncode;
	}
	
	/**
	 * Function addListViewWithImages
	 *
	 * Adds list view with image icon on the left
	 *
	 * @param Array $linksarray   // Array of title and url
	 *
	 * @param Inset data $datainset // Should edges be rounded
	 *
	 * @param Theme $theme // Theme
	 *
	 * @param Search bar $searchbar // include search bar or not
	 */
	public function addListViewWithImages($linksarray,$datainset = TRUE,$theme=BLACK,$searchbar = FALSE) {
		
		$listviewcode = PHP_EOL.<<<EOT
		<ul data-role="listview" data-filter="$searchbar" data-inset="$datainset" data-theme="$theme">
EOT;
		foreach ($linksarray as $data) {
		
			$listviewcode.= PHP_EOL.<<<EOT
			<li><a href="{$data['url']}"><img src="{$data['imageurl']}"><h3>{$data['heading']}</h3><p> {$data['subheading']}</p></a></li>
EOT;
		
		}
		
		$listviewcode.= PHP_EOL."</ul>";
		$this->bodycode.= PHP_EOL.$listviewcode;	
	}
	
	/**
	 * Function addListView
	 *
	 * Adds simple list view to the page
	 *
	 * @param Array $linksarray   // Array of title and url
	 *
	 * @param Search bar $searchbar // include search bar or not
	 */
	public function addListView($linksarray,$searchbar = FALSE) {
		
		$listviewcode = PHP_EOL.<<<EOT
		<ul data-role="listview" data-filter="$searchbar">
EOT;
		foreach ($linksarray as $data) {
			
			$listviewcode.= PHP_EOL.<<<EOT
			<li><a href="{$data['url']}">{$data['title']}</a></li>
EOT;
	
		}
		
		$listviewcode.= PHP_EOL."</ul>";
		$this->bodycode.= PHP_EOL.$listviewcode;
	}
	
	/**
	 * Function addToolBar
	 *
	 * Adds Toolbar to the page
	 *
	 * @param Array $linksarray   // Array of title and url
	 *
	 * @param Search bar $searchbar // include search bar or not
	 */
	public function addToolBar($toolbartitle,$position,$theme = BLACK ) {
		
		$toolabrheading = "";
		$positioncode = "";
		
		if($position=="fixed") {
			$positioncode = "data-position=\"fixed\"";
		}
		
		if($toolbartitle) 
			$toolabrheading = "<h1>$toolbartitle</h1>";
		
		$toolbarcode = PHP_EOL.<<<EOT
		<div data-role="header" $positioncode data-theme="$theme">
		$toolabrheading
		{TOOL_BAR_BUTTONS}
		</div>	
EOT;
	
		$this->headercode.=PHP_EOL.$toolbarcode;
	}
	
	/**
	 * Function addBackButtonToToolBar
	 *
	 * Adds back button to the tool bar this button is similar to javascript function history.go(-1)
	 *
	 * @param Title $buttontitle   // Title of the button
	 *
	 * @param Icon $icon // Icon of the back button
	 * 
	 * @param Icon position $iconposition // Position where icon should be placed
	 * 
	 * @param Animation $transitionstyle  // Animation that should be applied when clicked on the button
	 * 
	 * @param Theme $theme // Theme of button
	 */
	public function addBackButtonToToolBar($buttontitle,$icon,$iconposition="left",$transitionstyle='slide', $theme = BLACK ) {
		
		$showtitle = "";
		if($buttontitle=="")
			$showtitle = "data-iconpos=\"notext\"";
		
		$backbuttoncode = PHP_EOL.<<<EOT
		<a  data-transition="$transitionstyle" data-rel="back" back-btn="true" data-icon="$icon" $showtitle data-iconpos="$iconposition" class= "ui-btn-left" data-theme="$theme">$buttontitle</a>
EOT;
		
		$this->toolbarbuttonscode.= PHP_EOL.$backbuttoncode;

	}
	
	/**
	 * Function addToolBarRightButton
	 *
	 * Adds Right button to the tool bar
	 *
	 * @param Url $pageurl   // Url of the page 
	 *
	 * @param Dialog $openasdialog // Url should be opened as Dialog or not
	 * 
	 * @param TItle $buttontitle  // Title label of the button
	 *
	 * @param Icon position $iconposition // Position where icon should be placed
	 *
	 * @param Animation $transitionstyle  // Animation that should be applied when clicked on the button
	 *
	 * @param Theme $theme // Theme of button
	 */
	public function addToolBarRightButton($pageurl,$openasdialog,$buttontitle,$icon,$iconposition="left",$transitionstyle='slide', $theme = BLACK ) {
		
		$showtitle = "";
		$dialogcode = "";
		
		if($buttontitle=="")
			$showtitle = "data-iconpos=\"notext\"";
		if($openasdialog)
			$dialogcode = "data-rel=\"dialog\"";
		
		$rightbuttoncode = PHP_EOL.<<<EOT
		<a href="$pageurl" $dialogcode data-transition="$transitionstyle" data-role="button" data-icon="$icon" $showtitle data-iconpos="$iconposition" class= "ui-btn-right" data-theme="$theme">$buttontitle</a>	
EOT;
	
		$this->toolbarbuttonscode.= PHP_EOL.$rightbuttoncode;
		
	}
	
	/**
	 * Function addToolBarLeftButton
	 *
	 * Adds Left button to the tool bar
	 *
	 * @param Url $pageurl   // Url of the page
	 *
	 * @param Dialog $openasdialog // Url should be opened as Dialog or not
	 *
	 * @param Title $buttontitle  // Title label of the button
	 *
	 * @param Icon position $iconposition // Position where icon should be placed
	 *
	 * @param Animation $transitionstyle  // Animation that should be applied when clicked on the button
	 *
	 * @param Theme $theme // Theme of button
	 */
	public function addToolBarLeftButton($pageurl,$openasdialog,$buttontitle,$icon,$iconposition="left",$transitionstyle='slide',$theme = BLACK ) {
	
		$showtitle = "";
		$dialogcode = "";
		
		if($buttontitle=="")
			$showtitle = "data-iconpos=\"notext\"";
		if($openasdialog)
			$dialogcode = "data-rel=\"dialog\"";
		
		$rightbuttoncode = PHP_EOL.<<<EOT
		<a href="$pageurl" $dialogcode data-transition="$transitionstyle" data-role="button" data-icon="$icon" $showtitle data-iconpos="$iconposition" class= "ui-btn-left" data-theme="$theme">$buttontitle</a>
EOT;
	
		$this->toolbarbuttonscode.= PHP_EOL.$rightbuttoncode;
	
	}
	
	/**
	 * Function addGroupButtonsToToolbar
	 *
	 * Adds multiple button to tool bar
	 *
	 * @param Buttons $buttonsarray   // Array of buttons to be added to toolbar
	 *
	 * @param Group position $position // Position where group buttons should be placed
	 * 
	 */
	public function addGroupButtonsToToolbar($buttonsarray,$position = "left") {
		
		$groupbuttoncode = PHP_EOL.<<<EOT
		<div data-role="controlgroup" data-type="horizontal" style="float:$position">
EOT;
		foreach ($buttonsarray as $button) {
			
			$showtitle = "";
			$dialogcode = "";
			
			if($button['title']=="")
				$showtitle = "data-iconpos=\"notext\"";
			
			if($button['openasdialog'])
				$dialogcode = "data-rel=\"dialog\"";
			
			
			$groupbuttoncode.= PHP_EOL.<<<EOT
			<a href="{$button['pageurl']}" data-transition="{$button['transitionstyle']}" $dialogcode data-role="button" data-icon="{$button['icon']}" $showtitle data-iconpos="{$button['iconpos']}" data-theme="{$button['theme']}">{$button['title']}</a>
EOT;
		}

		$groupbuttoncode.= PHP_EOL."</div>";
		
		$this->toolbarbuttonscode.= PHP_EOL.$groupbuttoncode;

	}
	
	/**
	 * Function addTabsToHeader
	 *
	 * Adds Multiple tabs to the header
	 *
	 * @param Buttons $buttonsarray   // Array of buttons to be added to Tabs
	 *
	 */
	public function addTabsToHeader($buttonsarray) {
		
		$tabsbuttons = PHP_EOL.<<<EOT
		<div data-role="navbar"><ul>
EOT;
		foreach ($buttonsarray as $button) {
		
			$showtitle = "";
			$dialogcode = "";
			$isactive = "";
			
			if($button['isselected'])
				$isactive = 'class="ui-btn-active"';
		
			if($button['title']=="")
				$showtitle = "data-iconpos=\"notext\"";
		
			if($button['openasdialog'])
				$dialogcode = "data-rel=\"dialog\"";
		
		
			$tabsbuttons.= PHP_EOL.<<<EOT
			<li><a href="{$button['pageurl']}" $isactive data-transition="{$button['transitionstyle']}" $dialogcode data-role="button" data-icon="{$button['icon']}" $showtitle data-iconpos="{$button['iconpos']}" data-theme="{$button['theme']}">{$button['title']}</a></li>
EOT;
		}
		
		$tabsbuttons.= PHP_EOL."</ul></div>";
		
		$this->toolbarbuttonscode.= PHP_EOL.$tabsbuttons;
		
	}
	
	/**
	 * Function addContentToPage
	 *
	 * Add any html code to page
	 *
	 * @param Content  $content   // Content to be added to page
	 *
	 */
	public function addContentToPage($content) {
		
		$this->bodycode.=PHP_EOL. $content;
		
	}
	
	/**
	 * Function addFooter
	 *
	 * Adds Footer to the page
	 *
	 * @param Title $footertitle   // Title of the footer
	 *
	 * @param Position $position // Either footer should have a fixed position or should float with the page
	 * 
	 * @param Theme $theme // Theme of the footer
	 */
	public function addFooter($footertitle,$position,$theme = BLACK ) {
		
		$footerheading = "";
		$positioncode = "";
		
		if($position=="fixed") {
			$positioncode = "data-position=\"fixed\"";
		}
		
		if($footertitle)
			$footerheading = "<h1>$footertitle</h1>";
		
		$footercode = PHP_EOL.<<<EOT
		<div data-role="footer" $positioncode data-theme="$theme">
		$footerheading
		{FOOTER_TOOL_BAR_BUTTONS}
		</div>
EOT;
		
		$this->footercode.=PHP_EOL.$footercode;
	}
	
	/**
	 * Function addLeftButtonToFooter
	 *
	 * Adds Left button to the tool bar
	 *
	 * @param Url $pageurl   // Url of the page
	 *
	 * @param Dialog $openasdialog // Url should be opened as Dialog or not
	 *
	 * @param Title $buttontitle  // Title label of the button
	 * 
	 * @param icon $icon // icon which should appear on the button
	 *
	 * @param Icon position $iconposition // Position where icon should be placed
	 *
	 * @param Animation $transitionstyle  // Animation that should be applied when clicked on the button
	 *
	 * @param Theme $theme // Theme of button
	 */
	public function addLeftButtonToFooter($pageurl,$openasdialog,$buttontitle,$icon,$iconposition="left",$transitionstyle='slide',$theme = BLACK ) {
		
		$showtitle = "";
		$dialogcode = "";
		
		if($buttontitle=="")
			$showtitle = "data-iconpos=\"notext\"";
		if($openasdialog)
			$dialogcode = "data-rel=\"dialog\"";
		
		$rightbuttoncode = PHP_EOL.<<<EOT
		<a href="$pageurl" $dialogcode data-transition="$transitionstyle" data-role="button" data-icon="$icon" $showtitle data-iconpos="$iconposition" class= "ui-btn-left" data-theme="$theme">$buttontitle</a>
EOT;
		
		$this->footertoolbarbuttonscode.=PHP_EOL. $rightbuttoncode;
		
	}
	
	/**
	 * Function addRightButtonToFooter
	 *
	 * Adds Right button to the tool bar
	 *
	 * @param Url $pageurl   // Url of the page
	 *
	 * @param Dialog $openasdialog // Url should be opened as Dialog or not
	 *
	 * @param Title $buttontitle  // Title label of the button
	 *
	 * @param icon $icon // icon which should appear on the button
	 *
	 * @param Icon position $iconposition // Position where icon should be placed
	 *
	 * @param Animation $transitionstyle  // Animation that should be applied when clicked on the button
	 *
	 * @param Theme $theme // Theme of button
	 */
	public function addRightButtonToFooter($pageurl,$openasdialog,$buttontitle,$icon,$iconposition="left",$transitionstyle='slide', $theme = BLACK ) {
		
		$showtitle = "";
		$dialogcode = "";
		
		if($buttontitle=="")
			$showtitle = "data-iconpos=\"notext\"";
		if($openasdialog)
			$dialogcode = "data-rel=\"dialog\"";
		
		$rightbuttoncode = PHP_EOL.<<<EOT
		<a href="$pageurl" $dialogcode data-transition="$transitionstyle" data-role="button" data-icon="$icon" $showtitle data-iconpos="$iconposition" class= "ui-btn-right" data-theme="$theme">$buttontitle</a>
EOT;
		
		$this->footertoolbarbuttonscode.= PHP_EOL.$rightbuttoncode;
	}
	
	/**
	 * Function addTabsToFooter
	 *
	 * Adds Multiple tabs to the Footer
	 *
	 * @param Buttons $buttonsarray   // Array of buttons to be added to Tabs
	 *
	 */
	public function addTabsToFooter($buttonsarray) {
		
		$tabsbuttons = PHP_EOL.<<<EOT
		<div data-role="navbar"><ul>
EOT;
		foreach ($buttonsarray as $button) {
		
			$showtitle = "";
			$dialogcode = "";
			$isactive = "";
		
			if($button['isselected'])
				$isactive = 'class="ui-btn-active"';
		
			if($button['title']=="")
				$showtitle = "data-iconpos=\"notext\"";
		
			if($button['openasdialog'])
				$dialogcode = "data-rel=\"dialog\"";
		
		
			$tabsbuttons.= PHP_EOL.<<<EOT
			<li><a href="{$button['pageurl']}" $isactive data-transition="{$button['transitionstyle']}" $dialogcode data-role="button" data-icon="{$button['icon']}" $showtitle data-iconpos="{$button['iconpos']}" data-theme="{$button['theme']}">{$button['title']}</a></li>
EOT;
		}
		
		$tabsbuttons.= PHP_EOL."</ul></div>";
		
		$this->footertoolbarbuttonscode.= PHP_EOL.$tabsbuttons;
	}
	
}

