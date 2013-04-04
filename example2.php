<?php
include 'WebApp.php';

$webappobj = new WebApps\App\WebApp("Web App Example 2","device-width");

$webappobj->addSplashImage("320X460.png");

$webappobj->addIphoneNonRetinaAppIcon("images/57x57.png");
$webappobj->addIphoneRetinaAppIcon("images/114X114.png");
$webappobj->addAndroidAppIcon("images/57x57.png");
$webappobj->addOtherPaltformsAppIcon("images/57x57.png");
$webappobj->addIpadAppIcon("72X72.png");

$webappobj->addToolBar("","fixed");

$button1 = array('title' => '','pageurl' => "index2.html",'transitionstyle' => 'flip','openasdialog' => TRUE,'icon' => "gear" ,'iconpos' => 'left','theme' => GRAY);
$button2 = array('title' => '','pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "refresh" ,'iconpos' => 'left','theme' => GRAY);
$buttonsarray = array($button1,$button2);
$webappobj->addGroupButtonsToToolbar($buttonsarray,"left");

$webappobj->embedVideo("", 300, 300, "https://www.youtube.com/embed/3PuHGKnboNY");

$item1 = array('heading' => 'List item 1','subheading' => 'sub heading 1','url' => '#','imageurl' => 'addressbook.png');
$item2 = array('heading' => 'List item 2','subheading' => 'sub heading 2','url' => '#','imageurl' => 'addressbook.png');
$item3 = array('heading' => 'List item 3','subheading' => 'sub heading 3','url' => '#','imageurl' => 'addressbook.png');
$dataarray = array($item1,$item2,$item3);
$webappobj->addListViewWithImages($dataarray,true,YELLOW,FALSE);

$accordian1data1 = array('title'=> "Item 1",'body' => "This is the body of item no 1",'collapsed'=>TRUE,'theme' => WHITE);
$accordian1data2 = array('title'=> "Item 2",'body' => "This is the body of item no 2",'collapsed'=>FALSE,'theme' => WHITE);
$accordian1data3 = array('title'=> "Item 3",'body' => "This is the body of item no 3",'collapsed'=>TRUE,'theme' => WHITE);

$dataarray = array($accordian1data1,$accordian1data2,$accordian1data3);
$webappobj->addCollapseableAccordion($dataarray);

$webappobj->addPhoneCallButton("Call us Free!", "+11800233333",$theme=BLACK);
$webappobj->addFaceTimeCallButton("Call me using facetime", "423423423");
$webappobj->addSmsButton("+2323232", "Send sms");
$webappobj->addSkypeCallButton("skypeusername", "Call us using skype");

$item1 = array('title' => 'List item 1','url' => '#');
$item2 = array('title' => 'List item 2','url' => '#');
$item3 = array('title' => 'List item 3','url' => '#');
$item4 = array('title' => 'List item 4','url' => '#');
$item5 = array('title' => 'List item 5','url' => '#');
$item6 = array('title' => 'List item 6','url' => '#');
$item7 = array('title' => 'List item 7','url' => '#');

$dataarray = array($item1,$item2,$item3,$item4,$item5,$item6,$item7);
$webappobj->addListView($dataarray,FALSE);

$webappobj->addFooter("Copy rights all rights reserved 2013","flexible");

$webappobj->saveToFile("./example2.html");