@extends('layout.main')

@section('content')
<section>
	<div class="container">
		<h2>Add project</h2>
		<form method="post" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Title">
			<input type="text" name="alias" placeholder="Alias">
			<input type="text" name="color" placeholder="color #">
			<input type="file" name="logo">
			<h3>About project</h3>
			<input type="text" name="project_title" placeholder="Title">
			<input type="file" name="slike[]" multiple>
			<h3>Breif</h3>
			<textarea name="breif" id="breif"></textarea>
			<h3>About</h3>
			<textarea name="about" id="about"></textarea>
			<h3>Role</h3>
			<textarea name="role" id="role"></textarea>
			<h3>Content</h3>
			<textarea name="content" id="content"></textarea>
			<button type="submit">Add</button>

		</form>
	</div>
</section>
@stop