<!-- bits for <head> -->
<title>{{ e('BLOODDIVISION || OFFICIAL GAMING COMMUNITY') }}</title>
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
		'user'				=> app()->make('Blooddivision\Tranformers\UserTransformer')->tranform(auth()->user()),
		'environment'		=> app()->environment(),
		'locale' 			=> LaravelGettext::getLocale(),
		'lang' 				=> LaravelGettext::getLocaleLanguage(),
		'api' 				=> LaravelLocalization::getLocalizedURL(null, route('api')) . '/',
	];

	$defaut_js_variables['user']['email'] = Auth::user()->email;
	// $defaut_js_variables['user']['slug'] = Auth::user()->slug;
	 
	$js_variables = array_merge($default_js_variables, (isset($js_variables)) ? $js_variables : []);
	
	echo 'var Blooddivision = ' . json_encode($js_variables) . ';';

?>

/**
 * workaround loading jquery before jquery is loaded
 */

 if( ! window.deferAfterjQueryLoaded ){
 	window.deferAfterjQueryLoaded = [];
 	Object.defineProperty(window, "$", {
 		set: function(value) {
 			window.setTimeout(function() {
 				$.each(window.deferAfterjQueryLoaded, function(index, fn) {
 					fn();
 				});
 			}, 0);
 			Object.defineProperty(window, "$", { value: value });
 		},
 		configurable: true;
 	});
 }

</script>