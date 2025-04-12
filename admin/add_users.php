<?php include 'check_session.php' ?>
<?php include 'header.php' ?>
<?php include 'side_menu.php' ?>

    <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Users</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="needs-validation" method="POST" action="user_insert.php" novalidate >
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Firstname
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" name="firstname" class="form-control" id="validationCustom01"  placeholder="Enter a Firstname.." required>
														<div class="invalid-feedback">
															Please enter a username.
														</div>
                                                    </div>
                                                </div>
                                                 <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Lastname
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" name="lastname" class="form-control" id="validationCustom01"  placeholder="Enter a Lastname.." required>
														<div class="invalid-feedback">
															Lastname.
														</div>
                                                    </div>
                                                </div>
                                                  <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom01">Username
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
														<input type="text" name="username" class="form-control" id="validationCustom01"  placeholder="Enter a Username.." required>
														<div class="invalid-feedback">
															Lastname.
														</div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="email" class="form-control" id="validationCustom02"  placeholder="Your valid email.." required>
														<div class="invalid-feedback">
															Please enter a Email.
														</div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-xl-6">
                                                  <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password"  name="password" class="form-control" id="validationCustom03" placeholder="Password" required>
														<div class="invalid-feedback">
															Please enter a password.
														</div>
                                                    </div>
                                                </div>
                                             
                                                  <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom03">Confirm Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="password"  name="confirm_password" class="form-control" id="validationCustom03" placeholder="Confirm Password">
														<div class="invalid-feedback">
															Please enter a password.
														</div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom05">Register as ?
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="default-select wide form-control" name="register" id="validationCustom05">
                                                            <option  data-display="Select" value="earner">Earner</option>
                                                            <option value="advertiser">Advertiser</option>
                                                           
                                                        </select>
														<div class="invalid-feedback">
															Choose
														</div>
                                                    </div>
                                                </div>
                                              
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Suggestions <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea class="form-control"  name="suggestion" id="validationCustom04" placeholder="What would you like to see?"></textarea>
                                                    </div>
                                                </div>
                                                </div>
                                              
                                              
                                                <div class="mb-3 row">
                                                    <div class="col-lg-8 ms-auto">
                                                        <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                 


             
                </div>
            </div>
        </div>
<?php include 'footer.php' ?>