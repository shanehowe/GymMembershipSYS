<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/styles.css">
    <title>View Members</title>

    <?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/services/member_service.php"
    ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php"; ?>

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
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/membersSidebar.php" ?>
    </div>
</body>

</html>