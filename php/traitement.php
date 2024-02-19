<?php
session_start();

// déclaration du traitement

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $level = $_POST['level'];

    $passwordEasy = isset($_SESSION['passwordEasy']) ? $_SESSION['passwordEasy'] : '';
    $passwordNormal = isset($_SESSION['passwordNormal']) ? $_SESSION['passwordNormal'] : '';
    $passwordHard = isset($_SESSION['passwordHard']) ? $_SESSION['passwordHard'] : '';

// logique de création des mots de passe

    switch ($level) {
        case 'easy':
            $_SESSION['password'] = $passwordEasy;
            break;
        case 'normal':
            $_SESSION['password'] = $passwordNormal;
            break;
        case 'hard':
            $_SESSION['password'] = $passwordHard;
            break;
        default:
            $_SESSION['password'] = generer();
            break;
    }    
}

// fonction de génération des mots de passe

function generer($longueur = 6) {

// tableaux avec les différents caractères
 
    $uppercase = range('A', 'Z');
    $lowercase = range('a', 'z');
    $number = range(0, 9);
    $special = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '.', '-', '/', ';', ':', '='];

// mélange des caractères des différents tableaux

    shuffle($uppercase);
    shuffle($lowercase);
    shuffle($number);
    shuffle($special);

// sélection d'au moins un caractère dans chaques tableaux

    $password= $uppercase[0] . $lowercase[0] . $number[0] . $special[0];

    $caracteres = array_merge($uppercase, $lowercase, $number, $special);
    $length = count($caracteres);

    for ($i = 4; $i < $longueur; $i++) {
        $indice = rand(0, $length - 1);
        $password .= $caracteres[$indice];
    }

// mélange une fois de plus

    $passwordArray = str_split($password);
    shuffle($passwordArray);
    $password = implode('', $passwordArray);

    return $password;
}

$_SESSION['passwordEasy'] = generer(6);
$_SESSION['passwordNormal'] = generer(12);
$_SESSION['passwordHard'] = generer(20);

header("Location: ../index.php");
exit;

?>
