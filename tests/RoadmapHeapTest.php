<?php
namespace Gen;

class RoadmapHeapTest extends \PHPUnit_Framework_TestCase
{
    public function testHeap()
    {
        $heap = new RoadmapHeap();
        $heap->insert(new Roadmap([
            new Place("Imperia", new Point(43.889686, 8.039517)),
            new Place("Sanremo", new Point(43.815967, 7.776057)),
            new Place("Ventimiglia", new Point(43.791237, 7.607586)),
        ]));
        $heap->insert(new Roadmap([
            new Place("Sanremo", new Point(43.815967, 7.776057)),
            new Place("Imperia", new Point(43.889686, 8.039517)),
            new Place("Ventimiglia", new Point(43.791237, 7.607586)),
        ]));

        $min = $heap->current();

        $this->assertEquals("Imperia", $min->places[0]->name);
        $this->assertEquals("Sanremo", $min->places[1]->name);
        $this->assertEquals("Ventimiglia", $min->places[2]->name);
    }
}
