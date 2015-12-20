<?php
namespace Gen;

class Life
{
    private $mutator;
    private $recombine;
    private $generation;

    public function __construct(Mutation $mutator, Recombination $recombine)
    {
        $this->mutator = $mutator;
        $this->recombine = $recombine;
        $this->setGeneration(50000);
    }

    public function setGeneration($generation)
    {
        $this->generation = $generation;
    }

    public function getShortestPath(Roadmap $roadmap)
    {
        $life = new RoadmapHeap();
        $life->insert($roadmap);
        $life->insert($this->mutator->mutate($roadmap));

        for ($i=0; $i<$this->generation; $i++) {
            $life->insert($this->mutator->mutate($life->current()));
        }

        return $life->current();
    }
}
