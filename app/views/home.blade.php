@extends('layout.main')

@section('content')

	<section class="index-top">
		<div class="container">
			<p>
				Hi, I’m Miha – I’m a Web, UI/UX designer and Front-end developer living in Kranj, Slovenia. I love working on awesome projects with inspiring people.
			</p>
			<ul>
				<li class="dribble">
					<a href="https://dribbble.com/mihavidakovic" target="_blank"><i class="ion-social-dribbble-outline"></i></a>
				</li>
				<li class="twitter">
					<a href="https://twitter.com/mihavidakovic" target="_blank"><i class="ion-social-twitter"></i></a>
				</li>
				<li class="linkedin">
					<a href="http://si.linkedin.com/in/mihavidakovic" target="_blank"><i class="ion-social-linkedin"></i></a>
				</li>
				<li class="mail">
					<a href="{{URL::route('contact')}}"><i class="ion-ios-email-outline"></i></a>
				</li>
			</ul>
			<div class="button">
				<a href="{{URL::route('contact')}}">LET’S WORK ON AWESOME STUFF TOGETHER!</a>
			</div>
		</div>
	</section>

	<section class="index-projects">
		<ul>
			@foreach($projects as $project)
			<li class="{{$project->title}}" style="background-color: {{$project->color}};">
				<div class="content">
					<img src="{{asset($project->logo)}}">
					<h2>{{$project->title}}</h2>
					<a class="button" href="{{URL::route('project', array($project->id))}}">
						View case study
					</a>
				</div>
			</li>
			@endforeach
		</ul>
	</section>
@stop

