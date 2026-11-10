<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>CodeIgniter kursu</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding: 0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>

<body>

	<div id="container">
		<h1>Kullanıcı Kayıt Formu</h1>

		<div id="body">
			<p>Kullanıcı kayıt formunu burada doldurabilirsiniz.</p>

			<form action="<?php echo base_url("index.php/users/save") ?>" method="POST">

				<code>
					<label for="name">isim</label>
					<input type="text" id="name" 
					name="name" 
					value="<?php echo isset($formError) ? set_value("name") : "" ?>"
					placeholder="lütfen isminizi giriniz">
					
					<?php if (isset($formError)) { 
						echo "<small>" . form_error ("name") . "</small>";
					} ?>
						
				</code>
				<code>
					<label for="surname">soyisim</label>
					<input type="text" id="surname" 
					name="surname" 
					value="<?php echo isset($formError) ? set_value("surname") : "" ?>"
					placeholder="lütfen soyisminizi giriniz">
					
					<?php if (isset($formError)) { 
						echo "<small>" . form_error ("surname") . "</small>";
					} ?>
					
				</code>
				<code>
					<label for="email">email</label>
					<input type="text" id="email" 
					name="email" 
					value="<?php echo isset($formError) ? set_value("email") : "" ?>"
					placeholder="lütfen emailinizi giriniz">
					
					<?php if (isset($formError)) { 
						echo "<small>" . form_error ("email") . "</small>";
					} ?>
				</code>
				<code>
					<label for="password">şifre</label>
					<input type="text" id="password" 
					name="password" 
					value="<?php echo isset($formError) ? set_value("password") : "" ?>"
					placeholder="lütfen şifrenizi giriniz">
					
					<?php if (isset($formError)) { 
						echo "<small>" . form_error ("password") . "</small>";
					} ?>
				</code>
				<code>
					<label for="re-password">re-password</label>
					<input type="text" id="re-password" 
					name="re-password" 
					value="<?php echo isset($formError) ? set_value("re-password") : "" ?>"
					placeholder="lütfen şifrenizi tekrar giriniz">
					
					<?php if (isset($formError)) { 
						echo "<small>" . form_error ("re-password") . "</small>";
					} ?>
				</code>
				<input type="submit" value="kayıt ol">


			</form>


			<table border="2px">
				<thead>
					<tr>
                        <td>ID</td>
						<td>İsim</td>
						<td>Soyisim</td>
						<td>Email</td>
						<td>Şifre</td>
					</tr>
				
				
			    </thead>
				<tbody>
					<?php foreach ($users as $user) { ?>
						<tr>
							<td><?php echo $user->id ?></td>
							<td><?php echo $user->name ?></td>
							<td><?php echo $user->surname ?></td>
							<td><?php echo $user->email ?></td>
							<td><?php echo $user->password ?></td>
						</tr>
					<?php } ?>
				</tbody>

</table>
		
		</div>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>

</body>

</html>