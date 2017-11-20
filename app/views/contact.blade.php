@extends('layout.main')

@section('content')

<section class="contact">
	<div class="container">
		<h2>Contact me</h2>
		<p>You can reach me at <a href="mailto:miha@vidakovic.si">miha@vidakovic.si</a> or you can use contact form below.</p>
		<div class="contact-form">
		 @if(Session::has('errors'))
		   <div class="alert alert-warning">
		    @foreach(Session::get('errors')->all() as $error_message)
		     <p>{{ $error_message }}</p>
		    @endforeach
		   </div>
		  @endif

<!-- 			<form method="post">
				<input type="text" name="name" placeholder="Your full name">
				<input type="email" name="email" placeholder="Email address">
				<textarea rows="7" name="msg" placeholder="Your message"></textarea>
				<button type="submit">Send</button>
			</form> -->
			<form action="{{route('post-contact')}}"
			      method="POST">
			    <input type="text" placeholder="Your full name" name="name">
			    <input type="email" placeholder="Email address" name="email">
			    <textarea rows="7" name="msg" placeholder="Your message"></textarea>
			    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<button type="submit">Send</button>
			</form>
		</div>
		<h2>Alternative</h2>
		<p style="text-align: center;">If email is not your thing you always can reach me on social media.</p>
	</div>
</section>
@stop