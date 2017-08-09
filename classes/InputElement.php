<?php
namespace POO;

class InputElement extends HtmlElement
{
    /**
     * @var string
     */
    private $inputType;

    /**
     * @var string
     */
    private $inputName;

    /**
     * @var string
     */
    private $inputValue;

    /**
     * InputElement constructor.
     * @param string $inputType
     * @param string $inputName
     * @param string $inputValue
     */
    public function __construct($inputType, $inputName, $inputValue = '')
    {
        $this->inputType = $inputType;
        $this->inputName = $inputName;
        $this->inputValue = $inputValue;

        $attributes = [
            'type' => $inputType,
            'name' => $inputName,
            'value' => $inputValue
        ];

        // Appel du constructeur de la classe parente ici HtmlElement
         parent::__construct('input', $attributes, '', true);
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return $this->inputType;
    }

    /**
     * @param string $inputType
     */
    public function setInputType(string $inputType)
    {
        $this->inputType = $inputType;
    }

    /**
     * @return string
     */
    public function getInputName(): string
    {
        return $this->inputName;
    }

    /**
     * @param string $inputName
     */
    public function setInputName(string $inputName)
    {
        $this->inputName = $inputName;
    }

    /**
     * @return string
     */
    public function getInputValue(): string
    {
        return $this->inputValue;
    }

    /**
     * @param string $inputValue
     */
    public function setInputValue(string $inputValue)
    {
        $this->inputValue = $inputValue;
    }


}