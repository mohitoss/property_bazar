<?PHP

ini_set("display_errors","1");

$route = array();
$route["login-user"] = "Login";


class MyClass
{

	public function Login()
	{
		if(isset($_POST) && count($_POST) > 0)
		{
			require_once("model/model.php");
			$obj1 = new MyModel();
			$result = $obj1->FindUsers();
			$count=count($result);
			for($i=0;$i<$count;$i++)
			{
				if(($result[$i]['user_name']==$_REQUEST['user_name'])&&($result[$i]['password']==$_REQUEST['password'])&&($result[$i]['user_type']==$_REQUEST['user_type']))
				{
					require_once("view/my_view_thanks.php");
					break;
				}
			}
			if($i==$count)
				echo "<br/>Invalid username or Password";
		}
		else
		{
			require_once("view/my_view.php");
		}
	}
}
$request = "";


$uri = explode("/",$_SERVER["PHP_SELF"]);
$request = $route[$uri[count($uri)-1]];


/*if(isset($_REQUEST["method"])){
	$request = $_REQUEST["method"];
	echo $request;
}*/

$obj = new MyClass();

if(!empty($request))
{
	$obj->$request();
}

