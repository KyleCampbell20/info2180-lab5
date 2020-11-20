<!DOCTYPE html>
<html>
<link href="world.css" type="text/css" rel="stylesheet" />

  <?php
    $host = 'localhost';
    $username = 'lab5_user';
    $password = 'password123';
    $dbname = 'world';
    $country = $_GET['country'];



    $conn = new PDO("mysql:host=$host;dbname=$dbname;country=$country;charset=utf8mb4", $username, $password);
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    $stmt1 = $conn->query("SELECT * FROM cities WHERE name LIKE '%$country%'");
    $join = $conn-> query("SELECT cities.name, cities.district, cities.population FROM countries JOIN cities ON cities.country_code=countries.code WHERE countries.name LIKE '%country%' ");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
   
    $_SERVER['REQUEST_URI'];

?>
   
  
    <body>
        <table>
            <thead>
              <tr>
                <th>Country Name</th>
                <th>Continent</th>
                <th>Independence Year</th>
                <th>Head of State</th>
                
              </tr>
            </thead>
            <tbody>
            <?php foreach($results as $row): ?>
              <tr>
              <td><?= $row['name']; ?> </td>
              <td><?= $row['continent']; ?> </td>
              <td><?= $row['independence_year']; ?> </td>
              <td><?= $row['head_of_state']; ?> </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
  
        <table>
            <thead>
              <tr>
                <th>Name</th>
                <th>District</th>
                <th>Popoulation</th>
                
                
              </tr>
            </thead>
            <tbody>
            <?php foreach($join as $row): ?>
              <tr>
              <td><?= $row['name']; ?> </td>
              <td><?= $row['district']; ?> </td>
              <td><?= $row['population']; ?> </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </body>
 


</html> 