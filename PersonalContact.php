<?php
require_once "DbConnect.php";


$db = new DbConnect();
$conn = $db->connect();

if(isset($_POST['UserSave'])) {
    $lastName = $_POST['Lastname'];
    $firstName = $_POST['Firstname'];
    $phone = $_POST['Phone'];
    $city = $_POST['City'];
    $address = $_POST['Address'];

    $stmt = $conn->prepare("INSERT INTO UserTable (LastName, FirstName, Phone, City, Address) VALUES (:lastname, :firstname, :phone, :city, :address)");
    $stmt->bindParam(':lastname', $lastName);
    $stmt->bindParam(':firstname', $firstName);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':address', $address);

   
    $stmt->execute();
}

$stmt = $conn->query("SELECT * FROM UserTable");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Contact</title>
    <link rel="stylesheet" href="style.css" type="text/css"
</head>
<body>
    
    <h1>Ajouter un contact</h1>
    <form method="POST" action="">
        <label for="Lastname">Lastname:</label><br>
        <input type="text" id="Lastname" name="Lastname" required><br>
        <label for="Firstname">Firstname:</label><br>
        <input type="text" id="Firstname" name="Firstname" required><br>
        <label for="Phone">Phone:</label><br>
        <input type="text" id="Phone" name="Phone"><br>
        <label for="City">City:</label><br>
        <input type="text" id="City" name="City"><br>
        <label for="Address"><Address></Address>Address:</label><br>
        <textarea id="Address" name="Address"></textarea><br>
        <button type="submit" name="UserSave">UserSave</button>
    </form>
    <h1>Liste des contacts</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>LastName</th>
            <th>FirstName</th>
            <th>Phone</th>
            <th>City</th>
            <th>Address</th>
        </tr>
        <?php foreach($contacts as $contact): ?>
        <tr>
            <td><?= $contact['Id'] ?></td>
            <td><?= $contact['Lastname'] ?></td>
            <td><?= $contact['Firstname'] ?></td>
            <td><?= $contact['Phone'] ?></td>
            <td><?= $contact['City'] ?></td>
            <td><?= $contact['Address'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Contact</title>
    

</html>