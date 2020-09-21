<?php
//segregation = বিভাজন
// A client should not be foreced to implement an interface that it doesn't use.

// From Laracon
// No client should be forced to depend on methods it doesn't use
// Or, a client should never depend on anything more than the method it's calling.
// Changing one method in a class shouldn't affect classes that does't depend on it.
// Replace fat interface with many small, specific interfaces.

// interface WorkerInterface
// {
//     public function work();
//     public function sleep();
// }

// class HumanWorker implements WorkerInterface
// {
//     public function work()
//     {
//         return 'Human working';
//     }

//     public function sleep()
//     {
//         return 'Human sleeping';
//     }
// }

// class AndroidWorker implements WorkerInterface
// {
//     public function work()
//     {
//         return 'Android working';
//     }

//     public function sleep()
//     {
//         return null; // violates the interface segregation
//     }
// }

// class Captain
// {
//     public function manage(WorkerInterface $worker)
//     {
//         $worker->work();
//         $worker->sleep();
//     }
// }

// Breakkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk

interface ManagableInterface
{
    public function beManaged();
}

interface WorkableInterface
{
    public function work();
}

interface SleepableInterface
{
    public function sleep();
}

class HumanWorker implements WorkableInterface, SleepableInterface, ManagableInterface
{
    public function work()
    {
        return 'Human working';
    }

    public function sleep()
    {
        return 'Human sleeping';
    }

    public function beManaged()
    {
        $a =  $this->work();
        $b =  $this->sleep();
        return $a . ' ' . $b;
    }
}

class AndroidWorker implements WorkableInterface, ManagableInterface
{
    public function work()
    {
        return 'Android working';
    }

    public function beManaged()
    {
        return $this->work();
    }
}

class Captain
{
    public function manage(ManagableInterface $worker)
    {
        return $worker->beManaged();
    }
}

echo (new Captain())->manage(new HumanWorker());