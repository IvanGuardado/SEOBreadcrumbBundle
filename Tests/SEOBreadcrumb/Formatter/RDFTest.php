<?php
namespace Cokidoo\SEOBreadcrumbBundle\Tests\SEOBreadcrumb\Formatter;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\RDF;

class RDFTest extends \PHPUnit_Framework_TestCase
{
    public function testStep()
    {
        $formatter = new RDF();
        $html = $formatter->format('foo', '/foo');
        
        $this->assertEquals('<span typeof="v:Breadcrumb">
    <a href="/foo" rel="v:url" property="v:title">foo</a>
</span>', $html);

    }
    
    public function testFinalStep()
    {
        $formatter = new RDF();
        $html = $formatter->format('foo', null);
        
        $this->assertEquals('<span>foo</span>', $html);
    }
}
