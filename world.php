<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if((empty($_GET['context']))){
        $country = filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
       
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table>
          <thead>
            <tr>
              <th>Country</th>
              <th>Continent</th>
              <th>Year of Independence</th>
              <th>Head of State</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($results as $row): ?>
              <tr>
                <td><?= $row['name']?></td>
                <td><?= $row['continent']?></td>
                <td><?= $row['independence_year']?></td>
                <td><?= $row['head_of_state']?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        
        <ul>
        <?php foreach ($results as $row): ?>
          <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php } else { 
      $country = filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
      $stmt = $conn->query("SELECT cities.name, cities.district,cities.population from cities join countries on cities.country_code = countries.code where countries.name like '%$country%'");
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>District</th>
              <th>Population</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $row): ?>
            <tr>
              <td><?= $row['name']; ?></td>
              <td><?= $row['district']; ?></td>
              <td><?= $row['population']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
      <!--caption sis-->
      </table>

    <?php } 
}?>


