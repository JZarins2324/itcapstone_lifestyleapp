// 04_home.spec.js
const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("Home Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver();
        await driver.get("http://itcapstonelifestyleapp.infinityfreeapp.com/pages/home.php");
    });

    it("should allow editing in the recent task section", async function() {
        // Wait until the recent task edit button is located
        const editButton = await driver.wait(until.elementLocated(By.css('input[type="button"][value="Edit"]')), 10000);

        // Verify that the edit button is displayed
        const isEditButtonDisplayed = await editButton.isDisplayed();
        expect(isEditButtonDisplayed).toBe(true);

        // Click the edit button
        await editButton.click();

    });

    it("should navigate to the Home page when clicking 'View Entries Page'", async function() {
			const newEntryLink = await driver.findElement(By.linkText('View Entries'));
			await newEntryLink.click();
	
			await driver.wait(until.urlIs("http://itcapstonelifestyleapp.infinityfreeapp.com/pages/view.php"), 10000);
	
			const currentURL = await driver.getCurrentUrl();
			expect(currentURL).toBe("http://itcapstonelifestyleapp.infinityfreeapp.com/pages/view.php");
	});
});
