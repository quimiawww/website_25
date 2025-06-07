<?php include 'config.php'; if($_SERVER['REQUEST_METHOD']=='POST'){
  $titulo=$_POST['titulo']; $contenido=$_POST['contenido'];
  $stmt=$conn->prepare("INSERT INTO publicaciones(titulo,contenido) VALUES(?,?)");
  $stmt->execute([$titulo,$contenido]);
  header("Location: index.php"); exit;
} include 'includes/header.php'; ?>
<h1 class="text-2xl font-bold mb-4">Nueva Publicación</h1>
<form method="post" class="space-y-4">
  <input type="text" name="titulo" placeholder="Título" required class="w-full border p-2 rounded">
  <textarea name="contenido" placeholder="Contenido" rows="6" class="w-full border p-2 rounded"></textarea>
  <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Publicar</button>
</form>
<?php include 'includes/footer.php'; ?>