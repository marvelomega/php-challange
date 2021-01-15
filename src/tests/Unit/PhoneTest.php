<?php

namespace Tests\Unit;

use App\Http\Models\Person;
use App\Http\Models\Phone;
use Tests\TestCase;

class PhoneTest extends TestCase
{
    protected static $phone;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCreateAndSave()
    {
        $phone = new Phone([
            "phone"     => 'test',
            "person_id" => 1,
        ]);

        $phone->save();
        self::$phone = $phone;

        $this->assertDatabaseHas('phone',['id'=>self::$phone->id]);
    }

    public function testFindAll()
    {
        $phone = Phone::all();
        $this->assertContainsOnlyInstancesOf(Phone::class, $phone);
    }

    public function testUpdateAndSave()
    {
        $phone = new Phone([
            'phone' => '1111111',
            'person_id'   => '4'
        ]);

        $newPhone = '71717171';
        $phone->phone = $newPhone;

        $phone->update();
        self::$phone = $phone;

        $this->assertEquals($newPhone,self::$phone->phone);
    }

    public function testFindOne()
    {
        $phone = new Phone([
            'phone' => '7777777',
        ]);

        $result = Phone::all()->where('phone','=',$phone->phone)->first();
        $this->assertEquals($result->phone, $phone->phone);
    }


}
