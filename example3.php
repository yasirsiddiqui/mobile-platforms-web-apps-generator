<?php
include 'WebApp.php';

$webappobj = new WebApps\App\WebApp("Web App Example 3","device-width");

$webappobj->addIphoneNonRetinaAppIcon("images/57x57.png");
$webappobj->addIphoneRetinaAppIcon("images/114X114.png");
$webappobj->addAndroidAppIcon("images/57x57.png");
$webappobj->addOtherPaltformsAppIcon("images/57x57.png");
$webappobj->addIpadAppIcon("72X72.png");

$webappobj->addToolBar("Example 3","fixed");

$webappobj->addBackButtonToToolBar("Back", "back",'left','slide',BLACK);

/// Default Jquery Mobile buttons icons are listed here http://jquerymobile.com/demos/1.2.1/docs/buttons/buttons-icons.html
$webappobj->addToolBarRightButton("#page3",FALSE, "Refresh", "refresh","left","slideup");

$item1 = array('title' => 'List item 1','url' => '#');
$item2 = array('title' => 'List item 2','url' => '#');
$item3 = array('title' => 'List item 3','url' => '#');
$item4 = array('title' => 'List item 4','url' => '#');
$item5 = array('title' => 'List item 5','url' => '#');
$item6 = array('title' => 'List item 6','url' => '#');
$item7 = array('title' => 'List item 7','url' => '#');

$dataarray = array($item1,$item2,$item3,$item4,$item5,$item6,$item7);
$webappobj->addInsetList($dataarray,BLUE,FALSE);



$item1 = array('heading' => 'List item 1','headingurl' => '#','subheading' => 'Sub heading for item 1','splitbuttonurl' => '#','splitbuttontitle' => 'Buy Now');
$item2 = array('heading' => 'List item 2','headingurl' => '#','subheading' => 'Sub heading for item 2','splitbuttonurl' => '#','splitbuttontitle' => 'Buy Now');
$item3 = array('heading' => 'List item 3','headingurl' => '#','subheading' => 'Sub heading for item 3','splitbuttonurl' => '#','splitbuttontitle' => 'Buy Now');

$dataarray = array($item1,$item2,$item3);
$webappobj->addSplitButtonList($dataarray,TRUE,'refresh',YELLOW,FALSE);


$webappobj->addCollapseableContent("Expand me to see data", "This is the data that should appear inside me",TRUE,WHITE);

$webappobj->addCollapseableContent("Expand me 2", "This is the data that should appear inside me",TRUE,WHITE);

$webappobj->addCollapseableContent("Expand me 3", "This is the data that should appear inside me",FALSE,WHITE);

$section1 = array('sectiontitle' => 'Section 1', 'sectionlist' => array(array('url' => '#','title'=>'List 1'),array('url' => '#','title'=>'List 2'),array('url' => '#','title'=>'List 3')));
$section2 = array('sectiontitle' => 'Section 2', 'sectionlist' => array(array('url' => '#','title'=>'List 1'),array('url' => '#','title'=>'List 2'),array('url' => '#','title'=>'List 3')));
$section2 = array('sectiontitle' => 'Section 3', 'sectionlist' => array(array('url' => '#','title'=>'List 1'),array('url' => '#','title'=>'List 2'),array('url' => '#','title'=>'List 3')));

$dataarray = array($section1,$section2,$section2);
$webappobj->addMultiSectionListView($dataarray,TRUE,GRAY,FALSE);



$webappobj->addFooter("Copy rights all rights reserved 2013","flexible");

$webappobj->saveToFile("./example3.html");

