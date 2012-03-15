<?php
namespace Cokidoo\SEOBreadcrumbBundle\Tests\SEOBreadcrumb\Formatter;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\Microdata;

class MicrodataTest extends \PHPUnit_Framework_TestCase
{
    public function testStep()
    {
        $formatter = new Microdata();
        $html = $formatter->format('foo', '/foo');
        
        $this->assertEquals(
'<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
  <a href="/foo" itemprop="url">
    <span itemprop="title">foo</span>
  </a>
</div>', $html);

    }
    
    public function testFinalStep()
    {
        $formatter = new Microdata();
        $html = $formatter->format('foo', null);
        
        $this->assertEquals('<span>foo</span>', $html);
    }
}
