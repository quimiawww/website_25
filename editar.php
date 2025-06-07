<?php include 'config.php';
if(!isset($_GET['id'])) header('Location:index.php');
$id = (int)$_GET['id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
  $stmt = $conn->prepare("UPDATE publicaciones SET titulo=?, contenido=? WHERE id=?");
  $stmt->execute([$_POST['titulo'], $_POST['contenido'], $id]);
  header("Location: index.php"); exit;
}
$stmt = $conn->prepare("SELECT * FROM publicaciones WHERE id=?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$post) die('No existe');
include 'includes/header.php'; ?>
<h1 class="text-2xl font-bold mb-4">Editar Publicación</h1>
<form method="post" class="space-y-4">
  <input type="text" name="titulo" value="<?= htmlspecialchars($post['titulo']) ?>" required class="w-full border p-2 rounded">
  <textarea name="contenido" rows="6" class="w-full border p-2 rounded"><?= htmlspecialchars($post['contenido']) ?></textarea>
  <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Actualizar</button>
</form>
<?php include 'includes/footer.php'; ?>