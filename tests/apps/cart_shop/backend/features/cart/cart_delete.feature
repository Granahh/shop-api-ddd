Feature: Add product to cart
  Scenario: Add product to cart
    Given I create a valid product cart with id '7be90081-21c7-46fe-9053-b4b56c24c158'
    Given I send a DELETE request to "/cart/7be90081-21c7-46fe-9053-b4b56c24c158"
    Then the response status code should be 200
    And the response should be empty