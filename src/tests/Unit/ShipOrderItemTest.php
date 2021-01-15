<?php

namespace Tests\Unit;

use App\Http\Models\ShipOrderItem;
use Tests\TestCase;

class ShipOrderItemTest extends TestCase
{
    protected static $shipOrderItem;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testCreateAndSave()
    {
        $shipOrderItem = new ShipOrderItem([
            "title"         => 't1',
            "note"          => 'n1',
            "quantity"      => 1,
            "price"         => 2.22,
            "shiporderid"   => 1,
        ]);

        $shipOrderItem->save();
        self::$shipOrderItem = $shipOrderItem;

        $this->assertDatabaseHas('ship_order_to',['id'=>self::$shipOrderItem->id]);
    }

    public function testFindAll()
    {
        $shipOrderItem = ShipOrderItem::all();
        $this->assertContainsOnlyInstancesOf(ShipOrderItem::class, $shipOrderItem);
    }

    public function testUpdateAndSave()
    {
        $shipOrderItem = new ShipOrderItem([
            "title"         => 't1',
            "note"          => 'n1',
            "quantity"      => 'q1',
            "prioce"        => 'p1',
            "shiporderid"   => 1,
        ]);

        $newTitle = 't1';
        $shipOrderItem->address = $newTitle;

        $shipOrderItem->update();
        self::$shipOrderItem = $shipOrderItem;

        $this->assertEquals($newTitle,self::$shipOrderItem->address);
    }

    public function testFindOne()
    {
        $shipOrderItem = new ShipOrderItem([
            'shiporderid' => '1',
        ]);

        $result = ShipOrderItem::all()->where('shiporderid','=',$shipOrderItem->shiporderid)->first();
        $this->assertEquals($result->shiporderid, $shipOrderItem->shiporderid);
    }


}
