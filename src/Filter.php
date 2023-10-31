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
		$lead = preg_match('#^\s+|\t+#', $markdown, $matches);

		if ($lead) {
			$markdown = preg_replace(sprintf('#^%s#m', $matches[0]), '', $markdown);
		}

		return $this->parser->parse($markdown);
	}
}
