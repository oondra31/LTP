<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Fakultonahrávač</title>

</head>

<body class="container-fluid">
<?php require_once "./navbar.php" ?>

<form action="form.php" method="post">
    <div class="row mb-3">
        <div class="col-auto">
            <label for="studentID" class="form-label">Studentské číslo: </label>
            <input type="text" class="form-control" id="studentID" name="studentID">
        </div>
        <div class="col-auto">
            <label for="stID" class="form-label">Student ID: </label>
            <input type="text" class="form-control" id="stID" name="stID">
        </div>
    </div>
    <div class="row mb-3">
        <label for="name" class="form-label">Jméno: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="row mb-3">
        <label for="surname" class="form-label">Přijmení: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="surname" name="surname">
        </div>
    </div>
    <div class="row mb-3">
        <label for="faculty" class="form-label">Fakulta: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="faculty" name="faculty">
        </div>
    </div>
    <div class="row mb-3">
        <label for="department" class="form-label">Katedra: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="department" name="department">
        </div>
    </div>
    <hr/>
    <h3>Absolovované předměty:</h3>
    <div class="row mb-3">
        <div class="col-auto">
            <label for="subjectName" class="form-label">Název předmětu: </label>
            <input type="text" class="form-control" id="subjectName" name="subjectName">
        </div>
        <div class="col-auto">
            <label for="subjectType" class="form-label">Zkratka: </label>
            <input type="text" class="form-control" id="subjectType" name="subjectType">
        </div>
    </div>
    <div class="row mb-3">
        <label for="term" class="form-label">Semestr: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="term" name="term">
        </div>
    </div>
    <div class="row mb-3">
        <label for="statute" class="form-label">Statut: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="statute" name="statute">
        </div>
    </div>
    <div class="row mb-3">
        <label for="kredits" class="form-label">Kredity: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="kredits" name="kredits">
        </div>
    </div>
    <div class="row mb-3">
        <label for="attempt" class="form-label">Pokus: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="attempt" name="attempt">
        </div>
    </div>
    <div class="row mb-3">
        <label for="rating" class="form-label">Hodnocení: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="rating" name="rating">
        </div>
    </div>
    <div class="row mb-3">
        <label for="points" class="form-label">Body: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="points" name="points">
        </div>
    </div>
    <div class="row mb-3">
        <label for="date" class="form-label">Datum: </label>
        <div class="col-auto">
            <input type="text" class="form-control" id="date" name="date">
        </div>
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!--<form action="form.php" method="post">
    Studentské číslo: <input type="text" name="studentID"> Student ID: <input type="text" name="stID"><br>
    Jméno: <input type="text" name="name"><br>
    Přijmeni: <input type="text" name="surname"><br>
    Fakulta: <input type="text" name="faculty"><br>
    Katedra: <input type="text" name="department"><br>
    Absolovované předměty: <br>
    Název předmětu: <input type="text" name="subjectName"> Zkratka: <input type="text" name="subjectType"> <br>
    Semestr: <input type="text" name="term"> <br>
    Statut: <input type="text" name="statute"> <br>
    Kredity: <input type="text" name="kredits"> <br>
    Pokus: <input type="text" name="attempt"> <br>
    Hodnocení: <input type="text" name="rating"> <br>
    Body: <input type="text" name="points"> <br>
    Datum: <input type="text" name="date"> <br>

    <input type="submit">
</form>-->
<script>
    let st_cislo = document.getElementById("studentID");
    let st_id = document.getElementById("stID");
    const re1 = /^f\d{5}$/;
    const re2 = /^st\d{5}$/;
    st_cislo.addEventListener("keyup",()=>{
        let st = st_cislo.value;
        //console.log(st);
        let found = st.match(re1);
        if (found == null || found.length !=1) console.log("Neplatné st")
        else console.log("ST OK")
    });
    st_id.addEventListener("keyup",()=>{
        let st = st_id.value;
        //console.log(st);
        let found = st.match(re2);
        if (found == null || found.length !=1) console.log("Neplatné ID")
        else console.log("ID OK")
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
