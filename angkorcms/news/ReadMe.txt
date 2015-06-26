######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmsnews:install"

Register the service provider in 'config/app.php' :
		'AngkorCMS\News\AngkorCMSNewsServiceProvider',

Register the module nature in 'config/angkorcmsmodules.php' :
		"news" => "angkorcmsnewsmodule",

######################
#                    #
#        Usage       #
#                    #
######################


Attributes available for news module:
	- news-list-full		: Boolean if each post in the list should be fully written
	- news-panel-class		: div
	- news-panel-heading-class 	: div
	- news-panel-title-class 	: class of h3
	- news-panel-body-class 	: div
	- news-comment-class 		: comment div
	- news-post-class		: div
