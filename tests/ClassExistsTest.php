<?php

function declare_bar_class()
{
    class Bar {};
}

class ClassExistsTest extends \PHPUnit\Framework\TestCase
{
    public static function setUpBeforeClass()
    {
        spl_autoload_register('declare_bar_class');
    }

    public static function tearDownAfterClass()
    {
        spl_autoload_unregister('declare_bar_class');
    }

    public function testWrapper()
    {
        $this->assertTrue(PHP\class_exists('stdClass'));
        $this->assertFalse(PHP\class_exists('Bar', false));
        $this->assertTrue(PHP\class_exists('Bar', true));
    }
}
