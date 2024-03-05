<div class="main-content-container">
    <main class="main-content">
        <?php if (strlen($formError) > 0): ?>
            <div class="form-error-container notification-container">
                <p><?php echo $formError; ?></p>
            </div>
        <?php endif; ?>

        <?php if (strlen($formSuccess) > 0): ?>
            <div class="form-success-container notification-container">
                <p><?php echo $formSuccess; ?></p>
            </div>
        <?php endif; ?>
        <button class="back-button" onclick="window.history.back()">Back</button>
        <h3>Edit Member Details</h3>
        <form action="edit.php" method="post" id="add-member-form">
        <input type="hidden" name="memberId" value="<?php echo $memberId; ?>">
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

            <div class="action-button-container">
                <div>
                    <button class="action-button" type="submit" name="submitMember">Edit Member</button>
                </div>

                <div>
                    <button class="action-button" type="reset">Clear</button>
                </div>
            </div>
        </form>
    </main>