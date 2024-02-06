<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Fakultonahrávač</title>
</head>

<body class="container-fluid">
<?php require_once "./navbar.php" ?>
<h1>Studentonahrávač</h1>
<form enctype="multipart/form-data" method="POST">
    <label for="student">Kliknutím nahrajte sutdenta ve validním XML souboru.</label>
    <div class="row">
        <div class="col-auto">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="student">
                <button class="input-group-text" for="inputGroupFile02">Odeslat</button>
            </div>
        </div>
    </div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adresar_studenti = 'studenti/';
    $nahrany_student = $adresar_studenti . basename($_FILES['student']['name']);

    if (file_exists($nahrany_student)) {
        echo '<p class="text-danger">Soubor se stejným názvem již existuje v databázi. Prosím přejmenujte soubor.!</p>';
    } else if (move_uploaded_file($_FILES['student']['tmp_name'], $nahrany_student)) {
        $puvodni_xml = new DOMDocument();
        $puvodni_xml->load($nahrany_student);
        $koren = 'student';
        $generator_dokumentu = new DOMImplementation;
        $doctype = $generator_dokumentu->createDocumentType($koren, "", 'student.dtd');
        $novy_xml = $generator_dokumentu->createDocument(null, "", $doctype);
        $novy_xml->encoding = "utf-8";

        $puvodni_uzel = $puvodni_xml->getElementsByTagName($koren)->item(0);
        if ($puvodni_uzel !== null) {
            $novy_uzel = $novy_xml->importNode($puvodni_uzel, true);
            $novy_xml->appendChild($novy_uzel);

            if ($novy_xml->validate()) {
                echo '<p>Nahraný soubor je validní a byl úspěšně nahrán do databáze.</p>';
            } else {
                echo '<p>Nahraný soubor není validní! Prosím zkontrolujte správnou strukturu.</p>';
                unlink($nahrany_student);
            }
        }
        else
        {
            echo '<p>Nahraný soubor není validní! Prosím zkontrolujte správnou strukturu.</p>';
            unlink($nahrany_student);
        }
    } else {
        echo '<p>Došlo k chybě při nahrávání souboru!</p>';
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>
</html>