<!DOCTYPE html>
<html>
<head>
	<title>Miha Vidakovic</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/master.css')}}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/favicon.png" type="image/gif" sizes="128x115">
	<meta name="theme-color" content="#3e5771">
</head>
<body>

<header>
	<div class="container">
		<div class="logo">
			<a href="{{URL::route('home')}}">
				<h1>Miha Vidakovič</h1>
			</a>
		</div>
		<nav>
			<ul>
				<li class="{{{ (Request::is('work') ? 'active' : '') }}}"><a href="{{URL::route('work')}}">Work</a></li>
				<li class="{{{ (Request::is('about') ? 'active' : '') }}}"><a href="{{URL::route('about')}}">About</a></li>
<!-- 				<li class="{{{ (Request::is('blog') ? 'active' : '') }}}"><a href="http://blog.vidakovic.si" target="_blank">Blog</a></li>
 -->				<li class="{{{ (Request::is('contact') ? 'active' : '') }}}"><a href="{{URL::route('contact')}}">Contact</a></li>
			</ul>
			  <section class="material-design-hamburger">
		      <button class="material-design-hamburger__icon">
		        <span class="material-design-hamburger__layer"></span>
		      </button>
		    </section>
			<section class="menu menu--off">
				<ul class="responsive-menu">
					<li class="{{{ (Request::is('work') ? 'active' : '') }}}"><a href="{{URL::route('work')}}">Work</a></li>
					<li class="{{{ (Request::is('about') ? 'active' : '') }}}"><a href="{{URL::route('about')}}">About</a></li>
<!-- 					<li class="{{{ (Request::is('blog') ? 'active' : '') }}}"><a href="blog.html">Blog</a></li>
 -->					<li class="{{{ (Request::is('contact') ? 'active' : '') }}}"><a href="{{URL::route('contact')}}">Contact</a></li>
				</ul>
			</section>
  
</section>

		</nav>
	</div>
</header>

 @yield('content')

<footer>
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
</footer>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('js/lightbox.js')}}"></script>

<script type="text/javascript">materialDesignHamburger();</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47059795-2', 'auto');
  ga('send', 'pageview');

</script>
<!-- Hotjar Tracking Code for http://vidakovic.si -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:151764,hjsv:5};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</body>
</html>