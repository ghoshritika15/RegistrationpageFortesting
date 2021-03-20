class JournalPageComponent {

    getPageTitle() {
        return cy.get('.page-title > .title')
    }

    getPageSubTitle() {
        return cy.get(".page-title > .subtitle")
    }

    getJournalArticleTitle(){
        return cy.get('.article-list-title')
    }

    getJournalArticlebody(){
        return cy.get('.article-list-row__body__title')
    }
    
    getArticlePublishDate(){
        return cy.get('.article-list-row__body__byline > span:nth-child(2)')
    }

    getFullTextPDF(){
        return cy.get('.article-list-row__body__links > a:nth-child(1)')
    }

    getFullTextWeb(){
        return cy.get('.article-list-row__body__links > a:nth-child(2)')
    }

    getJournalClubVideoTitle(){
        return cy.get('.media-container > .title')
    }

    getSummaryDescription(){
        return cy.get(".keypoints-row-description")
    }

    getMessageCard(){
        return cy.get('.card-body')
    }

}
export default JournalPageComponent