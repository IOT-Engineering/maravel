<?php

namespace App\Maravel\Blocks;

use Illuminate\Support\Facades\Log;

class BlockComponent implements \Countable
{
	/**
	 * The block name
	 *
	 * @var array
	 */
	protected $name;

	protected $items = [];


	/**
	 * The constructor.
	 *
	 * @param string name
	 */
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	/**
	 * Add a new BlockItem.
	 *
	 * @param BlockItem newItem
	 */
	public function addItem(BlockItem $newItem)
	{
		array_push($this->items, $newItem);
	}
	
	/**
	 * Create and add a new BlockItem.
	 *
	 * @param string $controller 
	 * @param string $fnName
	 * @param string $itemName
	 */
	public function add($controller, $fnName, $name = null, $description = null)
	{
		Log::info(__CLASS__.__FUNCTION__);

		Log::info($name);

		$blockItem = new BlockItem($controller, $fnName, $name, $description);
		array_push($this->items, $blockItem);
	}
	
	/**
	 * Get a Block Item
	 *
	 * @param string $controller
	 * @param string $fnName
	 * @return BlockItem 
	 */
	public function get($controller, $fnName)
	{
		$block = collect($this->items)->filter(function ($item) use ($controller, $fnName) {
			return $item->getControllerName() == $controller && $item->getFunctionName() == $fnName;
		})->first();
		
		return $block;
	}
	
	/**
	 * Get a Block Item by Name
	 *
	 * @param string $controller
	 * @param string $fnName
	 * @return array
	 */
	public function getByModuleName($name)
	{
		$block = collect($this->items)->filter(function ($item) use ($name) {
			return $item->getModuleName() == $name;
		})->get();
		
		
		return $block;
	}
	/**
	 * Get all Blocks.
	 *
	 * @return array
	 */
	public function all()
	{
		return $this->items;
	}

	/**
	 * Get count from all blocks.
	 *
	 * @return int
	 */
	public function count()
	{
		return count($this->items);
	}

	/**
	 * Empty the current block.
	 */
	public function destroy()
	{
		$this->items = [];
	}
}