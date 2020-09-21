<?php

// IOC inversion of contro
// Depend on abstractions not on concretions
// High level modules should not depends on low lavel modules
// All of this is about decoupling code
// High level code isn't as concerned with details
// Low level code is more concerned aith details & specifics

// High-level classes shouldn’t depend on low-level classes. Both should depend on abstractions. Abstractions
// shouldn’t depend on details. Details should depend on abstractions.

// Low-level classes implement basic operations such as working
//with a disk, transferring data over a network, connecting to a database, etc.
// High-level classes contain complex business logic that directs low-level classes to do something.

// From laracon
// High level modules should not depend on low-level modules. Both should depend on abstraction
// Never depend on anything concrete, only depend on abstraction.
// High level modules should not depend on low-level modules. They should depend on abstractions.
// Able to change an implementation easily without altering(পরিবর্তন) the high level code.

interface ConnectionInterface
{
    public function connect();
}

class Dbconnection implements ConnectionInterface
{
    public function connect()
    {
        //
    }
}

class PasswordReminder
{
    protected $dbConnection;

    public function __construct(ConnectionInterface $dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }
}