// 01_login.spec.js

const { getDriver } = require('./support/webdriver');
const { By, until } = require('selenium-webdriver');

describe("Login Page", function() {
    let driver;

    beforeAll(async () => {
        driver = await getDriver(); // Use the shared WebDriver instance
        await driver.get("http://itcapstonelifestyleapp.infinityfreeapp.com");
    });

    it("should display the login form", async function() {
        // Waiting for the login container to be located on the page
        const loginForm = await driver.wait(until.elementLocated(By.css('.login-container')), 10000);
        // Checking if the login container is displayed
        const isLoginFormDisplayed = await loginForm.isDisplayed();
        expect(isLoginFormDisplayed).toBe(true);
    });

		it("should show an error for invalid credentials", async function() {
			const usernameField = await driver.findElement(By.name("username"));
			const passwordField = await driver.findElement(By.name("password"));
			const submitButton = await driver.findElement(By.id("firstSubmit"));

			await usernameField.sendKeys("incorrectUser");
			await passwordField.sendKeys("incorrectPassword");
			await submitButton.click();

			await driver.sleep(1000); // Waiting for potential response

			// Assuming error messages are displayed within the '.login-container'
			const formText = await driver.findElement(By.css('.login-container')).getText();
			expect(formText).toContain("Password must include a number");
	});

	it("should successfully log in with valid credentials", async function() {
		const usernameField = await driver.findElement(By.name("username"));
		const passwordField = await driver.findElement(By.name("password"));
		const submitButton = await driver.findElement(By.id("firstSubmit"));

		await usernameField.sendKeys("artidyno"); // Replace with valid username
		await passwordField.sendKeys("aaaAAA111"); // Replace with valid password
		await submitButton.click();

		// Wait for redirection or confirmation of successful login
		await driver.wait(until.urlIs("http://itcapstonelifestyleapp.infinityfreeapp.com/pages/home.php"), 10000);
});

});
