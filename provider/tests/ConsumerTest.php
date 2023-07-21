<?php
namespace Acmachado14\PactProvider;

use GuzzleHttp\Psr7\Uri;
use PhpPact\Standalone\ProviderVerifier\Model\VerifierConfig;
use PhpPact\Standalone\ProviderVerifier\Verifier;
use PHPUnit\Framework\TestCase;

class ConsumerTest extends TestCase
{

    public function testPersonConsumer()
    {
        $config = new VerifierConfig();
        $config->setProviderName("backend")
            ->setProviderVersion(exec('git rev-parse --short HEAD'))
            ->setProviderBranch(exec('git rev-parse --abbrev-ref HEAD'))
            ->setProviderBaseUrl(new Uri("http://localhost:8000"))
            ->setBrokerUri(new Uri("http://localhost:9292"))
            ->setPublishResults(true);

        $verifier = new Verifier($config);
        $verifier->verifyAll();

        $this->assertTrue(true);
    }

}