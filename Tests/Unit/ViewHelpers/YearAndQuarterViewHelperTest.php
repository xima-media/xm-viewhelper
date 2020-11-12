<?php

namespace Xima\XmViewhelper\Tests\Unit\ViewHelpers;

use TYPO3Fluid\Fluid\Tests\Unit\ViewHelpers\ViewHelperBaseTestcase;
use Xima\XmViewhelper\ViewHelpers\YearAndQuarterViewHelper;

/**
 * Class YearAndQuarterViewHelperTest
 *
 */
class YearAndQuarterViewHelperTest extends \Nimut\TestingFramework\TestCase\ViewHelperBaseTestcase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $viewHelper;

    public function setUp(): void
    {
        parent::setUp();
        $this->viewHelper = $this->getMockBuilder(YearAndQuarterViewHelper::class)->setMethods(['renderChildren'])->getMock();
    }

    /**
     * @test
     */
    protected function renderReturnsString()
    {
        $expected = '';

        self::assertSame(
            $expected,
            $this->viewHelper->method('render')
        );
    }


}
