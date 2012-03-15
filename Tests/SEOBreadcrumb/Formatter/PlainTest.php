<?php
namespace Cokidoo\SEOBreadcrumbBundle\Tests\SEOBreadcrumb\Formatter;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\Plain;

class PlainTest extends \PHPUnit_Framework_TestCase
{
    public function testStep()
    {
        $formatter = new Plain();
        $html = $formatter->format('foo', '/foo');
        
        $this->assertEquals('<a href="/foo">foo</a>', $html);

    }
    
    public function testFinalStep()
    {
        $formatter = new Plain();
        $html = $formatter->format('foo', null);
        
        $this->assertEquals('<span>foo</span>', $html);
    }
}
