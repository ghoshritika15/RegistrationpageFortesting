import { Given, When, Then, And } from "cypress-cucumber-preprocessor/steps";

const uname = Cypress.env('uName');
const pwd = Cypress.env('pWord');
let value
var rowValue = [];
let randometext;

Given('Enter Login Url', () => {
    cy.visit(Cypress.env('url') + "loginpage.php")
})

When('Enter username and password', function () {
    cy.login(uname, pwd);
})

Then('Validate Homepage url after Successful login', () => {
    cy.url()
        .should('contain', Cypress.env('url') + "homepage.php");
})

And('Validate Table header are center aligned and capitalize', () => {
    cy.get('thead > tr >').each((item) => {
        cy.wrap(item)
            .should('have.css', 'text-align', 'center')
        cy.wrap(item).invoke('text').then((text) => {
            expect(text.trim()).to.match(/(?:[A-Z]|[text-transform^=capitalize])/);
        });
    });
})

Then('Validate birthday is in format of year-month-day', () => {
    cy.get('[data-target="birthday"]').each(($e1) => {
        const datecheck = $e1.text().trim();
        var utc = Cypress.moment(datecheck, "YYYY-MM-DD", true)
        expect(utc.isValid()).to.be.true
    });
})

Then('Validate Mobile No have 10 digit only', () => {
    cy.get('tbody > tr > :nth-child(5)').each((item) => {
        cy.wrap(item).invoke('text').then((text) => {
            expect(text.trim()).to.have.length(10)
        });
    });
})

Then('Validate Update button have data-id same as that of row', () => {
    cy.get('tbody > tr').each((item) => {
        cy.wrap(item).invoke('attr', 'id').then(id => {
            value = id
        })
        cy.wrap(item).find(':nth-child(6) > .btn').invoke('attr', 'data-id').then(text => {
            expect(text).to.equal(value)
        })
    });
})

Then('Validate Delete button have data-id same as that of row', () => {
    cy.get('tbody > tr').each((item) => {
        cy.wrap(item).invoke('attr', 'id').then(id => {
            value = id
        })
        cy.wrap(item).find(':nth-child(7) > a > .btn').invoke('attr', 'data-id').then(text => {
            expect(text).to.equal(value)
        })

    });
})

And('Click on update button of logged in user', () => {
    cy.get('tbody > tr >td[data-target="firstname"]').parent().invoke('attr', 'id').then(id => {
        value = id
    })

    cy.get(`tbody > tr[id="${value}"] >td >a`).first().as('update').trigger('mouseover')
    cy.get("@update")
        .should('be.visible')
        .click()
})

Then('Validate modal page when update button is clicked', () => {
    cy.get('.modal-title')
        .should('contain.text', 'Update User Details')
})

Then('Validate fields in modal page matches with table row of logged in user', () => {
    // need to complete
    var modData = [];
    cy.get('tbody > tr >td[data-target="firstname"]').parent().invoke('attr', 'id').then(id => {
        value = id
    })

    cy.get(`tbody > tr[id="${value}"] >td`).each((item) => {
        cy.wrap(item).invoke('text').then((text) => {
            rowValue.push(text.trim())
        });
    });

    cy.get('.form-group>input:visible').each((item) => {
        cy.wrap(item).invoke('text').then((text) => {
            modData.push(text.trim())
        });
    });

})

Then('Update any fields in modal page', () => {

    cy.get('tbody > tr >td[data-target="firstname"]').parent().invoke('attr', 'id').then(id => {
        value = id
    })

    cy.get(`tbody > tr[id="${value}"] >td >a`).first().as('update')
    cy.get("@update")
        .should('be.visible')
        .click({ force: true });

    cy.get('#lastname').clear()
    randometext = randomUser()
    cy.get('#lastname').type(randometext)
    cy.get('#save').click()

})

And('Validate table row data after update', () => {
    cy.reload()
    cy.get(`tbody > tr[id="${value}"] >td[data-target="lastname"]`).invoke('text').then((text) => {
        expect(text.trim()).to.equal(randometext)
    });
})

Then('Empty any fields in modal page', () => {
    cy.get(`tbody > tr[id="1"] >td >a`).first().as('update')
    cy.get("@update")
        .should('be.visible')
        .click({ force: true });
    cy.get('#lastname').clear()
    cy.get('#save').click()
})

And('Validate if table row data is empty', () => {
    cy.reload()
    cy.get(`tbody > tr[id="1"] >td[data-target="lastname"]`).invoke('text').then((text) => {
        expect(text).to.be.equal(' ')
    });

})

And('Click on close button', () => {
    cy.get(`tbody > tr[id="1"] >td >a`).first().as('update')
    cy.get("@update")
        .should('be.visible')
        .click({ force: true });
        cy.get('.close').click()
})

Then('Validate if close button closes the modal page', () => {
    
})

And('Click on Delete button', () => {
    cy.get('tbody > tr >td[data-target="firstname"]').parent().invoke('attr', 'id').then(id => {
        value = id
    })

    cy.get(`tbody > tr[id="${value}"] >td >a`).last().as('delete').trigger('mouseover')
    cy.get("@delete")
        .should('be.visible')
        .click()
    

})

Then('Validate if Delete button removes the entire row of the page', () => {
    cy.get('tbody > tr').each((item) => {
        cy.wrap(item).invoke('attr', 'id').then(id => {
            value = id
        })
        cy.wrap(item).find(':nth-child(7) > a > .btn').invoke('attr', 'data-id').then(text => {
            expect(text).to.equal(value)
        })

    });

})

function randomUser() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    for (var i = 0; i < 5; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}

