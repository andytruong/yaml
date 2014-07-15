<?php

namespace AndyTruong\Yaml\TestCases;

use AndyTruong\Yaml\Dumper\PHPExtensionDumper;
use AndyTruong\Yaml\Dumper\SpycDumper;
use AndyTruong\Yaml\Dumper\SymfonyYamlDumper;
use AndyTruong\Yaml\Parser\PHPExtensionParser;
use AndyTruong\Yaml\Parser\SpycParser;
use AndyTruong\Yaml\Parser\SymfomyYamlParser;
use AndyTruong\Yaml\Parser\YamlParserInterface;
use AndyTruong\Yaml\YamlParser;
use PHPUnit_Framework_TestCase;

class YamlTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider sourceParser
     */
    public function testParser(YamlParserInterface $real_parser, $available)
    {
        /* @var $parser YamlParser */
        $parser = $this->getMock('\\AndyTruong\\Yaml\\YamlParser');
        $parser
            ->expects($this->any())
            ->method('getRealParser')
            ->willReturn($real_parser)
        ;

        $this->assertInstanceOf('\\AndyTruong\\Yaml\\Parser\\YamlParserInterface', $parser->getRealParser());

        if ($available) {
            $this->assertEquals(array('person' => array('name' => 'James T')), $real_parser->parse('person: { name: "James T" }'));
            $this->assertEquals(array('name' => 'Drupal', 'age' => 13), $real_parser->parse("name: Drupal\nage: 13"));
        }
        else {
            $this->markTestSkipped('Need yaml extension to test this.');
        }
    }

    public function sourceParser()
    {
        return array(
            array(new SpycParser(), true),
            array(new SymfomyYamlParser(), true),
            array(new PHPExtensionParser(), function_exists('yaml_parse')),
        );
    }

    /**
     * @dataProvider sourceDumper
     */
    public function testDumper($real_dumper, $available)
    {
        $dumper = $this->getMock('AndyTruong\\Yaml\\YamlDumper');
        $dumper->expects($this->any())
            ->method('getRealDumper')
            ->willReturn($real_dumper)
        ;

        $this->assertInstanceOf('AndyTruong\\Yaml\\Dumper\\YamlDumperInterface', $dumper->getRealDumper());

        if ($available) {
            $o1 = $real_dumper->dump(array('key' => 'value'), true);
            $this->assertEquals("key: value", trim($o1, "-\n."));

            $o2 = $real_dumper->dump(array('name' => 'Drupal', 'age' => 13), true);
            $this->assertEquals("name: Drupal\nage: 13", trim($o2, "-\n."));
        }
    }

    public function sourceDumper()
    {
        return array(
            array(new SpycDumper(), true),
            array(new SymfonyYamlDumper(), true),
            array(new PHPExtensionDumper(), function_exists('yaml_emit')),
        );
    }

}
