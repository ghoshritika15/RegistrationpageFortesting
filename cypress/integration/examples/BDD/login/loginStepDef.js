import { Given, When, Then, And } from "cypress-cucumber-preprocessor/steps";

let username;

Given('Enter Login Url', () => {
    cy.visit(Cypress.env('url') + "loginpage.php")
})

When('Enter username and password', function (dataTable) {
    username = dataTable.rawTable[1][0];
    cy.get('input[name="email"]').type(dataTable.rawTable[1][0]);
    cy.get('input[name="password"]').type(dataTable.rawTable[1][1]);

})

And('Click on Login', () => {
    cy.get('input[name="submit"]').click({ force: true });
})


Then('Verify current url', () => {
    cy.url()
        .should('contain', Cypress.env('url') + "homepage.php");
})

Then('Verify logged in user present in datatable', function (dataTable) {
    let found = false;
    cy.get('tbody > tr > td[data-target="email"]').as('email');
    cy.get('@email').each(fn =>{
        const itemText =fn.text();
        cy.log(itemText)
        cy.log(username)
        if(itemText.includes(username)){
            found = true
            assert.isTrue(true, 'user found')
        }else {
            assert.isNotTrue('tests failed', 'user not found')
        }
    })

})

Then('Validate error message for incorrect email and password', () => {
    cy.get('.error')
        .should('contain.text', ' Incorrect EmailID or Password')
})

Then('Validate error message with empty email and password', () => {
    cy.get('.error')
        .should('contain.text', 'Email is required')
})
