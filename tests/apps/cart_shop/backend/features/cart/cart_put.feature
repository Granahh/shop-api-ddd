Feature: Add product to cart

  Scenario: Add product to cart
    Given I create a valid seller with id '5c9b8f8f-c8e0-4f5e-b8f8-f8f8f8f8f8f8'
    Given I create a valid product with id '6be99081-21c7-46fe-9053-b4b56c24c188' and sellerId '5c9b8f8f-c8e0-4f5e-b8f8-f8f8f8f8f8f8'
    Given I send a PUT request to "/cart/7be90081-21c7-46fe-9053-b4b56c24c158" with body:
    """
    {
      "productId": "6be99081-21c7-46fe-9053-b4b56c24c188",
      "qt": 1
    }
    """
    Then the response status code should be 201
    And the response should be empty