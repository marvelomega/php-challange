<?php

namespace Tests\Unit;

use App\Http\Models\ShipOrderTo;
use Tests\TestCase;

class ShipOrderToTest extends TestCase
{
    protected static $shipOrderTo;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCreateAndSave()
    {
        $shipOrderTo = new ShipOrderTo([
            "name"          => 'n1',
            "address"       => 'd1',
            "city"          => 'c1',
            "country"       => 'ct1',
            "shiporderid"   => 1,
        ]);

        $shipOrderTo->save();
        self::$shipOrderTo = $shipOrderTo;

        $this->assertDatabaseHas('ship_order_to',['id'=>self::$shipOrderTo->id]);
    }

    public function testFindAll()
    {
        $shipOrderTo = ShipOrderTo::all();
        $this->assertContainsOnlyInstancesOf(ShipOrderTo::class, $shipOrderTo);
    }

    public function testUpdateAndSave()
    {
        $ship = new ShipOrderTo([
            "name"          => 'n11',
            "address"       => 'd12',
        ]);

        $newAddress = 'd123';
        $ship->address = $newAddress;

        $ship->update();
        self::$shipOrderTo = $ship;

        $this->assertEquals($newAddress,self::$shipOrderTo->address);
    }

    public function testFindOne()
    {
        $shipOrderTo = new ShipOrderTo([
            'shiporderid' => '1',
        ]);

        $result = ShipOrderTo::all()->where('shiporderid','=',$shipOrderTo->shiporderid)->first();
        $this->assertEquals($result->shiporderid, $shipOrderTo->shiporderid);
    }


}
