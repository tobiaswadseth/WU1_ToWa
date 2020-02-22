<?php

$fields = array('InputUsername' => 'Username', 'InputPassword' => 'Passwrod');

$successMessage = 'Du har loggats in!';

$errorMessage = 'Ett fel uppstod när du skulel logga in. Var vänlig försök igen senare!';

try {
    if (count($_POST) == 0) {
        throw new \Exception('Form is empty');
    }

    $user->login($fields[0], $fields[1]);
    header('Location: index.php');

    $responseArray = array('type' => 'success', 'message' => $successMessage);
} catch (\Exception $e) {
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
} else {
    echo $responseArray['message'];
}
