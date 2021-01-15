<?php

namespace Tests\Unit;

use App\Http\Models\ShipOrder;
use Tests\TestCase;

class ShipOrderTest extends TestCase
{
    protected static $shipOrder;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCreateAndSave()
    {
        $shipOrder = new ShipOrder([
            "orderid"     => '1',
            "orderperson" => 1,
        ]);

        $shipOrder->save();
        self::$shipOrder = $shipOrder;

        $this->assertDatabaseHas('ship_order',['id'=>self::$shipOrder->id]);
    }

    public function testFindAll()
    {
        $shipOrder = ShipOrder::all();
        $this->assertContainsOnlyInstancesOf(ShipOrder::class, $shipOrder);
    }

    public function testUpdateAndSave()
    {
        $ship = new ShipOrder([
            'orderid'       => '1',
            'orderperson'   => '1'
        ]);

        $newPerson = '2';
        $ship->orderperson = $newPerson;

        $ship->update();
        self::$shipOrder = $ship;

        $this->assertEquals($newPerson,self::$shipOrder->orderperson);
    }

    public function testFindOne()
    {
        $ship = new ShipOrder([
            'orderid' => '1',
        ]);

        $result = ShipOrder::all()->where('orderid','=',$ship->orderid)->first();
        $this->assertEquals($result->orderid, $ship->orderid);
    }


}
