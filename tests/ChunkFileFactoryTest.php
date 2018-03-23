<?php

namespace Yaojinhui1993\Upload\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Yaojinhui1993\Upload\ChunkFileFactory;

class ChunkFileFactoryTest extends TestCase
{
    protected function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function testCreate()
    {
        $chunkFileFactory = new ChunkFileFactory(
            $files = m::mock('Recca0120\Upload\Filesystem')
        );

        $files->shouldReceive('mimeType')->once()->andReturn('text/plain');

        $this->assertInstanceOf('Recca0120\Upload\ChunkFile', $chunkFileFactory->create('foo.php', 'foo.chunksPath', 'foo.storagePath', 'foo.token'));
    }
}
