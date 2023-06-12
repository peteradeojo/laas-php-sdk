<?php

namespace Peteradeojo\LAAS\Tests;

use Dotenv\Dotenv;
use Peteradeojo\LAAS\Laas;
use Peteradeojo\LAAS\LaasLogDTO;
use PHPUnit\Framework\TestCase;

class LaasTest extends TestCase
{
  protected Laas $laas;

  public static function setUpBeforeClass(): void
  {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../', '.env.testing');
    $dotenv->load();
    parent::setUpBeforeClass();
  }
  
  protected function setUp(): void
  {
    $this->laas = Laas::getInstance();
    parent::setUp();
  }

  public function testLaasSingleTon()
  {
    $this->assertInstanceOf(Laas::class, $this->laas);
  }

  public function test_send_log()
  {
    [$status, $data] = $this->sendLog();

    $this->assertTrue($status == 200);
    $this->assertArrayHasKey('data', $data);
  }

  public function test_send_logs_with_invalid_value()
  {
    $log = new LaasLogDTO();

    $log->level = 'jonze';
    $log->message = 'This is a test message';

    [$status] = $this->sendLog($log);

    $this->assertNotContains($status, [200, 201]);
    $this->assertEquals($status, 400);
  }

  private function sendLog(LaasLogDTO $log = null)
  {
    if (!$log) {
      $log = new LaasLogDTO();

      $log->level = 'info';
      $log->message = 'This is a test message';
    }

    $response = $this->laas->sendLog($log);

    $data = json_decode($response->getBody()->getContents(), true);
    $status = $response->getStatusCode();

    return [$status, $data];
  }
}
