<?php
$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
$civilityList = array('Mr' => 'Monsieur','Mme' => 'Madame', 'Mlle' => 'Mademoiselle');
$regexName = '^[\p{L}]{1}[\' \-\p{L}]+$^';
$regexMail = '^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]{2,}.[a-zA-Z]{2,4}$^';
$regexTel = '^(\+33[0-9]{9})|([0-9]{2}[ .\/-]?){5}$^';
$formErrors = array();
if(isset($_POST['send'])){
    if(count($_POST) > 0){

        if(!empty($_POST['civility'])){
            //Si la valeur est bien présente dans le tableau
            if(in_array($_POST['civility'], $civilityList)){
                $civility = htmlspecialchars($_POST['civility']);
            }else{
                $formErrors['civility'] = 'Une erreur est survenue.';
            }
        }else{
            //Sinon on demande à l'utilisateur de faire son choix
            $formErrors['civility'] = 'Sélectionnez une civilité.';
        }

        if(!empty($_POST['birthDate'])){
            $birthDate = htmlspecialchars($_POST['birthDate']);
        }else{
            $formErrors['birthDate'] = 'Selectionnez une date de naissance';
        }

        if(!empty($_POST['birthCountry'])){
            if(in_array($_POST['birthCountry'], $countries)){
                $birthCountry = htmlspecialchars($_POST['birthCountry']);
            }else{
                $formErrors['birthCountry'] = 'Une erreur est survenue.';
            }
        }else{
            $formErrors['birthCountry'] = 'Sélectionnez un pays de naissance.';
        }

        if(!empty($_POST['nationality'])){
            if(in_array($_POST['nationality'], $countries)){
                $birthCountry = htmlspecialchars($_POST['nationality']);
            }else{
                $formErrors['nationality'] = 'Une erreur est survenue.';
            }
        }else{
            $formErrors['nationality'] = 'Sélectionnez une nationalité.';
        }

        if(!empty($_POST['lastname'])) {
            if(preg_match($regexName, $_POST['lastname'])) {
                $lastname = htmlspecialchars($_POST['lastname']);
            }else{
                $formErrors['lastname'] = 'Merci de n\'utiliser que des lettres.';
            }
        }else{
            $formErrors['lastname'] = 'Votre nom de famille n\'est pas renseigné.';
        }

        if(!empty($_POST['firstname'])) {
            if(preg_match($regexName, $_POST['firstname'])) {
                $firstname = htmlspecialchars($_POST['firstname']);
            }else{
                $formErrors['firstname'] = 'Merci de  n\'utiliser que des lettres.';
            }
        }else{
            $formErrors['firstname'] = 'Votre prénom n\'est pas renseigné.';
        }

        if(!empty($_POST['email'])){
            if(preg_match($regexMail, $_POST['email'])){
                $emailAdress = htmlspecialchars($_POST['email']);
            }else{
                $formErrors['email'] = 'Merci de respecter le format d\'e-mail valide.';
            }
        }else{
            $formErrors['email'] = 'Veuillez renseigner votre e-mail.'; 
        }

        if(!empty($_POST['mobile'])){
            if(preg_match($regexTel, $_POST['mobile'])){
                $mobileNumber= htmlspecialchars($_POST['mobile']);
            }else{
                $formErrors['mobile'] = 'Merci de respecter le format téléphonique valide.';
            }
        }else{
            $formErrors['mobile'] = 'Veuillez renseigner votre numéro de téléphone.'; 
        }
    }
}?>

