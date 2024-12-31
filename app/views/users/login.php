<?php include_once APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto mt-4">
        <div class="card card-body p-3">
            <h2>Create Account</h2>
            <span class="mb-2">Please fill all the information to create your account</span>
            <form action="<?php echo URLROOT ?>users/login" method="POST">
                <div class="form-groups">
                    <span for="email">Email <sup>*</sup></span>
                    <input type="email" name="email" value="<?php echo $data['email'] ?>" class="form-control form-control-lg <?php echo (!empty($data['email-err']) ? 'is-invalid' : '' ) ?>">
                    <span class="invalid-feedback"><?php echo $data['email-err'] ?></span>
                </div>
                <div class="form-groups">
                    <span for="password">Password <sup>*</sup></span>
                    <input type="password" name="password" value="<?php echo $data['password'] ?>" class="form-control form-control-lg <?php echo (!empty($data['password-err']) ? 'is-invalid' : '' ) ?>">
                    <span class="invalid-feedback"><?php echo $data['password-err'] ?></span>
                </div>
                <div class="">
                    <input type="submit" value="login" class="btn btn-success">
                    <a href="<?php echo APPROOT; ?>users/register" class="btn btn-secondary">You haven't account ? register</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once APPROOT . '/views/inc/footer.php' ?>