<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Adopter</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Register New Adopter</h2>
  <form method="POST">
    <input type="text" name="name" class="form-control mb-2" placeholder="Full Name" required>
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="text" name="phone" class="form-control mb-2" placeholder="Phone">
    
    <select name="pet_id" class="form-control mb-2" required>
      <option value="">-- Select Pet --</option>
      <?php
      $result = $conn->query("SELECT id, name, type, status FROM pets WHERE status='Available'");
      while ($row = $result->fetch_assoc()) {
        echo "<option value='{$row['id']}'>#{$row['id']} - {$row['name']} ({$row['type']})</option>";
      }
      ?>
    </select>

    <button class="btn btn-success" type="submit" name="save">Adopt</button>
  </form>
</div>
</body>
</html>

<?php
if (isset($_POST['save'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pet_id = $_POST['pet_id'];

  // Insert adopter record
  $sql = "INSERT INTO adopters (name, email, phone, pet_id) VALUES ('$name', '$email', '$phone', '$pet_id')";
  if ($conn->query($sql)) {
    // Update pet status to Adopted
    $conn->query("UPDATE pets SET status='Adopted' WHERE id='$pet_id'");
    echo "<script>alert('Adoption Successful!'); window.location='adoption_records.php';</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
