<?php

namespace Tests\Unit;

use App\Http\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{
    protected static $person;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCreateAndSave()
    {
        $person = new Person([
            "personname"  => 'test',
            "personid"    => 100,
        ]);

        $person->save();
        self::$person = $person;

        $this->assertDatabaseHas('person',['id'=>self::$person->id]);
    }

    public function testFindAll()
    {
        $persons = Person::all();
    	$this->assertContainsOnlyInstancesOf(Person::class, $persons);
    }

    public function testUpdateAndSave()
    {
        $person = new Person([
            'personname' => 'name1',
            'personid'   => '4'
        ]);

        $newName = 'Name 1';
        $person->personname = $newName;

        $person->update();
        self::$person = $person;

        $this->assertEquals($newName,self::$person->personname);
    }

    public function testFindOne()
    {
        $person = new Person([
            'personname' => 'name1',
            'personid'   => '2'
        ]);

        $result = Person::all()->where('personid','=',$person->personid)->first();
        $this->assertEquals($result->personid, $person->personid);
    }


}
