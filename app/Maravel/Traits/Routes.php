<?php
/**
 * Created by PhpStorm.
 * User: dacalin
 * Date: 13/6/18
 * Time: 15:02
 */

namespace App\Maravel\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

trait Routes
{
	function getAdminRoutes()
	{
		$router 	= Route::getFacadeRoot()->getRoutes()->getRoutes();
		
		$routeList = [];

		foreach ($router AS $item)
		{
			$uriItems = explode('/',$item->uri);

			if($uriItems[0] == "admin")
			{
				if(count($uriItems) > 1)
				{
					foreach ($item->methods AS $method)
					{
						$vendor = $uriItems[1];
						
						if(array_key_exists($vendor, $routeList))
						{
							array_push($routeList[$vendor], ['uri' =>$item->uri, 'method' =>$method]);
						}
						else
						{
							$routeList[$vendor] = [];
							array_push($routeList[$vendor], ['uri' =>$item->uri, 'method' =>$method]);
						}
					}
		
				}
			}
		}

		return $routeList;
	}
	
	public function getPermissionsList()
	{
		$routeList = $this->getAdminRoutes();
		
		$permisionList = [];
		
		foreach ($routeList AS $moduleName)
		{
			foreach ($moduleName AS $route)
			{
				$uri = preg_replace_callback
				(
					'/\{.+\}/',
					function(){
						return '*';
					},
					$route['uri']
				);
				
				array_push($permisionList,
					['module'=>  $this->getModuleNameFromUri($uri),
					'uri'=> $uri,
					'method'=> $route['method'],
					'allow'=>false]);
			}
		}
		
		return $permisionList;
	}

	function getModuleNameFromUri($uri)
	{
		$path = explode('/', $uri);
		
		$moduleName = 'Maravel';
		
		if(count($path) >= 3) //admin + ModuleName(developer/copany + moduleName) + page
		{
			if($path[0] == 'admin' )
			{
				if($path[1] != 'users' && $path[1] != 'password' && $path[1] != 'roles')
				{
					$moduleName = ucfirst(camel_case($path[1])).'\\'.$path[2];
				}
			}
		}
		
		return $moduleName;
	}
}