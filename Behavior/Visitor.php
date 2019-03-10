<?php 
 abstract class StateVisitor
 {
 	abstract public function getManStat(Person $man);
 	abstract public function getWomanStat(Person $woman);
 }

 abstract class Person 
 {
 	protected $type;

 	abstract public function accept(StateVisitor $visitor);
 }

 class Success extends StateVisitor
 {

     public  function getManAction(Person $elementM)
     {
         echo "{$elementM->type}:成功时，背后多半有一个伟大的女人。<br/>";
     }
  
     public  function getWomanAction(Person $elementW)
     {
         echo "{$elementW->type} :成功时，背后大多有一个不成功的男人。<br/>";
     }

}

 class Fail extends StateVisitor
 {

     public  function getManAction(Person $elementM)
     {
         echo "{$elementM->type}:失败时，背后多半有一个伟大的女人。<br/>";
     }
  
     public  function getWomanAction(Person $elementW)
     {
         echo "{$elementW->type} :失败时，背后大多有一个不成功的男人。<br/>";
     }

}

class Women extends Person 
{
	public function __construct()
	{
		$this->type = '女人';
	}

	public function accept(StateVisitor $visitor)
	{
		$visitor->getWomanAction();
	}
}

class Man extends Person 
{
	public function __construct()
	{
		$this->type = '男人';
	}

	public function accept(StateVisitor $visitor)
	{
		$visitor->getManAction();
	}
}

class ObjStructor
{
	private $elements = [
		new Man,
		new Woman
	];

	public function display(StateVisitor $visitor)
	{
		foreach ($this->elements as $element) {
			$element->accept($visitor);
		}
	}
}