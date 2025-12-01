<?php
include __DIR__ . "/../inc/header.php";
?>
<h2>Liste des contacts</h2>
<ul>
    <?php foreach ($contacts as $contact): ?>
        <li><?php echo htmlspecialchars($contact['name']); ?> - <?php echo htmlspecialchars($contact['email']); ?> - <?php echo htmlspecialchars($contact['phone']); ?></li>
    <?php endforeach; ?>
</ul>

<h2>Ajouter un nouveau contact</h2>
<form action="<?php echo $baseURL; ?>/index.php?action=add" method="POST">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Téléphone" required>
    <button type="submit">Ajouter</button>
</form>

<?php
include __DIR__ . "/../inc/footer.php";
?>
