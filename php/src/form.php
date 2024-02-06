<?php

$xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?> <student/>");

$xml->addAttribute('studentské_číslo', $_POST["studentID"]);
$xml->addAttribute('st', $_POST["stID"]);
$xml->addChild('jméno', $_POST["name"]);
$xml->addChild('přijmeni', $_POST["surname"]);
$xml->addChild('fakulta', $_POST["faculty"]);
$xml->addChild('katedra', $_POST["department"]);
$abspred=$xml->addChild("absolovované_předměty");
$pre=$abspred->addChild("předmět");
$pre->addAttribute('název', $_POST["subjectName"]);
$pre->addAttribute('zkratka', $_POST["subjectType"]);
$pre->addChild('semestr', $_POST["term"]);
$pre->addChild('statut', $_POST["statute"]);
$pre->addChild('kredity', $_POST["kredits"]);
$pre->addChild('pokus', $_POST["attempt"]);
$pre->addChild('hodnocení', $_POST["rating"]);
$pre->addChild('body', $_POST["points"]);
$pre->addChild('datum', $_POST["date"]);

file_put_contents("studenti/".$_POST["studentID"].".xml",$xml->asXML());
header("Location: /student_list.php");
?>

