<?php

//  A class should have one, and only one, reason to change.
// A class should have it's own responsiblity
// A class should have only one job

// From laracon
// A class/method/function should only be responsibl for one thing
// There is a place for everything and everything is in its place.
// Find one reason to change and take everything else out of the class.
// Very precise names for many small classes > generic names for large classes.


class SalesReporter
{
    protected $repo;

    public function __construct(SalesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function between($startDate, $nedDate, SalesOutputInterface $formater)
    {
        
        // $repo = new SalesRepository();
        // $sales = $repo->between('', '');

        $sales = $this->repo->between('', '');

        // Give me the format like html or json
        return $formater->output($sales);
    } 

    // public function output($sales, SalesOutputInterface $formater)
    // {
    //     return $formater->output($sales);
    // }
}

interface SalesOutputInterface
{
    public function output($sales);
}

class SalesRepository
{
    public function between($startDate, $nedDate)
    {
        // Go to database and give me the sales amount in dolar from sales table

        return 500;
    }
}

class HtmlOutput implements SalesOutputInterface
{
    public function output($sales)
    {
        return "<h1>Html output : $sales</h1>";
    }
}

class JsonOutput implements SalesOutputInterface
{
    public function output($sales)
    {
        return "<h1>Json output : $sales</h1>";
    }
}

echo (new SalesReporter(new SalesRepository()))->between('', '', new HtmlOutput());

//$sales = (new SalesReporter(new SalesRepository()))->between('', '',);

//echo (new SalesReporter(new SalesRepository()))->output($sales, new JsonOutput());