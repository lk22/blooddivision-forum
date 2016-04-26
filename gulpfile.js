var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 * bower components object
 * @type object
 */

var bower = {
	javaScript: {
		bootstrap: 'bower_components/bootstrap/dist/js/bootstrap.min.js',
		jquery: 'bower_components/jquery/dist/jquery.min.js',
	},
	css: {
		fa: 'bower_components/font-awesome/css/font-awesome.min.css'
	}
};

var npm = {
	javaScript: {
		react:{
			react: 'node_modules/react/dist/react.min.js',
			addons: 'node_modules/react/dist/react-with-addons.min.js',
			bootstrap: 'node_modules/react-bootstrap/dist/react-bootstrap.min.js',
			react_dom: 'node_modules/react-dom/dist/react-dom.min.js',
			react_dnd_html5: 'node_modules/react-dnd-html5-backend/dist/ReactDnDHTML5Backend.min.js',
			react_redux: 'node_modules/react-redux/dist/react-redux.min.js', 
		},
	}
}

elixir(function(mix) {
	/**
	 * compiling main sass file
	 */
	
   		mix.sass('app.scss');

   	/**
   	 * handling attached javascript and components => react
   	 */

    	mix.browserify('app.js');

    /**
     * copy javascripts
     */
    
    	/**
    	 * jquery framework
    	 */
    
	     	mix.copy(
	    		bower.javaScript.jquery,
	    		'resources/assets/js/vendor/bootstrap.min.js'
	    	);

	    /**
	     * bootstrap framework
	     */
	    
	    	mix.copy(
	    		bower.javaScript.bootstrap,
	    		'resources/assets/js/vendor/bootstrap.min.js'
	    	);

	    /**
	     * react framework
	     */
	    
	    	/**
	    	 * react
	    	 */
	    
		    	mix.copy(
		    		npm.javaScript.react.react,
		    		'resources/assets/js/vendor/react.min.js'
		    	);

		    /**
	    	 * react addons
	    	 */
	    
		    	mix.copy(
		    		npm.javaScript.react.addons,
		    		'resources/assets/js/vendor/react-with-addons.min.js'
		    	);

		    /**
	    	 * react bootstrap
	    	 */
	    
		    	mix.copy(
		    		npm.javaScript.react.bootstrap,
		    		'resources/assets/js/vendor/react-bootstrap.min.js'
		    	);

		    /**
	    	 * react dom
	    	 */
	    
		    	mix.copy(
		    		npm.javaScript.react.react_dom,
		    		'resources/assets/js/vendor/react-dom.min.js'
		    	);

		    /**
		     * ReactDnDHTML5Backend
		     */
		    
		    	mix.copy(
		    		npm.javaScript.react.react_dnd_html5,
		    		'resources/assets/js/vendor/ReactDnDHTML5Backend.min.js'
		    	);

		    /**
		     * react redux
		     */
		    
		    	mix.copy(
		    		npm.javaScript.react.react_redux,
		    		'resources/assets/js/react-redux.min.js'
		    	);


});
