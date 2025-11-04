<?php
// Tableau du menu complet
$menu = [
    "entrees" => [
        ["nom" => "Salade César", "prix" => 4.55],
        ["nom" => "Soupe à l’oignon", "prix" => 3.50],
        ["nom" => "Bruschetta", "prix" => 4.90]
    ],
    "plats" => [
        ["nom" => "Lasagnes", "prix" => 12.99],
        ["nom" => "Poulet curry", "prix" => 11.0],
        ["nom" => "Poisson pané", "prix" => 9.5]
    ],
    "desserts" => [
        ["nom" => "Tiramisu", "prix" => 6.30],
        ["nom" => "Crème brûlée", "prix" => 4.5],
        ["nom" => "Mousse au chocolat", "prix" => 4.40]
    ]
];

// Tableau de personnes
$personnes = ["Alice", "Bob", "Charlie"];

// Boucle sur chaque personne pour les afficher
foreach ($personnes as $pers) {
    echo "<h2>Menu pour $pers</h2>";
    $total = 0;

    // Boucle imbriquée pour chaque catégorie
    foreach ($menu as $categorie => $plats) {
        $choix = $plats[array_rand($plats)];
        echo "<p>" . ucfirst($categorie) . " : <strong>{$choix['nom']}</strong> - {$choix['prix']} €</p>";
        $total += $choix['prix'];
    }

    // Condition pour réduction si le total dépasse 20 euros
    if ($total > 20) {
        $reduction = round($total * 0.1, 2);
        $total -= $reduction;
        echo "<p>💸 Réduction appliquée : -{$reduction} €</p>";
    }

    echo "<p>💳 Total à payer : <strong>$total €</strong></p>";
    echo "<hr>";
}
?>
