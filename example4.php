<?php
include 'WebApp.php';

$webappobj = new WebApps\App\WebApp("Web App Example 3","device-width");

$webappobj->addToolBar("","fixed");

$webappobj->addIphoneNonRetinaAppIcon("images/57x57.png");
$webappobj->addIphoneRetinaAppIcon("images/114X114.png");
$webappobj->addAndroidAppIcon("images/57x57.png");
$webappobj->addOtherPaltformsAppIcon("images/57x57.png");
$webappobj->addIpadAppIcon("72X72.png");

$button1 = array('title' => 'Home','isselected' => TRUE,'pageurl' => "index2.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "home" ,'iconpos' => 'left','theme' => GRAY);
$button2 = array('title' => 'Inbox','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "star" ,'iconpos' => 'left','theme' => GRAY);
$button3 = array('title' => 'Search','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "search" ,'iconpos' => 'left','theme' => GRAY);
$buttonsarray = array($button1,$button2,$button3);

$webappobj->addTabsToHeader($buttonsarray);

$webappobj->addContentToPage("This is body content<br><br>");

$item1 = array('title' => 'List item 1','url' => '#');
$item2 = array('title' => 'List item 2','url' => '#');
$item3 = array('title' => 'List item 3','url' => '#');
$item4 = array('title' => 'List item 4','url' => '#');
$item5 = array('title' => 'List item 5','url' => '#');
$item6 = array('title' => 'List item 6','url' => '#');
$item7 = array('title' => 'List item 7','url' => '#');

$dataarray = array($item1,$item2,$item3,$item4,$item5,$item6,$item7);
$webappobj->addNumberedListView($dataarray,TRUE);



$webappobj->addFooter("","fixed");
$button1 = array('title' => 'Home','isselected' => TRUE,'pageurl' => "index2.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "home" ,'iconpos' => 'left','theme' => YELLOW);
$button2 = array('title' => 'Inbox','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "star" ,'iconpos' => 'left','theme' => YELLOW);
$button3 = array('title' => 'Search','isselected' => FALSE,'pageurl' => "index3.html",'transitionstyle' => 'flip','openasdialog' => FALSE,'icon' => "search" ,'iconpos' => 'left','theme' => YELLOW);
$buttonsarray = array($button1,$button2,$button3);

$webappobj->addTabsToFooter($buttonsarray);

$webappobj->saveToFile("./example4.html");