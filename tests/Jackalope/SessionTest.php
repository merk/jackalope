<?php

namespace Jackalope;

class SessionTest extends TestCase
{
    public function testConstructor()
    {
        $factory = new \Jackalope\Factory;
        $repository = $this->getMock('Jackalope\Repository', array(), array($factory), '', false);
        $workspaceName = 'asdfads';
        $userID = 'abcd';
        $cred = new \PHPCR\SimpleCredentials($userID, 'xxxx');
        $cred->setAttribute('test', 'toast');
        $cred->setAttribute('other', 'value');
        $transport = new Transport\Davex\Client($factory, 'http://example.com');
        $s = new Session($factory, $repository, $workspaceName, $cred, $transport);
        $this->assertSame($repository, $s->getRepository());
        $this->assertSame($userID, $s->getUserID());
        $this->assertSame(array('test', 'other'), $s->getAttributeNames());
        $this->assertSame('toast', $s->getAttribute('test'));
        $this->assertSame('value', $s->getAttribute('other'));
    }

    public function testLogout()
    {
        $this->markTestSkipped();
        //TODO: test flush object manager with the help of mock objects
    }
}
