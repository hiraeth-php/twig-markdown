<?php

namespace Hiraeth\Twig\Markdown;

use Hiraeth\Markdown\Parser as Parser;
use Aptoma\Twig\Extension\MarkdownEngineInterface as MarkdownEngine;

/**
 *
 */
class Engine implements MarkdownEngine
{
	/**
	 * @var Parser
	 */
	protected $engine;


	/**
	 * Create a new instance
	 */
	public function __construct(Parser $parser)
	{
		$this->engine = $parser;
	}


	/**
	 * {@inheritdoc}
	 */
	public function getName()
	{
		return 'hiraeth/markdown';
	}


	/**
	 * {@inheritdoc}
	 */
	public function transform($content)
	{
		return $this->engine->parse($content ?: '');
	}
}
