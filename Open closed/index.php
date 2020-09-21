<?php

// Entities should be open for extension, but closed for modification.
// Change behavior without modifying source code.
// Avoid code rot.
// Separate extensible behavior behind an interface, and flip the dependencies.
// The main idea of this principle is to keep existing code from
// breaking when you implement new features.

// From laracon
// Extend functionality by adding new code insted of changing existing code.
// Separate the behaviors, so the system can easily be extended, but never broken.
// Goal: Get to a point where you can never break the core of your system.

interface PaymentMethodInterface
{
    public function acceptPayment();
}

class Checkout
{
    public function begin(PaymentMethodInterface $payment)
    {
        return $payment->acceptPayment();
    }
}

class CashPayment implements PaymentMethodInterface
{
    public function acceptPayment()
    {
       return 'Payment method is cache';
    }
}

class StripPayment implements PaymentMethodInterface
{
    public function acceptPayment()
    {
       return 'Payment method is strip';
    }
}

echo (new Checkout)->begin(new CashPayment());