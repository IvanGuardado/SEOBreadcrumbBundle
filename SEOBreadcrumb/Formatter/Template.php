<?php
namespace Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\FormatterInterface;

abstract class Template implements FormatterInterface
{
    public function format($label, $link)
    {
        if($link !== null){
            return sprintf($this->getTemplate(), $link, $label);
        }else{
            return "<span>$label</span>";
        }
    }
    
    abstract protected function getTemplate();
}

