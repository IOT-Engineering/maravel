<?php

namespace App\Maravel\Blocks;

class BlockItem
{
	/**
	 * The module name that implements the block.
	 *
	 * @var string
	 */
	protected $module;
	protected $name;
	protected $description;
	
	
	/**
	 * The controller that implements the block.
	 *
	 * @var string
	 */
	protected $controller;
	
	/**
	 * The function name that implements the block.
	 *
	 * @var string
	 */
	protected $fn;
	

	/**
	 * The constructor.
	 *
	 * @param string $moduleName
	 * @param string $controllerName
	 * @param string $fnName
	 */
	public function __construct($controller, $fnName, $name = null, $description = null)
	{
		$paths 				= explode('\\',$controller);

		$moduleName = "Maravel";


		if($paths[0] == 'Modules')
		{
			$moduleName = $paths[1];
		}
		
		$this->module 		= $moduleName;
		$this->name 		= $name;
		$this->description  = $description;
		
		$this->controller 	= $controller;
		$this->fn			= $fnName;
	}

	public function getModuleName()
	{
		return $this->module;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function getControllerName()
	{
		return $this->controller;
	}

	public function getFunctionName()
	{
		return $this->fn;
	}

	public function render()
	{

		$controllerRoute 	= $this->controller;
		$fnName 			= $this->fn;

		return htmlspecialchars_decode($controllerRoute::$fnName());
	}

}