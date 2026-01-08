<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Pet List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2>Available Pets</h2>
  <div class="row">
    <?php
    $result = $conn->query("SELECT * FROM pets");
    while ($row = $result->fetch_assoc()) {
      echo "
      <div class='col-md-4'>
        <div class='card mb-4 shadow-sm'>
          <img src='{$row['image']}' class='card-img-top' style='height:250px; object-fit:cover;'>
          <div class='card-body'>
            <h5 class='card-title'>{$row['name']} ({$row['type']})</h5>
            <p class='card-text'><b>Breed:</b> {$row['breed']} | <b>Age:</b> {$row['age']} | <b>Gender:</b> {$row['gender']}</p>
            <p class='text-muted'>{$row['description']}</p>
            <span class='badge ".($row['status']=='Available'?'bg-success':'bg-secondary')."'>{$row['status']}</span>
          </div>
        </div>
      </div>";
    }
    ?>
  </div>
</div>
</body>
</html>
