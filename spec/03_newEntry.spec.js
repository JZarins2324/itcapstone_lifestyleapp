// 03_newEntry.spec.js

const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("New Entry Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver(); // Use the shared WebDriver instance
        // Navigate to the New Entry page
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/input.php");
    });

    it("should display the new entry form", async function() {
        // Wait until the form is located
        const form = await driver.wait(until.elementLocated(By.css('form')), 10000);

        // Verify that the form is displayed
        const isFormDisplayed = await form.isDisplayed();
        expect(isFormDisplayed).toBe(true);
    });

    it("should display the submit button", async function() {
        // Wait until the submit button is located
        const submitButton = await driver.wait(until.elementLocated(By.id('submit')), 10000);

        // Verify that the submit button is displayed
        const isSubmitButtonDisplayed = await submitButton.isDisplayed();
        expect(isSubmitButtonDisplayed).toBe(true);
    });

    // You can add more tests specific to the functionalities of your New Entry page

});
