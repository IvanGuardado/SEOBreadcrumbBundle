<?php
namespace Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\Template;

class Plain extends Template
{
    protected function getTemplate()
    {
        return '<a href="%s">%s</a>';
    }
}
