<?php

// Liskov substitution principle

// This example doesn't follow the LSP
class Project
{
    public function create()
    {
        echo "Creating project... <br>";
    }

    public function send()
    {
        echo "Sending project... <br>";
    }
}

class SalesProject extends Project
{
    // here we add a new methods
}

class InternalProject extends Project
{
    public function send()
    {
        throw new Exception("Internal projects cannot be sent");
    }
}

function send(Project $project)
{
    $project->send();
}

send(new Project());
send(new SalesProject());
// send(new InternalProject());
echo "-------------------------------------------------<br>";

// Correct implementation ----------------------------------------------

interface ISendProject
{
    public function send();
}

interface ISendMail
{
    public function send();
}

class SendMail implements ISendMail
{
    public function send()
    {
        echo "Sending email... <br>";
    }
}

class Project2
{
    public function create()
    {
        echo "Creating project... <br>";
    }
}

class SalesProject2 extends Project2 implements ISendProject
{
    private ISendMail $sender;

    public function __construct(ISendMail $sender)
    {
        $this->sender = $sender;
    }

    // here we add a new methods
    public function send()
    {
        echo "Sending project... <br>";
        $this->sender->send();
    }
}

class InternalProject2 extends Project2
{
    // here we add a new methods
}

function send2(ISendProject $project)
{
    $project->send();
}

$sendMail = new SendMail();
send2(new SalesProject2($sendMail));
