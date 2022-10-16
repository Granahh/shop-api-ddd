Feature: Delete a existing product

  Scenario: Delete a existing product
    Given I create a valid seller with id "5c9b8f8f-c8e0-4f5e-b8f8-f8f8f8f8f8f8"
    Given I create a valid product with id "6be99081-21c7-46fe-9053-b4b56c24c188" and sellerId "5c9b8f8f-c8e0-4f5e-b8f8-f8f8f8f8f8f8"
    Given I send a DELETE request to "/product/6be99081-21c7-46fe-9053-b4b56c24c188"
    Then the response status code should be 200
    And the response should be empty

