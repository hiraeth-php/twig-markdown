<?php

namespace Hiraeth\Twig\Markdown;

use Hiraeth\Markdown\Parser as Parser;

/**
 * A markdown filter
 */
class Filter
{
	/**
	 * @var Parser
	 */
	protected $parser;


	/**
	 * Create a new instance
	 */
	public function __construct(Parser $parser)
	{
		$this->parser = $parser;
	}


	/**
	 * Execute the filter
	 */
	public function __invoke($markdown)
	{
		return $this->parser->parse($markdown);
	}
}
