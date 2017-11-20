@extends('layout.main')

@section('content')
<?php 
		$project_desc =  DB::table('project_description')
								->where('project_id', '=', $project->id)
								->get();

 ?>
<section>
	<div class="container">
		<h2>Add project</h2>
		<form method="post" enctype="multipart/form-data">
			<input type="text" name="title" placeholder="Title" value="{{$project->title}}">
			<input type="text" name="alias" placeholder="Alias" value="{{$project->alias}}">
			<input type="text" name="color" placeholder="color #" value="{{$project->color}}">
			<h3>About project</h3>
			<input type="text" name="project_title" placeholder="Title" value="{{$project_desc[0]->title}}">
			<h3>Breif</h3>
			<textarea name="breif" id="breif">{{$project_desc[0]->breif}}</textarea>
			<h3>About</h3>
			<textarea name="about" id="about">{{$project_desc[0]->about}}</textarea>
			<h3>Role</h3>
			<textarea name="role" id="role">{{$project_desc[0]->role}}</textarea>
			<h3>Content</h3>
			<textarea name="content" id="content">{{$project_desc[0]->content}}</textarea>
			<button type="submit">Add</button>

		</form>
	</div>
</section>
@stop