 <?php

    $users = [
        ["name" => "Jean", "email" => "jean@example.com"],
        ["name" => "Paul", "email" => "paul@example.com"],
        ["name" => "Belmondo", "email" => "belmondo@example.com"],
    ];

    // Convertit le tableau PHP en JSON
    echo json_encode($users);
    ?>
