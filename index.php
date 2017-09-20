<?php
/**
 * Created by PhpStorm.
 * User: pick - pickmanmurimi@gmail.com
 * Date: 7/25/2017
 * Time: 10:40 PM
 *  * OSPosts template
 * we have the routes page being included here.
 * from the routes we basically want to get the body
 * *******the routes gets the controller which will return the page that has conntent for the requested page
 * i do not use simplified urls
 * for the styling i use bootstrap(recomended by Baraza Jones.. you can check his work at IsVipi.org)
 *rout different pages here
 * my router will get the controller and decide which controller file to serve which will load the class
 * the router will then create an instance of that class
 * the action passes will call the needed function
 */
//database login file
require_once ('connection.php');

//sessions controller
require_once ('controllers/sessions_controller.php');

/**
 * important classes need to be included here
 * this are classes that will be made reference to by many files
**/
//class users
require_once ('model/dataMappers/OSP_classes/class.users.php');

//class validate
require_once('model/dataProcessors/class.validate.php');

//class string
require_once ('model/dataProcessors/class.string.php');

// class config
require_once('controllers/errorHandler.php');

//all requests will first pass through this page

if(isset($_GET['controller']) && isset($_GET['action'])){
	$controller = $_GET['controller'];
	$action		= $_GET['action'];
}else{
//	if no action or controller is set, load the signup and login page
	$controller = 'signup';
	$action		= 'index';
}
//connect to the router which will decide what controller to serve
require_once ('routes.php');
?>
