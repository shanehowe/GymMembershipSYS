<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/styles.css">
    <title>View Members</title>
    <?php require_once "../../../envParser.php" ?>

    <?php
    function getMembers()
    {
        $db_username = $_ENV["DB_USERNAME"];
        $db_host = $_ENV["DB_HOST"];
        $db_name = $_ENV["DB_NAME"];

        $pdo = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $pdo->query("SELECT * FROM members");
        while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td>" . $row["memberid"] . "</td>";
            echo "<td>" . $row["FirstName"] . "</td>";
            echo "<td>" . $row["LastName"] . "</td>";
            echo "<td>" . $row["Status"] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</head>

<body>
    <?php include "../../includes/navbar.php" ?>

    <div class="main-content-container">
        <main class="main-content">
            <div class="searchbar-container">
                <form action="">
                    <div>
                        <label for="searchbar">Search Members</label>
                    </div>
                    <input type="text" name="memberSearch" id="searchbar" placeholder="Enter members name..." />
                    <input type="button" value="Search" type="submit" id="search-button-input" />
                </form>
            </div>

            <section class="members-table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php getMembers(); ?>
                    </tbody>
                </table>
            </section>
        </main>
        <?php include "../../includes/membersSidebar.php" ?>
    </div>
</body>

</html>