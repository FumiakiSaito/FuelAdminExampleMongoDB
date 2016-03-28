<?php
/**
 * @group Controller
 */
class Test_Controller_Admin extends TestCase
{
    public function test_foo()
    {
        $num = 1; // OK
        //$num = 2; // NG
        $this->assertEquals(1, $num);

        $data = null;
        $this->assertNull($data);

        //$count = 1; // NG
        $count = 2; // OK
        $this->assertGreaterThan(1, $count);

        $count = -1; // OK
        //$count = 2; // NG
        $this->assertLessThan(1, $count);

        $is_status = true;
        //$is_status = false;
        $this->assertTrue($is_status);

        //$is_status = true; // NG
        $is_status = false; // OK
        $this->assertFalse($is_status);

        $data = array();       // OK
        //$data = array("hoge"); // NG
        $this->assertEmpty($data);
    }
}