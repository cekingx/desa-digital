
<title><?php echo $title; ?></title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Login-->
			<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="<?php echo base_url('storage/logo/logo-gianyar.png')?>" width="150" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3 class="text-primary">Sign In To Desa Digital</h3>
								<p class="opacity-60 font-weight-bold text-primary">Enter your details to login to your account</p>
							</div>
							<form class="form" id="kt_login_signin_form">
								<div class="form-group">
									<input class="form-control h-auto text-primary placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 username" type="text" placeholder="Username" name="username" autocomplete="off" />
									<div style="display:none;" class="fv-plugins-message-container need-username"><div data-field="username" data-validator="notEmpty" class="fv-help-block">Username is required</div></div>
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-primary placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5 password" type="password" placeholder="Password" name="password" />
									<div style="display:none;" class="fv-plugins-message-container need-password"><div data-field="password" data-validator="notEmpty" class="fv-help-block">Password is required</div></div>
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
									<div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-white text-primary m-0">
										<input type="checkbox" name="remember" />
										<span></span>Remember me</label>
									</div>
									<!-- <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password ?</a> -->
								</div>
								<div class="form-group text-center mt-10">
									<button type="button" id="btnLogin" class="btn btn-pill btn-primary font-weight-bold opacity-90 px-15 py-3">Sign In</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign in form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
</div>
<!--end::Entry-->
<!-- script -->
<script>
	$('.preloader').fadeOut();

	$(".username").keyup( function() {
		if($('.username').val() == ''){
			$('.username').addClass('is-invalid');
			$('.need-username').fadeIn(3);
		}else{
			$('.username').removeClass('is-invalid');
			$('.need-username').fadeOut(3);
		}
	});

	$(".password").keyup( function() {
		if($('.password').val() == ''){
			$('.password').addClass('is-invalid');
			$('.need-password').fadeIn(3);
		}else{
			$('.password').removeClass('is-invalid');
			$('.need-password').fadeOut(3);
		}
	});

	$('.warehouse').on("change", function(e) { 
		if($('.warehouse').val() == ''){
			$('.need-warehouse').fadeIn(3);
		}else{
			$('.need-warehouse').fadeOut(3);
		}
	});

	

	$('#btnLogin').click(function(){
		if($('.username').val() == ''){
			$('.username').addClass('is-invalid');
			$('.need-username').fadeIn(3);
		}else if($('.password').val() == ''){
			$('.password').addClass('is-invalid');
			$('.need-password').fadeIn(3);
		}else if($('.warehouse').val() == ''){
			$('.need-warehouse').fadeIn(3);
		}else{
			$('.preloader').fadeIn();
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('post_login') ?>',
				data: {
					username: $('.username').val(),
					password: $('.password').val(),
				},
				dataType: 'json',
				success: function(data) {
					console.log(data)
					if(data.status){
						if(data.user_role_id == 1) {
							window.location = "<?php echo base_url('/super');?>";
						} else if(data.user_role_id == 2) {
							window.location = "<?php echo base_url('/capil');?>";
						} else if(data.user_role_id == 3) {
							window.location = "<?php echo base_url('/desa');?>";
						} else if(data.user_role_id == 4) {
							window.location = "<?php echo base_url('/umum');?>";
						} else {
							window.location = "<?php echo base_url('/');?>";
						}
					}else{
						$('.preloader').fadeOut();
						bootbox.alert({
							message: "Username atau Password salah",
							backdrop: true,
							size: 'small'
						});
					}
				},
				error: function (xhr, desc, err){
					console.log(xhr.responseText);
				}
			});
		}
	});
</script>

<!-- end script -->