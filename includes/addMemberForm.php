<div class="main-content-container">
    <main class="main-content">
        <?php if (strlen($formError) > 0): ?>
            <div class="form-error-container">
                <p><?php echo $formError; ?></p>
            </div>
        <?php endif; ?>
        <h3>Add Member</h3>
        <form action="" method="post">
            <div class="input-container">
                <div class="input-inside-container">
                    <div>
                        <label for="first-name-input">First Name</label>
                    </div>
                    <input class="text-input" type="text" name="firstName" id="first-name-input"
                        placeholder="First name..." value="<?php echo $firstName; ?>">
                </div>

                <div class="input-inside-container">
                    <div>
                        <label for="last-name-input">Last Name</label>
                    </div>
                    <input class="text-input" type="text" name="lastName" id="last-name-input"
                        placeholder="Last name..." value="<?php echo $lastName; ?>">
                </div>
            </div>

            <div class="input-container">
                <div class="input-inside-container">
                    <div>
                        <label for="email-input">Email</label>
                    </div>
                    <input class="text-input" type="email" name="email" id="email-input" placeholder="Email..."
                        value="<?php echo $email; ?>">
                </div>

                <div class="input-inside-container">
                    <div>
                        <label for="phone-input">Phone</label>
                    </div>
                    <input class="text-input" type="text" name="phone" id="phone-input" placeholder="Phone number..."
                        value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="input-container">
                <div class="input-inside-container">
                    <div>
                        <label for="membership-type-select">Membership Type</label>
                    </div>
                    <select class="text-input" name="membershipType" id="membership-type-select" value="<?php echo $membershipType; ?>">
                        <option value="">Select a membership type...</option>
                        <?php getActiveMembershipTypes(); ?>
                    </select>
                </div>

                <div class="input-inside-container">
                    <div>
                        <label for="dob-picker">Date of birth</label>
                    </div>
                    <input type="date" name="dob" id="dob-picker">
                </div>
            </div>

            <div class="action-button-container">
                <div>
                    <button class="action-button" type="submit" name="submitMember">Add Member</button>
                </div>

                <div>
                    <button class="action-button" type="reset">Clear</button>
                </div>
            </div>
        </form>
    </main>