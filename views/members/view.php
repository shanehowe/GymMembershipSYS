<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/services/member_service.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/header.html";
include $_SERVER['DOCUMENT_ROOT'] . "/includes/navbar.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

$members = getMembers();

if (isset($_POST['memberSearchSubmit'])) {
    $memberSearch = $_POST['memberSearch'];
    if (!empty($memberSearch))
        $members = getMembersByName($_POST['memberSearch']);
}
?>
<div class="main-content-container">
    <main class="main-content">
        <div class="searchbar-container">
            <form action="view.php" method="post">
                <div>
                    <label for="searchbar">Search Members</label>
                </div>
                <input type="text" name="memberSearch" id="searchbar" placeholder="Enter members name..." />
                <input value="Search" type="submit" id="search-button-input" name="memberSearchSubmit" />
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($members as $member): ?>
                    <tr
                        class="member-table-row" 
                        data-href="<?php echo BASE_URL . '/views/members/view_member.php?id=' . $member['memberid']; ?>"
                    >
                        <td><?php echo $member['memberid']; ?></td>
                        <td><?php echo $member['FirstName']; ?></td>
                        <td><?php echo $member['LastName']; ?></td>
                        <td><?php echo $member['Status']; ?></td>
                        <td>Edit</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    <?php 
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/membersSidebar.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/includes/footer.html";
    ?>