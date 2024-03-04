<div class="main-content-container">
    <main class="main-content">
        <button class="back-button" onclick="window.history.back()">Back</button>
        <h3>Member Details</h3>
        <div class="member-card">
            <div class="member-card-info">
                    <div class="member-card-info-item">
                        <div class="member-card-info-item-label">
                            <p>First Name</p>
                        </div>
                        <div class="member-card-info-item-value">
                            <p><?php echo $member['FirstName']; ?></p>
                        </div>
                    </div>
                    <div class="member-card-info-item">
                        <div class="member-card-info-item-label">
                            <p>Last Name</p>
                        </div>
                        <div class="member-card-info-item-value">
                            <p><?php echo $member['LastName']; ?></p>
                        </div>
                    </div>
                    <div class="member-card-info-item">
                        <div class="member-card-info-item-label">
                            <p>Email</p>
                        </div>
                        <div class="member-card-info-item-value">
                            <p><?php echo $member['Email']; ?></p>
                        </div>
                    </div>
                    <div class="member-card-info-item">
                        <div class="member-card-info-item-label">
                            <p>Phone</p>
                        </div>
                        <div class="member-card-info-item-value">
                            <p><?php echo $member['Phone']; ?></p>
                        </div>
                    </div>
                    <div class="member-card-info-item">
                        <div class="member-card-info-item-label">
                            <p>Membership Type</p>
                        </div>
                        <div class="member-card-info-item-value">
                            <p><?php echo $member['TypeCode']; ?></p>
                        </div>
                    </div>
                    <div class="member-card-info-item">
                        <div class="member-card-info-item-label">
                            <p>Membership Start Date</p>
                        </div>
                        <div class="member-card-info-item-value">
                            <p><?php echo $member['StartDate']; ?></p>
                        </div>
                    </div>
                    <div class="member-card-info-item">
                        <div class="member-card-info-item-label">
                            <p>Membership End Date</p>
                        </div>
                        <div class="member-card-info-item-value">
                            <p><?php echo $member['EndDate']; ?></p>
                        </div>
                    </div>
            </div>
        </div>
    </main>