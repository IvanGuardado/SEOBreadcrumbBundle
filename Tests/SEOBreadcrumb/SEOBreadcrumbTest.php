<?php
namespace Cokidoo\SEOBreadcrumbBundle\Tests\SEOBreadcrumb;

use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\SEOBreadcrumb;
use Cokidoo\SEOBreadcrumbBundle\SEOBreadcrumb\Formatter\Plain;

class SEOBreadcrumbTest extends \PHPUnit_Framework_TestCase
{
    protected $breadcrumb;
    
    public function setUp()
    {
        $formatter = new Plain();
        $this->breadcrumb = new SEOBreadcrumb($formatter);
    }
    
    public function testAddStep()
    {
        $this->breadcrumb->addStep('foo', '/foo');
        
        $html = $this->breadcrumb->__toString();
        
        $this->assertEquals('<a href="/foo">foo</a> > ', $html);
    }
    
    public function testAddFinal()
    {
        $this->breadcrumb->addFinal('foo');
        
        $html = $this->breadcrumb->__toString();
        
        $this->assertEquals('<span>foo</span>', $html);
    }
    
    public function testAddMultipleSteps()
    {        
        $this->breadcrumb
            ->addStep('foo', '/foo')
            ->addFinal('bar');
        
        $html = $this->breadcrumb->__toString();
        
        $this->assertEquals('<a href="/foo">foo</a> > <span>bar</span>', $html);
    }
    
    public function testSetSeparator()
    {        
        $this->breadcrumb->setStepSeparator(':');
        $this->breadcrumb
            ->addStep('foo', '/foo')
            ->addFinal('bar');
        
        $html = $this->breadcrumb->__toString();
        
        $this->assertEquals('<a href="/foo">foo</a>:<span>bar</span>', $html);
    }
    
}
