<?php

namespace Andali\Rovalidator\Tests;

class CifTests extends TestCase
{
    /** @test */
    public function it_has_a_cif_rule_and_verify_valid_cif()
    {
        $rules = [
            'company_cif' => 'cif',
        ];

        $data = [
            'company_cif' => '38744563',
        ];

        $v = $this->app['validator']->make($data, $rules);
        $this->assertTrue($v->passes());
    }

    /** @test */
    public function it_has_message_for_invalid_cif()
    {
        $rules = [
            'company_cif' => 'cif',
        ];

        $data = [
            'company_cif' => '1234562',
        ];

        $validate = $this->app['validator']->make($data, $rules);
        $this->assertFalse($validate->passes());
        $errors = collect($validate->messages()->first('company_cif'));
        $this->assertTrue(
            $errors->contains('CIF-ul introdus nu este corect!')
        );
    }

    /** @test */
    public function it_check_all_rules()
    {
        $rules = ['company_cif' => 'cif'];

        $data2 = ['company_cif' => '1234567'];
        $data3 = ['company_cif' => '12345678901'];
        $data4 = ['company_cif' => '1234'];
        $data5 = ['company_cif' => '38695416'];

        $v = $this->app['validator']->make($data2, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data3, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data4, $rules);
        $this->assertFalse($v->passes());

        $v = $this->app['validator']->make($data5, $rules);
        $this->assertFalse($v->passes());
    }
}
