// 03_newEntry.spec.js

const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("New Entry Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver();
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/input.php");
    });

    it("should display the new entry form elements", async function() {
        // Verify select dropdown
        const selectDropdown = await driver.wait(until.elementLocated(By.id('userInput')), 10000);
        expect(await selectDropdown.isDisplayed()).toBe(true);

        // Verify input for name
        const nameInput = await driver.findElement(By.id('name'));
        expect(await nameInput.isDisplayed()).toBe(true);

        // Verify textarea for description
        const descTextarea = await driver.findElement(By.id('desc'));
        expect(await descTextarea.isDisplayed()).toBe(true);

        // Verify date input
        const dateInput = await driver.findElement(By.id('date'));
        // Checking if date input is present (it might be hidden initially)
        expect(await dateInput.isDisplayed()).toBe(false);

        // Verify submit button
        const submitButton = await driver.findElement(By.id('submit'));
        expect(await submitButton.isDisplayed()).toBe(true);

    });
		
		it("should navigate to the Home page when clicking 'Home Page'", async function() {
			const newEntryLink = await driver.findElement(By.linkText('Home Page'));
			await newEntryLink.click();
	
			await driver.wait(until.urlIs("http://localhost/itcapstone_lifestyleapp/pages/home.php"), 10000);
	
			const currentURL = await driver.getCurrentUrl();
			expect(currentURL).toBe("http://localhost/itcapstone_lifestyleapp/pages/home.php");
	});
});
