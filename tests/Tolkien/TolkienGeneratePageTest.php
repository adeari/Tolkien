<?php namespace Tolkien;

use Symfony\Component\Yaml\Parser;

class TolkienGeneratePageTest extends \PHPUnit_Framework_TestCase
{

	private $init;

	public function __construct()
	{
		$this->init = new Init('blog');
		$this->init->create();
	}

	public function testCreatePage()
	{
		$parser = new Parser();
		$config = $parser->parse(file_get_contents( ROOT_DIR . $this->init->getName() . '/config.yml' ));

		$page = new GeneratePage( $config, "Latest Android Release" );

		$page->generate();

		// cek if file created
		$this->assertFileExists( $page->setPath() );

		// cek file is written by config
		$this->assertNotEmpty(file_get_contents($page->setPath()));
	}
}