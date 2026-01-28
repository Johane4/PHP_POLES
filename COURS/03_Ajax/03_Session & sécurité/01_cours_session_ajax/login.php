<?php
session_start();

$users = ['admin' => '1234'];

if (isset($_POST['name'], $_POST['password'])) {
    $name = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);

    //si le nom et le mdp correspondent
    // version raccourcie pour savoir si le mdp est bien associé à la clé name du tableau users
    if (isset($users[$name]) && $users[$name] === $password) {
        // si oui on crée la session
        $_SESSION['name'] = $name;
        echo json_encode(['success' => true, 'name' => $name]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Identifiants incorrects.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Veuillez remplir tous les champs.']);
}
