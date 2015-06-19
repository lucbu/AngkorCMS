# **AngkorCMS**

## Angkor
Angkor, in Cambodia’s northern province of Siem Reap, is one of the most important archaeological sites of Southeast Asia. It extends over approximately 400 square kilometres and consists of scores of temples, hydraulic structures (basins, dykes, reservoirs, canals) as well as communication routes. For several centuries Angkor, was the centre of the Khmer Kingdom. With impressive monuments, several different ancient urban plans and large water reservoirs, the site is a unique concentration of features testifying to an exceptional civilization. Temples such as Angkor Wat, the Bayon, Preah Khan and Ta Prohm, exemplars of Khmer architecture, are closely linked to their geographical context as well as being imbued with symbolic significance. The architecture and layout of the successive capitals bear witness to a high level of social order and ranking within the Khmer Empire. Angkor is therefore a major site exemplifying cultural, religious and symbolic values, as well as containing high architectural, archaeological and artistic significance.
The park is inhabited, and many villages, some of whom the ancestors are dating back to the Angkor period are scattered throughout the park. The population practices agriculture and more specifically rice cultivation.

http://whc.unesco.org/en/list/668


## About **AngkorCMS**
A content management system (**CMS** is a computer application that allows publishing, editing and modifying content, organizing, deleting as well as maintenance from a central interface. Such systems of content management provide procedures to manage workflow in a collaborative environment. These procedures can be manual steps or an automated cascade. CMSs have been available since the late 1990s.
CMSs are often used to run websites containing blogs, news, and shopping. Many corporate and marketing websites use CMSs. CMSs typically aim to avoid the need for hand coding, but may support it for specific elements or entire pages.

http://en.wikipedia.org/wiki/Content_management_system


**AngkorCMS** is a **CMS** build with the framework **Laravel** 5.
**Laravel** is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. **Laravel** attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.
**Laravel** is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

http://www.laravel.com

## What does **AngkorCMS** do?
**AngkorCMS** can manage:
+ Multi languages
+ Templates and themes
+ Users management
+ Medias
+ Plugins (Interactive Maps, Slideshow, Text Content…) (Open to development)

## Requirement

You should install an PHP server (like [XAMPP](https://www.apachefriends.org/faq_windows.html)) and [Composer](https://getcomposer.org/doc/00-intro.md#installation-windows).

The Laravel framework has a few system requirements:
+ PHP >= 5.4
+ Mcrypt PHP Extension
+ OpenSSL PHP Extension
+ Mbstring PHP Extension
+ Tokenizer PHP Extension


##Installation

Install the packages with composer :
```
composer install
```

The .env file:
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=SomeRandomString

DB_HOST=localhost 		(1)
DB_DATABASE=homestead 	(2)
DB_USERNAME=homestead	(3)
DB_PASSWORD=secret		(4)

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io				(5)
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
```

All the information needed to configure **AngkorCMS**.

1. The link to the database
2. Name of the database
3. Username to access the database
4. Password to access the database
5. Info to access mail functionality

Then when the connection to database is operational you can install the tables and seed them by using this command:
```
php artisan AngkorCMS:install
```
