######################
#                    #
#    INSTALLATION    #
#                    #
######################


In command line, launch in order:
	"php artisan vendor:publish"
	"php artisan angkorcmsusers:install"

Register the service provider in 'config/app.php' :
		'AngkorCMS\Users\AngkorCMSUsersServiceProvider',

Register the module nature in 'config/angkorcmsmodules.php' :
		"login" => "angkorcmslogin",
		"profile" => "angkorcmsprofile",


######################
#                    #
#        Usage       #
#                    #
######################


Attributes available for login module:
	- login-formClass	: The CSS class of the form
	- login-inputClass	: The CSS class of the input fields
	- login-btnLogClass	: The CSS class of the button login
	- login-btnForgotClass	: The CSS class of the button forgot your password


Attributes available for profile module:
	- profile-panelheading-class	: The CSS class of the head of the panel
	- profile-panelbody-class	: The CSS class of the body of the panel
	- profile-panelprimary-class	: The CSS class of the panel
	- profile-table-class		: The CSS class of the table listing the members