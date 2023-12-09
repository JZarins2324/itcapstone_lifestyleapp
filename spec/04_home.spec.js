// 04_home.spec.js
const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("Home Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver();
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/home.php");
    });

    it("should allow editing in the recent task section", async function() {
        // Wait until the recent task edit button is located
        const editButton = await driver.wait(until.elementLocated(By.css('input[type="button"][value="Edit"]')), 10000);

        // Verify that the edit button is displayed
        const isEditButtonDisplayed = await editButton.isDisplayed();
        expect(isEditButtonDisplayed).toBe(true);

        // Click the edit button
        await editButton.click();

        // Add additional assertions to verify the editing functionality
    });

    // If there are any other tests for the home page, include them here

    afterAll(async () => {
        // Navigate to the New Entry page
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/view.php");

        // Note: Do not quit the driver here if you have subsequent tests
        // If this is the last test in your suite, then you can close the driver
        // await driver.quit();
    });
});
