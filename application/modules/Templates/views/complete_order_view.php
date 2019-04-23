<?php $this->load->view($header_view); ?>
<!-- news -->
	<div class="news-section py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Steps to 
				<span class="font-weight-bold">Order</span>
			</h3>
        </div>

        <div class="col-md-4" style="width:800px; margin:0 auto;"> 
            <h3>Get Started</h3>
            <form action="<?php echo base_url(); ?>Services/confirm_email" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="uname">Email:</label>
                    <input type="text" class="form-control" id="uname" value="<?php echo $mail; ?>" name="email" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname">First Name:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter your First Name" name="fname" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname">Last Name:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter your Last Name" name="lname" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname">Create Password:</label>
                    <input type="password" class="form-control" id="uname" placeholder="Create a password" name="npassword" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname">Confirm Password:</label>
                    <input type="password" class="form-control" id="uname" placeholder="Confirm password" name="cpassword" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="uname">Address:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter your address" name="address" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        // Disable form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
<?php $this->load->view($footer_view); ?>