<?php

declare(strict_types=1);

namespace Granah\CartShop\Tests\Shared\Infrastructure\Behat;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Mink\Session;
use Behat\MinkExtension\Context\RawMinkContext;
use Granah\CartShop\Tests\Shared\Infrastructure\Mink\MinkHelper;
use RuntimeException;

final class ApiResponseContext extends RawMinkContext
{
    private $sessionHelper;
    private $minkSession;

    public function __construct(Session $minkSession)
    {
        $this->minkSession = $minkSession;
        $this->sessionHelper = new MinkHelper($this->minkSession);
    }

    /**
     * @Then the response content should be:
     */
    public function theResponseContentShouldBe(PyStringNode $expectedResponse): void
    {
        $expected = $this->sanitizeOutput($expectedResponse->getRaw());
        $actual = $this->sanitizeOutput($this->sessionHelper->getResponse());

        if ($expected !== $actual) {
            throw new RuntimeException(
                sprintf("The outputs does not match!\n\n-- Expected:\n%s\n\n-- Actual:\n%s", $expected, $actual)
            );
        }
    }

    private function sanitizeOutput(string $output)
    {
        return json_encode(json_decode(trim($output), true));
    }

    /**
     * @Then the response should be empty
     */
    public function theResponseShouldBeEmpty(): void
    {
        $actual = trim($this->sessionHelper->getResponse());

        if (!empty($actual)) {
            throw new RuntimeException(
                sprintf("The outputs is not empty, Actual:\n%s", $actual)
            );
        }
    }

    /**
     * @Then print last api response
     */
    public function printApiResponse(): void
    {
        print_r($this->sessionHelper->getResponse());
    }

    /**
     * @Then print response headers
     */
    public function printResponseHeaders(): void
    {
        print_r($this->sessionHelper->getResponseHeaders());
    }

    /**
     * @Then the response status code should be :expectedResponseCode
     */
    public function theResponseStatusCodeShouldBe($expectedResponseCode): void
    {
        if ($this->minkSession->getStatusCode() !== (int)$expectedResponseCode) {
            throw new RuntimeException(
                sprintf(
                    'The status code <%s> does not match the expected <%s>',
                    $this->minkSession->getStatusCode(),
                    $expectedResponseCode
                )
            );
        }
    }
}
