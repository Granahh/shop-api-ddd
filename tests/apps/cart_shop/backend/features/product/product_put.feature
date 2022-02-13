Feature: Create a new Product
  Scenario: Create a new Product
    Given I create a valid seller with id '6be99081-21c7-46fe-9053-b4b56c24c188'
    Given I send a PUT request to "/product/6be99081-21c7-46fe-9053-b4b56c24c188" with body:
    """
    {
      "name": "Zapatillas Nike",
      "description": "Zapatillas de calidad",
      "email": "Las mejores zapatillas del mercado",
      "price": "100",
      "sellerId": "5c9b8f8f-c8e0-4f5e-b8f8-f8f8f8f8f8f8"
    }
    """
    Then the response status code should be 201
    And the response should be empty

