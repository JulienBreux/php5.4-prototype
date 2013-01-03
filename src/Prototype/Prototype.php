<?php

namespace Prototype;

trait Prototype
{
	/** @var array Properties */
	protected $properties = [];

	/** @var array Methods */
	protected static $methods = [];

	/**
	* Get property
	*
	* @param string $name Property name
	* @return mixed
	*/
	public function &__get($name)
	{
		if(array_key_exists($name, $this->properties))
		{
			return $this->properties[$name];
		}

		return null;
	}

	/**
	* Set property
	*
	* @param string $name Property or method name
	* @param mixed $value Property or method value
	*/
	public function __set($name, $value)
	{
		// Set as method
		if($value instanceof \Closure)
		{
			if(!array_key_exists(__CLASS__, self::$methods))
			{
				self::$methods[__CLASS__] = [];
			}

			self::$methods[__CLASS__][$name] = $value;
		}
		// Set as property
		else
		{
			$this->properties[$name] = $value;
		}
	}

	/**
	* Call method
	*
	* @param string $name Method name
	* @param array $arguments Method arguments
	* @return mixed
	*/
	public function __call($name, $arguments = [])
	{
		if(array_key_exists(__CLASS__, self::$methods))
		{
			$methods = self::$methods[__CLASS__];

			if(array_key_exists($name, $methods))
			{
				$method = $methods[$name];

				if($method instanceof \Closure)
				{
					$method = $method->bindTo($this);
				}

				return call_user_func_array($method, $arguments);
			}
		}
	}
}
