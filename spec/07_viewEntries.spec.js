// viewEntries.spec.js
const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("View Entries Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver();
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/view.php");
    });

    it("should display dropdown triggers and tables for each section", async function() {
        // Expand each dropdown section
        const dropdownTriggers = await driver.findElements(By.className('dropdown-trigger'));
        for (const trigger of dropdownTriggers) {
            await trigger.click();
        }

        // Wait for the tables to be located and visible
        const toDoListTable = await driver.wait(until.elementLocated(By.xpath("//h2[contains(text(), 'To Do List')]/following-sibling::div//table")), 10000);
        const passwordsTable = await driver.wait(until.elementLocated(By.xpath("//h2[contains(text(), 'Passwords')]/following-sibling::div//table")), 10000);
        const notesTable = await driver.wait(until.elementLocated(By.xpath("//h2[contains(text(), 'Notes')]/following-sibling::div//table")), 10000);

        // Verify the tables are displayed
        expect(await toDoListTable.isDisplayed()).toBe(true);
        expect(await passwordsTable.isDisplayed()).toBe(true);
        expect(await notesTable.isDisplayed()).toBe(true);
    });

    afterAll(async () => {
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/home.php");
    });
});
