<?php
namespace Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter;

interface FormatterInterface
{
    function format($label, $link);
}
