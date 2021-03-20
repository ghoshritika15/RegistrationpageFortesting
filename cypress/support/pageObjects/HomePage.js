class HomePage
{
getEditBox(){
    return cy.get("input[name='name']:nth-child(2)")
}

gettwoWayDataBinding(){
    return cy.get('input[name="name"]:nth-child(1)')
}

getGender(){
    return cy.get('select')
}
getEnterprenour(){
    return cy.get('#inlineRadio3')
}
getShopTab(){
    return cy.get(':nth-child(2) > .nav-link')
}

}
export default HomePage