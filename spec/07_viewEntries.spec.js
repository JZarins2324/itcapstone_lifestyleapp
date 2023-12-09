// viewEntries.spec.js
const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("View Entries Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver();
        await driver.get("http://itcapstonelifestyleapp.infinityfreeapp.com/pages/view.php");
    });
		
		it("should expand all dropdowns", async function() {
			const dropdownTriggers = await driver.findElements(By.className('dropdown-trigger'));
			for (const trigger of dropdownTriggers) {
					await trigger.click();
			}

			// Optionally, verify that dropdowns have expanded
			// For example, check if certain elements within the dropdown are visible now
	});
		
		it("should successfully log out the user", async function() {
			// Find and click the 'Logout' link
			const logoutLink = await driver.findElement(By.linkText("Logout"));
			await logoutLink.click();

			// Wait for redirection to the login page
			await driver.wait(until.urlContains('login.php'), 10000);

			// Verify that the current page is the login page
			const currentURL = await driver.getCurrentUrl();
			expect(currentURL).toContain('login.php');

	});

		afterAll(async () => {
					await driver.quit();
			});

});
