<?php include 'indexController.php' ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css" type="text/css" />
    <title>Part10 - TP</title>
</head>
<body>
<form method="POST" action="index.php" class="container">
    <div class="border border-dark p-3 rounded mt-5 bg bg-info">
        <h1 class="text-center"><i class="fas fa-id-badge"></i> <u>Identité</u></h1>
        <div id="identity">
            <!-- On vérifie si POST contient quelquechose plutot que formErrors, sinon formErrors reste à 0 et rien ne se passe -->
            <div class="row">
                <div class="col-2">
                    <label for="civility">Civilité<span class="text-danger">*</span> :  </label>
                    <select class="form-control" name="civility">
                        <option value="">Sélectionner</option>
                        <?php foreach($civilityList as $civilityName => $civilityValue){ ?>
                            <option <?= (isset($_POST['civility']) && $_POST['civility'] == $civilityValue) ? 'selected' : '' ?> value="<?= $civilityValue ?>"><?= $civilityName ?></option>
                            <?php } ?>
                    </select>
                    <p class="text-danger text-center"><?= isset($formErrors['civility']) ? $formErrors['civility'] : '' ?></p>
                </div>
                <!-- Nom et prénom -->
                <div class="col-5 form-group <?= count($_POST) > 0 ? (isset($formErrors['lastname']) ? 'has-danger' : 'has-success') : '' ?>">
                    <label for="lastname">Nom<span class="text-danger">*</span> :  </label>
                    <input type="text" name="lastname" id="lastname" placeholder="Ex : Dupont" class="form-control <?= count($_POST) > 0 ? (isset($formErrors['lastname']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['lastname']) ? 'value="' . $_POST['lastname'] . '"' : '' ?> />
                    <?php if (isset($formErrors['lastname'])) { ?>
                        <p class="text-danger text-center"><?= $formErrors['lastname'] ?></p>
                    <?php } ?>
                </div>
                <div class="col-5 form-group <?= count($_POST) > 0 ? (isset($formErrors['firstname']) ? 'has-danger' : 'has-success') : ''  ?>">
                    <label for="firstname">Prénom<span class="text-danger">*</span> :  </label>
                    <input type="text" name="firstname" id="firstname" placeholder="Ex : Gérard" class="form-control <?= count($_POST) > 0 ? (isset($formErrors['firstname']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['firstname']) ? 'value="' . $_POST['firstname'] . '"' : '' ?> />
                    <?php if (isset($formErrors['firstname'])) { ?>
                        <p class="text-danger text-center"><?= $formErrors['firstname'] ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <!-- Date de naissance -->
                <div class="col-4 form-group">
                    <label for="birthDate">Date de naissance<span class="text-danger">*</span> :  </label>
                    <input type="date" name="birthDate" id="birthDate" class="form-control <?= count($_POST) > 0 ? (isset($formErrors['birthDate']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['birthDate']) ? 'value="' . $_POST['birthDate'] . '"' : '' ?> />
                    <p class="text-danger text-center"><?= isset($formErrors['birthDate']) ? $formErrors['birthDate'] : '' ?></p>
                </div>
                <!-- Pays de naissance -->
                <div class="col-4 form-group <?= count($_POST) > 0 ? (isset($formErrors['birthCountry']) ? 'has-danger' : 'has-success') : '' ?>">
                    <label for="birthCountry">Pays de naissance<span class="text-danger">*</span> :  </label>
                    <select name="birthCountry" id="birthCountry" class="form-control">
                        <option disabled selected>Sélectionner</option>
                        <?php
                        // Boucle Pays
                        foreach ($countries as $country) {
                        ?><option <?= (isset($_POST['birthCountry']) && $_POST['birthCountry'] == $country) ? 'selected' : '' ?> value="<?= $country ?>"><?= $country ?></option><?php
                        } ?>
                    </select>
                    <p class="text-danger text-center"><?= isset($formErrors['birthCountry']) ? $formErrors['birthCountry'] : '' ?></p>
                </div>
                <!-- Nationalité -->
                <div class="col-4 form-group">
                    <label for="nationality">Nationalité<span class="text-danger">*</span> :  </label>
                    <select name="nationality" id="nationality" class="form-control">
                        <option disabled selected>Sélectionner</option>
                        <?php
                        // Boucle Pays
                        foreach ($countries as $country) {
                        ?><option <?= (isset($_POST['nationality']) && $_POST['nationality'] == $country) ? 'selected' : '' ?> value="<?= $country ?>"><?= $country ?></option><?php
                        } ?>
                    </select>
                    <p class="text-danger text-center"><?= isset($formErrors['nationality']) ? $formErrors['nationality'] : '' ?></p>
                </div>
            </div>
        </div>
        <p class="text-right"><i class="fas fa-exclamation-triangle"></i> <span class="text-danger">*</span> = Obligatoire <i class="fas fa-exclamation-triangle"></i></p>
    </div>
    <div id="coordinates">
        <div class="border border-dark p-3 rounded mt-5 bg bg-info">
            <h1 class="text-center"><i class="fas fa-map-signs"></i> <u>Coordonnées</u></h1>
            <div class="row">
                <div class="form-group col-8">
                    <label for="address">Adresse<span class="text-danger">*</span> : </label>
                    <input type="text" name="address" id="address" placeholder="Ex : 4 rue Etienne Dolet" class="form-control" />
                </div>
                <div class="form-group col-4">
                    <label for="city">Ville<span class="text-danger">*</span> : </label>
                    <input type="text" name="city" id="city" placeholder="Ex : Creil" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="postal">Code Postal<span class="text-danger">*</span> : </label>
                    <input type="text" name="postal" id="postal" placeholder="Ex : 60100" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="actualCountry">Nationalité<span class="text-danger">*</span> : </label>
                    <select name="actualCountry" id="actualCountry" class="form-control">
                        <option disabled selected>Sélectionner</option>
                        <?php
                        // Boucle Pays
                        foreach ($countries as $country) {
                        ?><option value="<?= $country ?>"><?= $country ?></option><?php
                        } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-group  <?= count($_POST) > 0 ? (isset($formErrors['mobile']) ? 'has-danger' : 'has-success') : ''  ?>">
                    <label for="mobile">Téléphone<span class="text-danger">*</span> : </label>
                    <input type="text" id="mobile" name="mobile" placeholder="Ex : 03.44.44.44.55" class="form-control <?= count($_POST) > 0 ? (isset($formErrors['mobile']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['mobile']) ? 'value="' . $_POST['mobile'] . '"' : '' ?> />
                    <?php if (isset($formErrors['mobile'])) { ?>
                        <p class="text-danger text-center"><?= $formErrors['mobile'] ?></p>
                    <?php } ?>
                </div>
                <div class="col-8 form-group <?= count($_POST) > 0 ? (isset($formErrors['email']) ? 'has-danger' : 'has-success') : ''  ?>">
                    <label for="email">Adresse e-mail<span class="text-danger">*</span> : </label>
                    <input type="text" id="email" name="email" placeholder="Ex : email@email.com" class="form-control <?= count($_POST) > 0 ? (isset($formErrors['email']) ? 'is-invalid' : 'is-valid') : '' ?>" <?= isset($_POST['email']) ? 'value="' . $_POST['email'] . '"' : '' ?> />
                    <?php if (isset($formErrors['email'])) { ?>
                        <p class="text-danger text-center"><?= $formErrors['email'] ?></p>
                    <?php } ?>
                </div>
            </div>
            <p class="text-right"><i class="fas fa-exclamation-triangle"></i> <span class="text-danger">*</span> = Obligatoire <i class="fas fa-exclamation-triangle"></i></p>
        </div>
    </div>
    <div class="informations">
        <div class="border border-dark p-3 rounded mt-5 bg bg-info">
            <h1 class="text-center"><i class="fas fa-info-circle"></i> <u>Informations complémentaires</u></h1>
            <label for="degree">Diplome<span class="text-danger">*</span> : </label>
            <select name="degree" id="degree" class="form-control">
                <option selected disabled>Selectionner</option>
                <option value="without">Sans</option>
                <option value="bac1">Baccalauréat</option>
                <option value="bac2">Baccalauréat +2</option>
                <option value="bac3">Baccalauréat +3 ou plus</option>
            </select>
            <label for="poleEmploi">Numéro Pole Emploi<span class="text-danger">*</span> :</label>
            <input type="number" id="poleEmploi" name="poleEmploi" placeholder="Ex : 36247891K" class="form-control" />
            <label for="badgeNumber">Nombre de badges : </label>
            <select name="badgeNumber" id="badgeNumber" class="form-control">
                <option disabled selected>Selectionner</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="more">Plus</option>
            </select>
            <label for="codecademyLink">Lien codecademy : </label>
            <input type="text" id="codecademyLink" name="codecademyLink" placeholder="Ex : https//...." class="form-control" />
        </div>
        <div class="questions">
            <div class="border border-dark p-3 rounded mt-5 bg bg-info">
                <h1 class="text-center"><i class="fas fa-question-circle"></i> <u>Questionnaire</u></h1>
                <label for="question1">Si vous étiez un super héros/une super héroïne, qui seriez-vous et pourquoi ?</label>
                <textarea name="question1" id="question1" row="5" class="form-control" placeholder="Votre réponse ..."></textarea>
                <label for="question2">Racontez-nous un de vos "hacks" : </label>
                <textarea name="question2" id="question2" row="5" class="form-control" placeholder="Votre réponse ..."></textarea>
                <label for="question3">Avez vous déjà eu une expérience avec la programmation et/ou l'informatique avant de remplir ce formulaire ?</label>
                <textarea name="question3" id="question3" row="5" class="form-control" placeholder="Votre réponse ..."></textarea>
            </div>
        </div>
        <button type="submit" class="mb-5 btn btn-info col-12 border border-dark mt-5" name="send">Envoyer</button>
    </div>
</form>
</body>

</html>