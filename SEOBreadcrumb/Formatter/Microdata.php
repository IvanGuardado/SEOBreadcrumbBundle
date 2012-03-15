<?php
namespace Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\Template;

class Microdata extends Template
{
    
    protected function getTemplate()
    {
        return '<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
  <a href="%s" itemprop="url">
    <span itemprop="title">%s</span>
  </a>
</div>';
    }
}


