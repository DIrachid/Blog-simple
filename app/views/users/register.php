<?php include_once APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto mt-4">
        <div class="card card-body p-3">
            <h2>Create Account</h2>
            <span class="mb-2">Please fill all the information to create your account</span>
            <form action="<?php echo URLROOT ?>users/register">
                <div class="form-groups">
                    <span for="name">Username <sup>*</sup></span>
                    <input type="text" name="username" value="<?php $data['name'] ?>" class="form-control form-control-lg <?php echo (!empty($data['name-err'] ? 'is-invalid' : '' )) ?>">
                    <span class="invalid-feedback"><?php echo $data['name-err'] ?></span>
                </div>
                <div class="form-groups">
                    <span for="email">Email <sup>*</sup></span>
                    <input type="email" name="email" value="<?php $data['email'] ?>" class="form-control form-control-lg <?php echo (!empty($data['email-err'] ? 'is-invalid' : '' )) ?>">
                    <span class="invalid-feedback"><?php echo $data['email-err'] ?></span>
                </div>
                <div class="form-groups">
                    <span for="password">Password <sup>*</sup></span>
                    <input type="password" name="password" value="<?php $data['password'] ?>" class="form-control form-control-lg <?php echo (!empty($data['password-err'] ? 'is-invalid' : '' )) ?>">
                    <span class="invalid-feedback"><?php echo $data['password-err'] ?></span>
                </div>
                <div class="form-groups">
                    <span for="confirm_password">Confirm Password <sup>*</sup></span>
                    <input type="password" name="confirm_password" value="<?php $data['confirm_password'] ?>" class="form-control form-control-lg <?php echo (!empty($data['confirm-password-err'] ? 'is-invalid' : '' )) ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm-password-err'] ?></span>
                </div>
                <div class="">
                    <input type="submit" value="Register" class="btn btn-success">
                    <a href="<?php echo APPROOT; ?>" class="btn btn-secondary">Have you an account login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.php' ?>