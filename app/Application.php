<?php

namespace App;

class Application
{
    protected $basePath;

    /**
     * The container's bindings.
     *
     * @var array[]
     */
    protected $bindings = [];

	public function __construct($basePath = null)
    {
		if ($basePath) {
            $this->setBasePath($basePath);
        }
	}

	public function setBasePath($basePath)
	{
		$this->basePath = rtrim($basePath, '\/');
	}

	public function singleton($concrete = null)
	{
		$this->bind($concrete, true);
	}

    public function bind($concrete = null)
	{
		$this->bindings[$concrete] = compact('concrete');
	}

	public function make($concrete)
	{
		if (isset($this->bindings[$concrete])) {
			return new $this->bindings[$concrete]['concrete'];
		}
	}
}