<?php
include 'WebApp.php';

$webappobj = new WebApps\App\WebApp("Web App","device-width");

$webappobj->addIphoneNonRetinaAppIcon("images/57x57.png");
$webappobj->addIphoneRetinaAppIcon("images/114X114.png");
$webappobj->addAndroidAppIcon("images/57x57.png");
$webappobj->addOtherPaltformsAppIcon("images/57x57.png");
$webappobj->addIpadAppIcon("72X72.png");

$webappobj->addToolBar("","fixed");

$webappobj->addSplashImage("320x460-iphone-startup.png");

$button1 = array('title' => 'Home','isselected' => TRUE,'pageurl' => "index2.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "home" ,'iconpos' => 'left','theme' => GRAY);
$button2 = array('title' => 'Inbox','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "star" ,'iconpos' => 'left','theme' => GRAY);
$button3 = array('title' => 'Search','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "search" ,'iconpos' => 'left','theme' => GRAY);
$buttonsarray = array($button1,$button2,$button3);

$webappobj->addTabsToHeader($buttonsarray);

$webappobj->addButtonToBody("index2.html",TRUE, "Get Location", FALSE,"","left","slide",BLACK);


$webappobj->addForm("frm", "frm", "page2.php", "POST");

$webappobj->addTextFieldToForm("Enter Your Name", "Enter your name", "number", "yourname23", "yourname23");

$webappobj->addSliderToForm("Price Range", "price", "price",10 ,100, 20,2);

$webappobj->addToggleButtonToForm("Gender", "gender", "gender", "Male", "male", "Female", "female");


$webappobj->addTextAreaToForm("Your Comments", "Enter your comments please", "comments", "comments");


$option1 = array('label'=>"PHP 1",'value'=>'php1');
$option2 = array('label'=>"PHP 2",'value'=>'php2');
$option3 = array('label'=>"PHP 3",'value'=>'php3');
$option4 = array('label'=>"PHP 4",'value'=>'php4');
$option5 = array('label'=>"PHP 5",'value'=>'php5');

$alloptions = array($option1,$option2,$option3,$option4,$option5);
$webappobj->addSelectMenuToForm("Select Language", "language", "language", $alloptions,TRUE);

/// As per html requirement radio buttons name should be same for them to work
$radiobutton1 = array('id' => 'button1','name' => 'deliverymethod','label'=>'UPS','value' => 'ups');
$radiobutton2 = array('id' => 'button2','name' => 'deliverymethod','label'=>'FEDEX','value' => 'fedex');
$radiobutton3 = array('id' => 'button3','name' => 'deliverymethod','label'=>'DHL','value' => 'dhl');
$buttons = array($radiobutton1,$radiobutton2,$radiobutton3);

$webappobj->addRadioButtonToForm("Select Delivery method", $buttons,"horizontal");

$ceckbox1 = array('id' => 'chkbutton1','name' => 'chkbutton1','label'=>'UPS','value' => 'ups');
$ceckbox2 = array('id' => 'chkbutton2','name' => 'chkbutton2','label'=>'FEDEX','value' => 'fedex');
$ceckbox3 = array('id' => 'chkbutton3','name' => 'chkbutton3','label'=>'DHL','value' => 'dhl');

$buttons = array($ceckbox1,$ceckbox2,$ceckbox3);

$webappobj->addCheckBoxesToForm("Favourite Delivery company", TRUE, $buttons,'horizontal');

$webappobj->addSubmitButton("Submit Form");

$webappobj->addFooter("","fixed");


$button1 = array('title' => 'Home','isselected' => TRUE,'pageurl' => "index2.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "home" ,'iconpos' => 'left','theme' => YELLOW);
$button2 = array('title' => 'Inbox','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "star" ,'iconpos' => 'left','theme' => YELLOW);
$button3 = array('title' => 'Search','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "search" ,'iconpos' => 'left','theme' => YELLOW);
$buttonsarray = array($button1,$button2,$button3);

$webappobj->addTabsToFooter($buttonsarray);

$webappobj->saveToFile("./example1.html");
