// 05_viewEntries.spec.js
const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("View Entries Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver();
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/view.php");
    });

    it("should navigate to the edit page for a specific item", async function() {
        // Expand all dropdowns
        const dropdownTriggers = await driver.findElements(By.className('dropdown-trigger'));
        for (const trigger of dropdownTriggers) {
            await trigger.click();
        }

        // Wait for an edit button to be visible and clickable
        const editButton = await driver.wait(until.elementLocated(By.xpath("//input[@type='submit' and @value='Edit']")), 10000);
        await driver.wait(until.elementIsVisible(editButton), 10000);
        await driver.wait(until.elementIsEnabled(editButton), 10000);

        // Scroll to the edit button if necessary
        await driver.executeScript("arguments[0].scrollIntoView(true);", editButton);

        // Click on the edit button
        await editButton.click();

        // Wait for the URL to change to the edit page
        await driver.wait(until.urlContains('edit'), 10000);
        
        // Verify navigation to the edit page
        const currentURL = await driver.getCurrentUrl();
        expect(currentURL).toContain('edit');
    });

});
