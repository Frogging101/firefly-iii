<?php
/**
 * BudgetControllerTest.php
 * Copyright (C) 2016 thegrumpydictator@gmail.com
 *
 * This software may be modified and distributed under the terms of the
 * Creative Commons Attribution-ShareAlike 4.0 International License.
 *
 * See the LICENSE file for details.
 */

namespace Chart;

use TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-12-10 at 05:51:40.
 */
class BudgetControllerTest extends TestCase
{


    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @covers \FireflyIII\Http\Controllers\Chart\BudgetController::budget
     * @dataProvider dateRangeProvider
     */
    public function testBudget(string $range)
    {
        $this->be($this->user());
        $this->changeDateRange($this->user(), $range);
        $this->call('get', route('chart.budget.budget', [1]));
        $this->assertResponseStatus(200);
    }

    /**
     * @covers \FireflyIII\Http\Controllers\Chart\BudgetController::budgetLimit
     * @dataProvider dateRangeProvider
     */
    public function testBudgetLimit(string $range)
    {
        $this->be($this->user());
        $this->changeDateRange($this->user(), $range);
        $this->call('get', route('chart.budget.budget', [1,1]));
        $this->assertResponseStatus(200);
    }

    /**
     * @covers \FireflyIII\Http\Controllers\Chart\BudgetController::frontpage
     * @dataProvider dateRangeProvider
     */
    public function testFrontpage(string $range)
    {
        $this->be($this->user());
        $this->changeDateRange($this->user(), $range);
        $this->call('get', route('chart.budget.frontpage'));
        $this->assertResponseStatus(200);
    }

    /**
     * @covers \FireflyIII\Http\Controllers\Chart\BudgetController::period
     */
    public function testPeriod()
    {
        $this->be($this->user());
        $this->call('get', route('chart.budget.period', [1,'1','20120101','20120131']));
        $this->assertResponseStatus(200);
    }

    /**
     * @covers \FireflyIII\Http\Controllers\Chart\BudgetController::periodNoBudget
     */
    public function testPeriodNoBudget()
    {
        $this->be($this->user());
        $this->call('get', route('chart.budget.period.no-budget', ['1','20120101','20120131']));
        $this->assertResponseStatus(200);
    }
}
