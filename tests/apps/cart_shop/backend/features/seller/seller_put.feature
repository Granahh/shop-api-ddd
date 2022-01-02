Feature: Create a new Seller
  In order to create a new valid Seller
  I want to create a new Seller

  Scenario: Create a new Seller
    Given I send a PUT request to "/seller/6be99081-21c7-46fe-9053-b4b56c24c188" with body:
    """
    {
      "name": "Seller 1",
      "email": "info@seller.com"
    }
    """
    Then the response status code should be 201
    And the response should be empty

