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
	- news-panel-class		: class of the panel div
	- news-panel-heading-class 	: class of the panel-heading div
	- news-panel-title-class 	: class of panel title h3
	- news-panel-body-class 	: class of the panel body div
	- news-comment-class 		: class of the panel comment div
	- news-post-class		: class of the panel post div
