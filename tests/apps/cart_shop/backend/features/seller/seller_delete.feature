Feature: Delete Seller
  As user
  I want to delete a Seller

  Scenario: Delete a  Seller
    Given I create a valid seller with id '6be79011-21c7-46fe-9053-b4b56c24c188'
    Given I send a DELETE request to "/seller/6be79011-21c7-46fe-9053-b4b56c24c188"
    Then the response status code should be 200
    And the response should be empty
