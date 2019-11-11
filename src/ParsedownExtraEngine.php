<?php

namespace Hiraeth\Twig;

use Aptoma\Twig\Extension\MarkdownEngineInterface;
use ParsedownExtra;

/**
 * ParsedownExtraEngine.php
 *
 * Maps erusev/parsedown-extra to Aptoma\Twig Markdown Extension
 */
class ParsedownExtraEngine implements MarkdownEngineInterface
{
    /**
     * @var ParsedownExtra
     */
    protected $engine;

    /**
     * @param string|null $instanceName
     */
    public function __construct($instanceName = null)
    {
        $this->engine = ParsedownExtra::instance($instanceName);
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
        return 'erusev/parsedown-extra';
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
