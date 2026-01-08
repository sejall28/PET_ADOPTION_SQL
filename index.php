<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>🐾 Pet Adoption System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h1 class="text-center mb-4">🐾 Pet Adoption System</h1>
  <p class="text-center text-muted mb-5">Manage pets, adopters, and adoptions</p>
  <div class="row g-4">
    <div class="col-md-3">
      <div class="card shadow-sm text-center p-3">
        <h5>➕ Add Pet</h5>
        <p>Register a new pet</p>
        <a href="add_pet.php" class="btn btn-primary">Go</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm text-center p-3">
        <h5>📋 Pet List</h5>
        <p>See all available pets</p>
        <a href="pet_list.php" class="btn btn-success">Go</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm text-center p-3">
        <h5>👤 Add Adopter</h5>
        <p>Register new adopter</p>
        <a href="add_adopter.php" class="btn btn-primary">Go</a>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm text-center p-3">
        <h5>📦 Adoption Records</h5>
        <p>Track adopted pets</p>
        <a href="adoption_records.php" class="btn btn-danger">Go</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>

