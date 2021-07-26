**https://stackoverflow.com/questions/52057380/wordpress-load-css-in-footer**

function prefix\_add\_footer\_styles() {
wp\_enqueue\_style('boostrapcss', get\_template\_directory\_uri() . '/css/bootstrap.css', array(), '4.0.0', 'all');
wp\_enqueue\_style('customstyle', get\_template\_directory\_uri() . '/css/style.css', array(), '1.0.0', 'all');
wp\_enqueue\_style('animatecss', get\_template\_directory\_uri() . '/css/animate.css', array(), '1.0.0', 'all');
};
add\_action( 'get\_footer', 'prefix\_add\_footer\_styles' );

add\_action( 'wp\_enqueue\_scripts', 'broa\_script\_enqueue' ); to add\_action( 'wp\_footer', 'broa\_script\_enqueue' );