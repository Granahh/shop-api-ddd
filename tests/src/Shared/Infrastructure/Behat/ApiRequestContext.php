<?php

declare(strict_types = 1);

namespace Granah\CartShop\Tests\Shared\Infrastructure\Behat;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Mink\Session;
use Behat\MinkExtension\Context\RawMinkContext;
use Doctrine\ORM\EntityManager;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Cart\Domain\CartMother;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductIdMother;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductMother;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerMother;
use Granah\CartShop\Tests\CartShop\Shared\Domain\SellerIdMother;
use Granah\CartShop\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use Granah\CartShop\Tests\Shared\Infrastructure\Mink\MinkHelper;
use Granah\CartShop\Tests\Shared\Infrastructure\Mink\MinkSessionRequestHelper;
use Symfony\Component\DependencyInjection\Container;

final class ApiRequestContext extends RawMinkContext
{
    private MinkSessionRequestHelper $request;
    private DatabaseCleaner $dbCleaner;
    private EntityManager $em;
    public function __construct(Session $session, DatabaseCleaner $dbCleaner, EntityManager $em)
    {
        $this->request = new MinkSessionRequestHelper(new MinkHelper($session));
        $this->dbCleaner = $dbCleaner;
        $this->em = $em;
    }

    /**
     * @Given I send a :method request to :url
     */
    public function iSendARequestTo($method, $url): void
    {
        $this->request->sendRequest($method, $this->locatePath($url));
    }

    /**
     * @Given I send a :method request to :url with body:
     */
    public function iSendARequestToWithBody($method, $url, PyStringNode $body): void
    {
        $this->request->sendRequestWithPyStringNode($method, $this->locatePath($url), $body);
    }

    /**
     * @Given I create a valid seller with id :id
     */
    public function iCreateAValidSeller(string $id): void
    {
        $sellerId = new SellerId($id);
        $seller = SellerMother::create($sellerId);
        $this->em->persist($seller);
        $this->em->flush();
    }

    /**
     * @Given I create a valid product with id :id and sellerId :sellerId
     */
    public function iCreateAValidProduct(string $id,string $sellerId): void
    {
        $productId = new ProductId($id);
        $sellerId = new SellerId($sellerId);
        $product = ProductMother::create($productId,null,null,null,$sellerId);
        $this->em->persist($product);
        $this->em->flush();
    }

    /**
     * @Given I create a valid product cart with id :id
     */
    public function iCreateAValidProductCart(string $id): void
    {
        $cart = CartMother::create(new CartId($id));
        $this->em->persist($cart);
        $this->em->flush();
    }

    /**
     * @BeforeScenario
     */
    public function clearData()
    {
        $this->dbCleaner->__invoke($this->em);
    }

}
