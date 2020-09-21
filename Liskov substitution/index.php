<?php

//Substitutiontion = প্রতিস্থাপন
// Derived(উদ্ভূত) classes must be substitutable(পরিবর্তনযোগ্য) for their base classes.

// Any implementation of an abstraction or an interface should be substitutable anywhere
// that the abstraction is accepted.

// When extending a class, remember that you should be
//able to pass objects of the subclass in place of objects of
//the parent class without breaking the client code.

// This means that the subclass should remain compatible with
// the behavior of the superclass. When overriding a method,
// extend the base behavior rather than replacing it with something else entirely.


// key notes of LSP
// 1. Signature must match
// 2. Precondition can't be greater
// 3. Post conditions at least equal to 
// 4. Exception types must match

// From Laracon
// Any derived class should be able to substitute it's parent class
// without the consumer knowing it.
// Every class that implements an interface, must be able to substitute(বিকল্প) any
// reference throughout the code that implements that same interface.
// Every part of the code should get the expected result no matter what instance of a class
// you send to it, given it implements the same interface. 

class VideoPlayer
{
    public function play($file)
    {
        // play the video   
    }
}

class AviVideoPlayer extends VideoPlayer
{
    public function play($file)
    {
        if (pathinfo($file, PATHINFO_EXTENSION) !== 'avi') {
            throw new Exception; // violates the LSP
        }
    }
}



 interface LessonRepositoryInterface
 {
     public function getAll();
 }

 class FileLessonRepository implements LessonRepositoryInterface
 {
    public function getAll()
    {
        return [];
    }
 }

 class DbLessonRepository implements LessonRepositoryInterface
 {
    public function getAll()
    {
        //return Lesson::all(); // violates the LSP
        return Lesson::all()->toArray();
    }
 }

 function foo(LessonRepositoryInterface $lesson)
 {
     $lessons = $lesson->getAll();

     //if (is_a()) // violates the LSP
     //if (instanceof()) // violates the LSP
 }