<?php
namespace Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\FormatterInterface;

class RDF extends Template
{      
    protected function getTemplate()
    {
        return '<span typeof="v:Breadcrumb">
    <a href="%s" rel="v:url" property="v:title">%s</a>
</span>';
    }
}

