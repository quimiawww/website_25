<?php include 'config.php'; include 'includes/header.php'; ?>
<h1 class="text-3xl font-bold mb-6">Noticias</h1>
<a href="nueva.php" class="bg-blue-600 text-white px-4 py-2 rounded">Nueva Publicación</a>
<?php
$stmt = $conn->query("SELECT * FROM publicaciones ORDER BY fecha DESC");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
  <div class="bg-white shadow p-4 rounded mt-4">
    <h2 class="text-xl font-semibold"><?= htmlspecialchars($row['titulo']) ?></h2>
    <p class="text-sm text-gray-500"><?= $row['fecha'] ?></p>
    <a href="editar.php?id=<?= $row['id'] ?>" class="text-blue-600 mr-2">Editar</a>
    <a href="eliminar.php?id=<?= $row['id'] ?>"
       onclick="return confirm('¿Eliminar esta publicación?')"
       class="text-red-600">Eliminar</a>
  </div>
<?php endwhile; include 'includes/footer.php'; ?>