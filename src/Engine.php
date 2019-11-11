<?php

namespace Hiraeth\Twig\Markdown;

use Aptoma\Twig\Extension\MarkdownEngineInterface as MarkdownEngine;
use Hiraeth\Markdown\ParserInterface as Parser;

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
     * @param string|null $instanceName
     */
    public function __construct(Parser $parser)
    {
        $this->engine = $parser;
    }


    /**
     * {@inheritdoc}
     */
    public function transform($content)
    {
        return $this->engine->parse($content);
    }


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'hiraeth/markdown';
    }


    /**
     * Turn on/off escaping within the generated HTML. Should be
     * turned on for untrusted user input.
     *
     * @param bool $bool Flag to set Safe Mode to
     */
    public function setSafeMode($bool)
    {
        $this->engine->setSafeMode($bool === true);
    }


    /**
     * Turn on/off escaping HTML in trusted user input.
     *
     * @param bool $bool Flag to set markup escaped to
     */
    public function setMarkupEscaped($bool)
    {
        $this->engine->setMarkupEscaped($bool === true);
    }
}
