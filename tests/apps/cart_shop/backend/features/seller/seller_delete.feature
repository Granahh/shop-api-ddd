Feature: Delete Seller
  As user
  I want to delete a Seller

  Scenario: Delete a  Seller
    Given I send a PUT request to "/seller/6be79011-21c7-46fe-9053-b4b56c24c188" with body:
    """
    {
      "name": "Seller 1",
      "email": "info@seller.com"
    }
    """
    Given I send a DELETE request to "/seller/6be79011-21c7-46fe-9053-b4b56c24c188"
    Then the response status code should be 200
    And the response should be empty



