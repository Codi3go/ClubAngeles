<div>
	<?php if (isset($_SESSION["login_invalid"])) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?php echo $_SESSION["login_invalid"]; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php unset($_SESSION["login_invalid"]);
	} ?>
	<?php if (isset($_SESSION["username"])) {
		header("Location: ../../Angeles/pages/welcome.php");
	} ?>
	<div class="container" id="container">

		<div class="form-container">
			<form action="../../Angeles/tasks/do_login.php" method="POST">
				<h1>Sign in</h1>
				<input type="email" name="email" placeholder="Email" required />
				<input type="password" name="password" placeholder="Password" required />
				<a href="#">Forgot your password?</a>
				<button type="submit">Sign In</button>
			</form>
		</div>
	</div>
</div>