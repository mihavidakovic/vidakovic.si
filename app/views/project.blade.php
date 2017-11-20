@extends('layout.main')
<meta name="theme-color" content="{{$project->color}}">
@section('content')
<?php 
		$project_desc =  DB::table('project_description')
								->where('project_id', '=', $project->id)
								->get();

 ?>
<section id="work" class="simplicy">
	<div class="container">
		<div class="brief">
			<h2>{{$project_desc[0]->title}}</h2>
			<p>{{$project_desc[0]->breif}}</p>
		</div>
	</div>
	<header style="background-color: {{$project->color}}">
		<img src="{{asset($project->logo)}}">
		<h2>{{$project->title}}</h2>
	</header>
	<div class="about-project">
		<div class="container">
			<div class="left">
				<h3>About this project</h3>
				<p>{{$project_desc[0]->about}}</p>
			</div>
			<div class="right">
				<h3>My role</h3>
				<p>{{$project_desc[0]->role}}</p>
			</div>
		</div>
	</div>
	<div class="all">
		<div class="container">
			 {{$project_desc[0]->content}}
		</div>
	</div>
</section>
<div class="move">
	<div class="prev">
		<a href="{{URL::route('project', $project_desc[0]->prev_project)}}">
			<i class="ion-ios-arrow-left"></i>
			<p>Previous project</p>
		</a>
	</div>
	<div class="next">
		<a href="{{URL::route('project', $project_desc[0]->next_project)}}">
			<i class="ion-ios-arrow-right"></i>
			<p>Next project</p>
		</a>
	</div>
</div>
@stop