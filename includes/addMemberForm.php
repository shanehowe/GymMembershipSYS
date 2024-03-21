<div class="main-content-container">
    <main class="main-content">
        <?php if (strlen($formError) > 0): ?>
            <div class="form-error-container notification-container">
                <p>
                    <?php echo $formError; ?>
                </p>
            </div>
        <?php endif; ?>

        <?php if (strlen($formSuccess) > 0): ?>
            <div class="form-success-container notification-container">
                <p>
                    <?php echo $formSuccess; ?>
                </p>
            </div>
        <?php endif; ?>
        <h3>Add Member</h3>
        <form action="add.php" method="post" id="add-member-form" class="form-style">
            <label class="form-label" for="first-name-input">First Name</label>
            <input class="input-text" type="text" name="firstName" id="first-name-input" placeholder="First name..."
                value="<?php echo $firstName; ?>">

            <label class="form-label" for="last-name-input">Last Name</label>
            <input class="input-text" type="text" name="lastName" id="last-name-input" placeholder="Last name..."
                value="<?php echo $lastName; ?>">

            <label class="form-label" for="email-input">Email</label>
            <input class="input-text" type="email" name="email" id="email-input" placeholder="Email..."
                value="<?php echo $email; ?>">

            <label class="form-label" for="phone-input">Phone</label>
            <input class="input-text" type="text" name="phone" id="phone-input" placeholder="Phone number..."
                value="<?php echo $phone; ?>">

            <label class="form-label" for="membership-type-select">Membership Type</label>
            <select class="input-text" name="membershipType" id="membership-type-select">
                <option value="">Select a membership type...</option>
                <?php getActiveMembershipTypes(); ?>
            </select>

            <div class="action-button-container">
                <button class="submit-button" type="submit" name="submitMember">Add Member</button>
                <button class="submit-button" type="reset">Clear</button>
            </div>
        </form>

    </main>