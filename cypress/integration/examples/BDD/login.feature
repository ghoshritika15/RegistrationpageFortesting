Feature: Login Page Validation

    LoginPage Testcases

    Scenario: Login Page validation with correct email and password
    Given Enter Login Url
    When Enter username and password
    |username|password|
    |ritika@abc.com|jan@2021|
    And Click on Login 
    Then Verify current url
    And Verify logged in user present in datatable

    Scenario: Login page validation with incorrect email and password
    Given Enter Login Url
    When Enter username and password
    |username|password|
    |neha@gmail.com|neha@1111|
    And Click on Login 
    Then Validate error message for incorrect email and password

    Scenario: Login page validation with empty email and password
    Given Enter Login Url
    And Click on Login 
    Then Validate error message with empty email and password


    
