
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

		<input id="new-family-member-first-name" type="text" placeholder="First name">
		<label for="new-family-member-first-name">First name</label>

		<input id="new-family-member-last-name" type="text" placeholder="Last name">
		<label for="new-family-member-last-name">Last name</label>

		<div>
			<a id="confirm-add-family-member" class="waves-effect waves-light btn">Add</a>
			<a id="cancel-add-family-member" class="waves-effect waves-light btn">Cancel</a>
		</div>

	</div>

</div>
