
<h2>Liste des contacts</h2>
<ul>
    <?php foreach ($contacts as $contact): ?>
        <li><?php echo htmlspecialchars($contact['name']); ?> - <?php echo htmlspecialchars($contact['email']); ?> - <?php echo htmlspecialchars($contact['phone']); ?></li>
    <?php endforeach; ?>
</ul>

<h2>Ajouter un nouveau contact</h2>
<form action="<?php echo $baseURL; ?>/add" method="POST">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Téléphone">
    <button type="submit">Ajouter</button>
</form>

