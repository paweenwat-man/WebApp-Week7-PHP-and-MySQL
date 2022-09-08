<?php

require_once "database.php";
$per_page = 10;
$start_page = 0;
$start_content = 0;

if (isset($_GET['page'])) {
  $start_page = $_GET['page'];
  $start_content = $start_page * $per_page;

} else {
  $start_page = 0;
}

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();

$numrow = $stmt->rowCount();
$numpage = ceil($numrow/$per_page);

$stmt = $conn->prepare("SELECT * FROM products LIMIT $start_content, $per_page");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Show Products</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
      <?php include 'pagination.php' ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $i => $data): ?>
          <tr>
            <td scope="row"><?= $data['id'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['description'] ?></td>
            <td><?= $data['price'] ?></td>
            <td><img class="img img-thumbnail" src="<?= $data['image'] ?>" alt="<?= $data['name'] ?>"></td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      <?php include 'pagination.php' ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>