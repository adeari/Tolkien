<?php namespace Tolkien;

use Symfony\Component\Yaml\Parser;

class TolkienBuildPostTest extends \PHPUnit_Framework_TestCase
{

	private $init;

	public function __construct()
	{
		$this->init = new Init('blog');
		$this->init->create();
	}

	public function testBuildPost()
	{
		$parser = new Parser();
		$config = $parser->parse(file_get_contents( ROOT_DIR . $this->init->getName() . '/config.yml' ));

		$initDraft = new BuildPost($config, $parser);
		$initDraft->build();


	}		
}