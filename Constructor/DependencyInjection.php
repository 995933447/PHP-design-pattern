<?php 
interface RenderableInterface
{
    public function render(): string;
}

class WebRenderable implements RenderableInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function render(): string
    {
        return $this->data;
    }
}

abstract class RenderDecorator implements RenderableInterface
{
    protected $wrapped;

    public function __construct(RenderableInterface $wrapped)
    {
        $this->wrapped = $wrapped;
    }
}

class JsonDecorator extends RenderDecorator
{
    public function render(): string
    {
        return json_encode($this->wrapped->render());
    }
}

print (new JsonDecorator(new WebRenderable('hello world')))->render();