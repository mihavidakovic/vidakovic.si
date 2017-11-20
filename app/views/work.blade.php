@extends('layout.main')

@section('content')
	<section class="index-projects work">
		<h2>My work</h2>
		<ul>
			@foreach($projects as $project)
			<li class="{{$project->title}}" style="background-color: {{$project->color}};">
				<img src="{{asset($project->logo)}}">
				<h2>{{$project->title}}</h2>
				<div class="button">
					<a href="{{URL::route('project', array($project->id))}}">
						View case study
					</a>
				</div>
			</li>
			@endforeach
		</ul>
	</section>
@stop