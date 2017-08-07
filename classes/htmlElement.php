<?php

/**
 * Created by PhpStorm.
 * User: formation
 * Date: 07/08/2017
 * Time: 14:45
 */
class HtmlElement
{
    /**
     * @var string
     */
    private $tagName;

    /**
     * @var bool
     */
    private $autoClosed = false;

    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @var string
     */
    private $textContent = '';

    /**
     * htmlElement constructor.
     * @param string $tagName
     * @param bool $autoClosed
     * @param array $attributes
     * @param string $textContent
     */
    public function __construct($tagName, array $attributes = [], $textContent = '', $autoClosed = false)
    {
        $this->tagName = $tagName;
        $this->autoClosed = $autoClosed;
        $this->attributes = $attributes;
        $this->textContent = $textContent;
    }

    /**
     * @return string
     */
    public function getHtml():string {
        // Ouverture de la balise
        $html = "<{$this->tagName} {$this->getAttributesList()}>";

        if (!$this->isAutoClosed()) {
            // texte entre les balises d'ouverture et de fermeture
            $html .= $this->textContent;

            // Fermeture de la balise
            $html .= "</{$this->tagName}>";
        }

        return $html;
    }

    function __toString()
    {
        return $this->getHtml();

    }

    /**
     * @return string
     */
    private function getAttributesList():string {
        $list = '';

        foreach ($this->attributes as $attribute=>$value) {
            if ($value == '' || $value == $attribute) {
                $list .= "$attribute ";
            } else {
                $list .= "{$attribute}=\"{$value}\" ";
            }
        }

        return $list;
    }

    /**
     * @return string
     */
    public function getTagName(): string
    {
        return $this->tagName;
    }

    /**
     * @param string $tagName
     * @return htmlElement
     */
    public function setTagName(string $tagName): htmlElement
    {
        $this->tagName = $tagName;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAutoClosed(): bool
    {
        return $this->autoClosed;
    }

    /**
     * @param boolean $autoClosed
     * @return htmlElement
     */
    public function setAutoClosed(bool $autoClosed): htmlElement
    {
        $this->autoClosed = $autoClosed;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return htmlElement
     */
    public function setAttributes(array $attributes): htmlElement
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextContent(): string
    {
        return $this->textContent;
    }

    /**
     * @param string $textContent
     * @return htmlElement
     */
    public function setTextContent(string $textContent): htmlElement
    {
        $this->textContent = $textContent;
        return $this;
    }


}