Feature: Homepage Validation

    Home Page Testcases

    Scenario: Validate Table header are center aligned and capitalize
    Given Enter Login Url
    When Enter username and password
    Then Validate Homepage url after Successful login
    And Validate Table header are center aligned and capitalize

    Scenario: Validate birthday is in format of year-month-day
    Given Enter Login Url
    When Enter username and password
    Then Validate birthday is in format of year-month-day


    Scenario: Validate Mobile No have 10 digit only
    Given Enter Login Url
    When Enter username and password
    Then Validate Mobile No have 10 digit only


    Scenario: Validate Update button have data-id same as that of row
    Given Enter Login Url
    When Enter username and password
    Then Validate Update button have data-id same as that of row

    Scenario: Validate  Delete button have data-id same as that of row
    Given Enter Login Url
    When Enter username and password
    Then Validate Delete button have data-id same as that of row

    Scenario: Validate modal page when update button is clicked 
    Given Enter Login Url
    When Enter username and password
    And Click on update button of logged in user
    Then Validate modal page when update button is clicked 


    Scenario: Validate fields in modal page matches with table row of logged in user
    Given Enter Login Url
    When Enter username and password
    And Click on update button of logged in user
    Then Validate fields in modal page matches with table row of logged in user


    Scenario: Update any fields in modal page and validate if table row data is changed accordingly
    Given Enter Login Url
    When Enter username and password
    And Click on update button of logged in user
    Then Update any fields in modal page
    And Validate table row data after update


    Scenario: Empty any fields in modal page and validate if table row data is empty
    Given Enter Login Url
    When Enter username and password
    And Click on update button of logged in user
    Then Empty any fields in modal page 
    And Validate if table row data is empty


    Scenario: Validate if close button closes the modal page
    Given Enter Login Url
    When Enter username and password
    And Click on update button of logged in user
    And Click on close button
    Then Validate if close button closes the modal page


    Scenario: Validate if Delete button removes the entire row of the page
    Given Enter Login Url
    When Enter username and password
    And Click on Delete button
    Then Validate if Delete button removes the entire row of the page
