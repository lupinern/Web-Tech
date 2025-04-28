<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <header>
        <nav>
			<?php include("navigation.php"); ?> 
        </nav>
    </header>
    <main>
        <section class="content">
		<div class="form-container">
			<form action="submit_order.php" method="post" id="enquiry-form">
            			<!-- Main content goes here -->
				<h1>Enquiry Form</h1>
				<h3>Complete this form to place your order</h3>
				<!-- First Name -->
				<p><label for="enquiry-first_name">First Name</label><br>
					<input 
						type="text" 
						id="enquiry-first_name" 
						name="enquiry-first_name" 
						maxlength="25" 
						placeholder="Ex: John" 
						pattern="[A-Za-z]{1,25}" 
						required="required"
					/>
				</p>
				
				<!-- Last Name -->
				<p><label for="enquiry-last_name">Last Name</label><br>
					<input 
						type="text" 
						id="enquiry-last_name" 
						name="enquiry-last_name" 
						maxlength="25" 
						placeholder="Ex: Smith" 
						pattern="[A-Za-z]{1,25}" 
						required="required"
					/>
				</p>

				<!-- Email Address -->
				<p><label for="enquiry-email">Email address</label><br>
					<input 
						type="email" 
						id="enquiry-email" 
						name="enquiry-email" 
						placeholder="Ex: john123@mail.com" 
						required="required"
					/>
				</p>

				<!-- Address Fieldset -->
				<fieldset id="enquiry-address">
					<legend>Address</legend>

					<!-- Street Address -->
					<p><label for="enquiry-street_address">Street Address</label><br>
						<input 
							type="text" 
							id="enquiry-street_address" 
							name="enquiry-street_address" 
							maxlength="40" 
							placeholder="Ex: John Smith st., no. 5A, 12345" 
							required="required"
						/>
					</p>

					<!-- City/Town -->
					<p><label for="enquiry-city">City/Town</label><br>
						<input 
							type="text" 
							id="enquiry-city" 
							name="enquiry-city" 
							maxlength="20" 
							placeholder="Ex: Kuching" 
							required="required"
						/>
					</p>

					<!-- State -->
					<p><label for="enquiry-state">State</label><br>
						<select id="enquiry-state" name="enquiry-state" required="required">
							<option value="">Please Select</option>
							<option value="Johor">Johor</option>
							<option value="Kedah">Kedah</option>
							<option value="Kelantan">Kelantan</option>
							<option value="Malacca">Malacca</option>
							<option value="Negeri Sembilan">Negeri Sembilan</option>
							<option value="Pahang">Pahang</option>
							<option value="Penang">Penang</option>
							<option value="Perak">Perak</option>
							<option value="Perlis">Perlis</option>
							<option value="Sabah">Sabah</option>
							<option value="Sarawak">Sarawak</option>
							<option value="Selangor">Selangor</option>
							<option value="Terengganu">Terengganu</option>
							<option value="Kuala Lumpur">Kuala Lumpur</option>
							<option value="Labuan">Labuan</option>
							<option value="Putrajaya">Putrajaya</option>
						</select>	
					</p>

					<!-- Postcode -->
					<p><label for="enquiry-postcode">Postcode</label><br>
						<input 
							type="text" 
							id="enquiry-postcode" 
							name="enquiry-postcode" 
							maxlength="5"
							placeholder="Ex: 12345" 
							pattern="\d{5}" 
							required="required"
						/>
					</p>
				</fieldset>

				<!-- Phone Number -->
				<p><label for="enquiry-phone">Phone number</label><br>
					<input 
						type="text" 
						id="enquiry-phone" 
						name="enquiry-phone" 
						placeholder="Ex: 0123456789" 
						pattern="\d{10}" 
						required="required"
					/>
				</p>

				<!-- Enquiry -->
				<p><label for="enquiry">Enquiry</label><br>
					<select id="enquiry" name="enquiry" required="required">
						<option value="">Please Select</option>
						<option value="enquiry1">Membership</option>
						<option value="enquiry2">Products</option>
						<option value="enquiry3">Pop-up Market activities</option>
					</select>
				</p>

				<!-- Submit and Reset Button -->
				<input type="submit" name="submit" id="enquiry-submit"/>
				<input type="reset" name="reset" id="enquiry-reset"/>
			</form>
		</div>
	</section>
    </main>
    <footer>
		<?php include("footer.php"); ?> 
    </footer>
</body>
</html>