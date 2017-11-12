<?php

namespace Sokil\IsoCodes\Databases;

use Sokil\IsoCodes\IsoCodesFactory;
use Sokil\IsoCodes\Database\Scripts\Script;

class ScriptsTest extends \PHPUnit_Framework_TestCase
{
    public function testIterator()
    {
        $isoCodes = new IsoCodesFactory();

        $scripts = $isoCodes->getScripts();

        foreach ($scripts as $script) {
            $this->assertInstanceOf(
                Script::class,
                $script
            );
        }
    }

    public function testGetByAlpha4()
    {
        $isoCodes = new IsoCodesFactory();

        $scripts = $isoCodes->getScripts();
        $script = $scripts->getByAlpha4('Aghb');

        $this->assertInstanceOf(
            Script::class,
            $script
        );

        $this->assertEquals(
            'Caucasian Albanian',
            $script->getName()
        );

        $this->assertEquals(
            'кавказька албанська',
            $script->getLocalName()
        );

        $this->assertSame(
            'Aghb',
            $script->getAlpha4()
        );

        $this->assertSame(
            239,
            $script->getNumericCode()
        );
    }
        
    public function testGetByNumericCode()
    {
        $isoCodes = new IsoCodesFactory();

        $scripts = $isoCodes->getScripts();
        $script = $scripts->getByNumericCode('239');

        $this->assertInstanceOf(
            Script::class,
            $script
        );

        $this->assertEquals(
            'Caucasian Albanian',
            $script->getName()
        );

        $this->assertEquals(
            'кавказька албанська',
            $script->getLocalName()
        );
    }
}