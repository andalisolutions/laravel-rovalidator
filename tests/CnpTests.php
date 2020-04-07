<?php

namespace Andali\Rovalidator\Tests;

class CnpTests extends TestCase
{
    /** @test */
    public function it_has_a_cnp_rule_and_verify_valid_cnp()
    {
        $rules = [
            'customer_cnp' => 'cnp',
        ];

        $data = [
            'customer_cnp' => '1881119030031',
        ];

        $v = $this->app['validator']->make($data, $rules);
        $this->assertTrue($v->passes());
    }

    /** @test */
    public function it_has_message_for_invalid_cnp()
    {
        $rules = [
            'customer_cnp' => 'cnp',
        ];

        $data = [
            'customer_cnp' => '1881119030030',
        ];

        $validate = $this->app['validator']->make($data, $rules);
        $this->assertFalse($validate->passes());
        $errors = collect($validate->messages()->first('customer_cnp'));
        $this->assertTrue(
            $errors->contains('Cnp-ul introdus nu este corect!')
        );
    }

    /** @test */
    public function it_return_false_if_cnp_has_13_chars_and_contains_letters()
    {
        $rules = [
            'customer_cnp' => 'cnp',
        ];

        $data = [
            'customer_cnp' => '123456789012a',
        ];

        $v = $this->app['validator']->make($data, $rules);

        $this->assertFalse($v->passes());
    }

    /** @test */
    public function it_shorten_than_13_chars()
    {
        $rules = [
            'customer_cnp' => 'cnp',
        ];

        $data = [
            'customer_cnp' => '1234',
        ];

        $v = $this->app['validator']->make($data, $rules);

        $this->assertFalse($v->passes());
    }

    /** @test */
    public function it_check_all_rules()
    {
        $rules = ['customer_cnp' => 'cnp'];

        $data01 = ['customer_cnp' => '2880231030031'];
        $data1 = ['customer_cnp' => '2881133030031'];
        $data2 = ['customer_cnp' => '2881119030030'];
        $data3 = ['customer_cnp' => '3881119030030'];
        $data4 = ['customer_cnp' => '4881119030030'];
        $data5 = ['customer_cnp' => '5881119030030'];
        $data6 = ['customer_cnp' => '6881119030030'];
        $data7 = ['customer_cnp' => '7881119030031'];
        $data8 = ['customer_cnp' => '8881119030030'];
        $data9 = ['customer_cnp' => '9881119030030'];
        $data0 = ['customer_cnp' => '0881119030030'];

        $v = $this->app['validator']->make($data01, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data1, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data2, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data3, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data4, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data5, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data6, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data7, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data8, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data9, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data0, $rules);
        $this->assertFalse($v->passes());
    }
}
