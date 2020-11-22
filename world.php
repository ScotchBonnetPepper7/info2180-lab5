<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8mb4", $username, $password);
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = $_GET["context"];

if ($context = "cities"){
  $stmt = $conn->query(" SELECT cities.name, cities.district,cities.population FROM countries INNER JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE '%country%'");
}
else {
  $stmt = $conn->query(" SELECT * FROM countries WHERE name LIKE '%$country%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<?php if ($context == "cities"): ?>
<table>  
  <tr>
    <th>Name</th>
    <th>District</th> 
    <th>Population</th>
  </tr>

<?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['district']; ?></td>
      <td><?= $row['population']; ?></td>
    </tr>

<?php endforeach; ?>
</table>
<?php endif;?>

<?php if ($context != "cities"): ?>
<table>
    <tr>
      <th>Name</th>
      <th>Continent</th> 
      <th>Independence Year</th>
      <th>Head of State</th>
    </tr>

<?php foreach ($results as $rows): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['contiinent']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
    </tr>

<?php endforeach; ?>
</table>
<?php endif;?>