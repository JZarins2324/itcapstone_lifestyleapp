// // home.spec.js
// const { getDriver } = require('./support/webdriver');
// const { By, until } = require('selenium-webdriver');

// describe("Home Page Tests", function() {
//     let driver;

//     beforeAll(async () => {
//         driver = await getDriver();
//         await driver.get("http://localhost/itcapstone_lifestyleapp/pages/home.php");
//     });

//     it("should display the recent task section", async function() {
//         const recentTaskSection = await driver.wait(until.elementLocated(By.css('.note-section')), 10000);
//         expect(recentTaskSection).toBeDefined();
//     });

//     it("should display task details in recent tasks", async function() {
//         const recentTaskDetails = await driver.wait(until.elementLocated(By.css('.note-section .task-desc')), 10000); 
//         expect(recentTaskDetails).toBeDefined();
//     });

//     it("should have edit and delete buttons for recent tasks", async function() {
//         const editButton = await driver.wait(until.elementLocated(By.xpath("//input[@type='button' and @value='Edit']")), 10000);
//         const deleteButton = await driver.wait(until.elementLocated(By.xpath("//input[@type='submit' and @value='Delete']")), 10000);
//         expect(editButton).toBeDefined();
//         expect(deleteButton).toBeDefined();
//     });

//     // Repeat the similar structure for "newest" and "oldest" task sections
//     // Note: Ensure that the specific classes, ids, or other identifiers used in these tests match those in your actual HTML

//     afterAll(async () => {
//         // Navigate to the new entry page for the next set of tests
//         await driver.get("http://localhost/itcapstone_lifestyleapp/pages/input.php");
//     });
// });
