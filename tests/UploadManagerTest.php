<?php

namespace Yaojinhui1993\Upload\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Yaojinhui1993\Upload\UploadManager;

class UploadManagerTest extends TestCase
{
    protected function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function testCreateDefaultDriver()
    {
        $uploadManager = new UploadManager(
            [
                'config' => [
                    'upload' => [],
                ],
            ],
            $request = m::mock('Illuminate\Http\Request'),
            $files = m::mock('Recca0120\Upload\Filesystem')
        );
        $request->shouldReceive('root')->andReturn($root = 'foo');
        $this->assertInstanceOf('Recca0120\Upload\Receiver', $uploadManager->driver());
    }

    public function testCreatePluploadDriver()
    {
        $uploadManager = new UploadManager(
            [
                'config' => [
                    'upload' => [],
                ],
            ],
            $request = m::mock('Illuminate\Http\Request'),
            $files = m::mock('Recca0120\Upload\Filesystem')
        );
        $request->shouldReceive('root')->andReturn($root = 'foo');
        $this->assertInstanceOf('Recca0120\Upload\Receiver', $uploadManager->driver('plupload'));
    }

    public function testCreateFineUploaderDriver()
    {
        $uploadManager = new UploadManager(
            [
                'config' => [
                    'upload' => [],
                ],
            ],
            $request = m::mock('Illuminate\Http\Request'),
            $files = m::mock('Recca0120\Upload\Filesystem')
        );
        $request->shouldReceive('root')->andReturn($root = 'foo');
        $this->assertInstanceOf('Recca0120\Upload\Receiver', $uploadManager->driver('fineuploader'));
    }
}
