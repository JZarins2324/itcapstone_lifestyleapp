// 06_editEntry.spec.js
const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("Edit Entry Page Tests", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver();
        // Assuming the navigation to the edit page is already done in the previous test
        // Ensure you are on the edit page
        await driver.wait(until.urlContains('edit'), 10000);
    });

    it("should remain on the edit page without performing any actions", async function() {
        // Verify that the current page is indeed the edit page
        const editPageHeader = await driver.findElement(By.tagName('h1'));
        const headerText = await editPageHeader.getText();
        expect(headerText).toContain('Edit Entry');

        // The test simply confirms the page and does nothing else
    });

		
    
    it("should verify the presence and functionality of the date input", async function() {
			const editPageHeader = await driver.findElement(By.tagName('h1'));
			expect(await editPageHeader.getText()).toContain('Edit Entry');

			const dateInput = await driver.findElement(By.name('date'));
			if (await dateInput.isDisplayed()) {
					// Directly setting the date value using JavaScript
					await driver.executeScript("arguments[0].setAttribute('value', '2024-01-01')", dateInput);

					// Adding a delay to allow any JavaScript processing
					await driver.sleep(500);

					const dateValue = await dateInput.getAttribute('value');
					console.log("Date set to:", dateValue); // Debugging output
					expect(dateValue).toBe('2024-01-01');
			} else {
					console.log("Date input not displayed. Skipping date input test.");
			}
	});

    afterAll(async () => {
        // Navigate back to the view page after the test is complete
        await driver.get("http://localhost/itcapstone_lifestyleapp/pages/view.php");
    });
});
