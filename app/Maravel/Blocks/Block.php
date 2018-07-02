<?php

namespace App\Maravel\Blocks;

class Block
{

	/**
	 * The function name that implements the block.
	 *
	 * @var array
	 */
	protected $components = [];

	
	public function make($name)
	{
		$newComponent = new BlockComponent($name);
		$this->components[$name] =  $newComponent;
	}
	
	public function has($name)
	{
		return array_key_exists($name, $this->components);
	}
	
	public function get($name)
	{
		$component = null;
		
		if (array_key_exists($name, $this->components))
		{
			$component = $this->components[$name];
		}
		
		return $component;
	}
	public function all()
	{
		return $this->components;
	}


}