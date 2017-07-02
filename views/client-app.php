
<div class="app-section-home app-section active">

	<h5>Home Info</h5>

	<div class="input-field">
		<input id="street" type="text" placeholder="Your address">
		<label for="street">Street address</label>
	</div>

	<div class="input-field">
		<input id="city" type="text" placeholder="Your city">
		<label for="street">City</label>
	</div>

	<div class="input-field">
		<select id="state">
			<option value="" selected="selected">Select your state</option>
			<option value="AL">Alabama</option>
			<option value="AK">Alaska</option>
			<option value="AZ">Arizona</option>
			<option value="AR">Arkansas</option>
			<option value="CA">California</option>
			<option value="CO">Colorado</option>
			<option value="CT">Connecticut</option>
			<option value="DE">Delaware</option>
			<option value="DC">District Of Columbia</option>
			<option value="FL">Florida</option>
			<option value="GA">Georgia</option>
			<option value="HI">Hawaii</option>
			<option value="ID">Idaho</option>
			<option value="IL">Illinois</option>
			<option value="IN">Indiana</option>
			<option value="IA">Iowa</option>
			<option value="KS">Kansas</option>
			<option value="KY">Kentucky</option>
			<option value="LA">Louisiana</option>
			<option value="ME">Maine</option>
			<option value="MD">Maryland</option>
			<option value="MA">Massachusetts</option>
			<option value="MI">Michigan</option>
			<option value="MN">Minnesota</option>
			<option value="MS">Mississippi</option>
			<option value="MO">Missouri</option>
			<option value="MT">Montana</option>
			<option value="NE">Nebraska</option>
			<option value="NV">Nevada</option>
			<option value="NH">New Hampshire</option>
			<option value="NJ">New Jersey</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
			<option value="NC">North Carolina</option>
			<option value="ND">North Dakota</option>
			<option value="OH">Ohio</option>
			<option value="OK">Oklahoma</option>
			<option value="OR">Oregon</option>
			<option value="PA">Pennsylvania</option>
			<option value="RI">Rhode Island</option>
			<option value="SC">South Carolina</option>
			<option value="SD">South Dakota</option>
			<option value="TN">Tennessee</option>
			<option value="TX">Texas</option>
			<option value="UT">Utah</option>
			<option value="VT">Vermont</option>
			<option value="VA">Virginia</option>
			<option value="WA">Washington</option>
			<option value="WV">West Virginia</option>
			<option value="WI">Wisconsin</option>
			<option value="WY">Wyoming</option>
		</select>
	</div>

	<div class="input-field">

		<input id="zip" type="text" placeholder="Your zip code">
		<label for="zip">Zip code</label>

	</div>

</div>

<div class="app-section-church app-section">

	<h5>Church Info</h5>

	<div>

		<p>Do you currently attend a church?</p>

		<p>
			<input id="attend-church" name="church-attendance" type="radio">
			<label for="attend-church">Yes</label>
		</p>

		<p>
			<input id="do-not-attend-church" name="church-attendance" type="radio">
			<label for="do-not-attend-church">No</label>
		</p>

	</div>

	<div class="church-name-container input-field">
		<input id="church-name" type="text" placeholder="Your church">
		<label for="church-name">Church</label>
	</div>

</div>

<div class="app-section-family-members app-section">

	<h5>Family Members</h5>

	<p>List yourself and any other people currently living with you.</p>

	<a id="add-family-member" class="waves-effect waves-light btn">Add a person</a>

	<div class="new-family-member">

		<div class="input-field">
			<input id="new-family-member-first-name" type="text" placeholder="First name">
			<label for="new-family-member-first-name">First name</label>
		</div>

		<div class="input-field">
			<input id="new-family-member-last-name" type="text" placeholder="Last name">
			<label for="new-family-member-last-name">Last name</label>
		</div>

		<p>Gender</p>

		<p>
			<input id="new-family-member-gender-female" name="new-family-member-gender" type="radio">
			<label for="new-family-member-gender-female">Female</label>
		</p>

		<p>
			<input id="new-family-member-gender-male" name="new-family-member-gender" type="radio">
			<label for="new-family-member-gender-male">Male</label>
		</p>

		<div class="input-field">
			<input id="new-family-member-relationship" type="text" placeholder="Relationship to you">
			<label for="new-family-member-relationship">Relationship</label>
		</div>

		<div>
			<div>
				<label for="new-family-member-birthdate">Birthdate</label>
			</div>
			<div>
				<input id="new-family-member-birthdate" type="date" class="datepicker">
			</div>
		</div>

		<div class="input-field">
			<input id="new-family-member-last-four" type="text" placeholder="Last Four of SSN">
			<label for="new-family-member-last-four">Last Four of SSN</label>
		</div>

		<div class="input-field">

			<textarea id="new-family-member-wishlist" class="materialize-textarea"></textarea>
			<label for="new-family-member-wishlist">Wishlist</label>

		</div>

		<div>
			<a id="confirm-add-family-member" class="waves-effect waves-light btn">Add</a>
			<a id="cancel-add-family-member" class="waves-effect waves-light btn">Cancel</a>
		</div>

	</div>

</div>
