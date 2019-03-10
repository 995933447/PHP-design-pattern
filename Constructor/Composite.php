<?php

interface RenderableInterface
{
    public function render(): string;
}

class Form implements RenderableInterface
{
    private $elments = [];

    public function addElements(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }

    public function render(): string
    {
        $output = '<form>';
        foreach ($this->elements as $element) {
            $output .= $element->render();
        }
        return $output .=  '</form>';
    }
}

class Input implements RenderableInterface
{
    public function render(): string 
    {
        return '<input type="text"/>';
    }
}

class Text implements renderableInterface
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return $this->text;
    }
}

$input = new Input();
$text = new Text('username:');
$form = new Form();
$form->addElements($text);
$form->addElements($input);

$text = new Text('password:');
$input = new Input();
$embed = new Form();
$embed->addElements($text);
$embed->addElements($input);
$form->addElements($embed);

print $form->render();