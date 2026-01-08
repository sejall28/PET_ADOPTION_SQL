<?php
include 'db.php'; // connect to the database

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];

    // Handle image upload
    $imageName = $_FILES['image']['name'];
    $tmpName   = $_FILES['image']['tmp_name'];
    $targetDir = "uploads/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . basename($imageName);
    if (!move_uploaded_file($tmpName, $targetFile)) {
        die("Error uploading image.");
    }

    // Insert into DB
    $stmt = $conn->prepare("INSERT INTO pets (name, type, breed, age, gender, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $name, $type, $breed, $age, $gender, $description, $targetFile);

    if ($stmt->execute()) {
        echo "<script>alert('Pet Added Successfully'); window.location='pet_list.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Pet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2>Add New Pet</h2>
  <form method="POST" enctype="multipart/form-data">
    <input type="text" name="name" class="form-control mb-2" placeholder="Pet Name" required>
    <input type="text" name="type" class="form-control mb-2" placeholder="Type (Dog, Cat)" required>
    <input type="text" name="breed" class="form-control mb-2" placeholder="Breed">
    <input type="number" name="age" class="form-control mb-2" placeholder="Age">
    <select name="gender" class="form-control mb-2">
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
    <input type="file" name="image" class="form-control mb-2" accept="image/*" required>
    <button class="btn btn-success" type="submit" name="save">Save</button>
  </form>
</div>
</body>
</html>
