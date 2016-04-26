<!-- bits for <head> -->
<title>Blooddivision || official gaming community</title>
<meta charset="utf-8">
@if(app()->environment() == 'staging')<meta name="robots" content="noindex, nofollow">@endif
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
@if(app()->environment() != 'local')<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700italic,700,300,800' rel='stylesheet' type='text/css'>@endif
<link href="{{ elixir('css/all.css') }}" rel="stylesheet">

<!-- this is not a comment -->
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

<!-- define default js variables -->
<script type="text/javascript">
	
<?php 

	auth()->user()->name;
	auth()->user()->email;
	auth()->user()->active;

	$default_js_variables = [
		'url' 				=> Config::get('app.url'),
		'current_url' 		=> $request->url(),
		'token' 			=> csrf_token(),
		'environment'		=> app()->environment(),
		'locale' => LaravelGettext::getLocale(),
		'lang' => LaravelGettext::getLocaleLanguage(),
		'api' => LaravelLocalization::getLocalizedURL(null, route('api')) . '/',
	];





?>


</script>