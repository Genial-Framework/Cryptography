<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography;

use Genial\Cryptography\Exception\UnexpectedValueException;
use PHPUnit\Framework\TestCase;

/**
 * HashHmacTest.
 */
final class HashHmacTest extends TestCase
{
    public function testIsSupportedAlgo()
    {
        $algorithm = 'sha512';
        $this->assertEquals(HashHmac::isSupportedAlgo($algorithm), true);
    }
 
    public function testIsSupportedAlgo1()
    {
        $algorithm = 'foo-bar';
        $this->assertEquals(HashHmac::isSupportedAlgo($algorithm), false);
    }
 
    public function testIsSupportedAlgo2()
    {
        $algorithm = 'sha512';
        $this->assertEquals(HashHmac::isSupportedAlgo($algorithm), true);
    }
    
    public function testGetLastSupportedAlgorithm()
    {
        $this->assertEquals(HashHmac::getLastSupportedAlgorithm(), 'sha512');
    }
    
    public function testClearLastAlgorithmCache()
    {
        HashHmac::clearLastAlgorithmCache();
        $this->assertEquals(HashHmac::getLastSupportedAlgorithm(), null);
    }
    
    public function testCipher()
    {
        $this->expectException(UnexpectedValueException::class);
        HashHmac::cipher('foo-bar', 'foo-bar', 'randomKey');
    }
 
    public function testCipher1()
    {
        $this->assertEquals(HashHmac::cipher('sha512', 'foo-bar', 'randomKey'), 'b62ef635bf133b84b3e5c0c4e77d09cf27e979f10de4cfb3c13e936ed1d8daf8dfd4b7ccf669f2a6e145e86bdf92ef0ab0471524b5e8f967a1e9936bdc785496');   
    }
 
    public function testGetOutputSize()
    {
        $this->assertEquals(HashHmac::getOutputSize('sha512', 'foo-bar', 'randomKey'), 128);
    }
 
    public function testGetOutputSize1()
    {
        $this->expectException(UnexpectedValueException::class);
        $size = HashHmac::getOutputSize('foo-bar', 'foo-bar', 'randomKey');
    }
  
}

