<?php
namespace Gen;

class RoadmapHeap extends \SplMinHeap
{
    protected function compare($value1, $value2)
    {
        if ($value1->distance() < $value2->distance()) {
            return 1;
        } else {
            return -1;
        }
    }

    public function at($pos)
    {
        $data = clone($this);
        for ($i=0; $i<$pos; $i++) {
            $data->next();
        }

        return $data->current();
    }
}
