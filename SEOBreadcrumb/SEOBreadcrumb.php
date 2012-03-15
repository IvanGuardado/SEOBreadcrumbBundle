<?php
namespace Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\FormatterInterface;

class SEOBreadcrumb implements \Iterator
{
    protected $formatter;
    protected $iteratorPosition = 0;
    protected $steps = array();
    protected $stepSeparator = ' > ';
    
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }
    
    public function addStep($label, $link=null)
    {
        $this->steps[] = array('label'=>$label, 'link'=>$link);
        return $this;
    }
    
    public function addFinal($label)
    {
        $this->addStep($label);   
        return $this;
    }
    
    protected function getItemByIndex($index)
    {
        if($this->stepIndexExists($index)){
            return $this->steps[$index];
        }else{
            throw new \OutOfRangeException("The index '$index' not exists.");
        }
    }
    
    protected function stepIndexExists($index)
    {
        return isset($this->steps[$index]);
    }
    
    public function __toString()
    {
        $html = '';
        foreach($this as $step){
            $html .= $step;
        }
        return $html;
    }
    
    public function setStepSeparator($separator)
    {
        $this->stepSeparator = $separator;
    }
    
    public function current()
    {
        $step = $this->getItemByIndex($this->iteratorPosition);
        $label = $step['label'];
        $link = $step['link'];
        $formatedStep = $this->formatter->format($label, $link);
        return $this->appendStepSeparator($formatedStep, $link);
    }
    
    protected function appendStepSeparator($text, $link)
    {
        if($link !== null){
            return $text .= $this->stepSeparator;
        }
        return $text;
    }
    
    public function key()
    {
        return $this->iteratorPosition;
    }
    
    public function next()
    {
        ++$this->iteratorPosition;
    }
    
    public function rewind()
    {
        $this->iteratorPosition = 0;
    }
    
    public function valid()
    {
        return $this->stepIndexExists($this->iteratorPosition);
    }
    
}
