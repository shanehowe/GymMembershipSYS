<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/styles/styles.css">
    <title>View Members</title>
</head>
<body>
    <?php include "../../includes/navbar.php" ?>

    <div class="main-content-container">
        <main class="main-content">
            <div class="searchbar-container">
                <form action="">
                    <div>
                        <label for="searchbar">Name</label>
                    </div>
                    <input type="text" name="memberSearch" id="searchbar" placeholder="Enter members name..."/>
                    <input type="button" value="Search" type="submit" id="search-button-input" />
                </form>
            </div>
        </main>
        <?php include "../../includes/membersSidebar.php" ?>
    </div>
</body>
</html>