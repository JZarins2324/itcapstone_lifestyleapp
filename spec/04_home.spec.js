// //home.spec.js
// const { getDriver } = require('./support/webdriver');
// const { By, until } = require('selenium-webdriver');

// describe("Home Page Tests", function() {
//     let driver;

//     beforeAll(async () => {
//         driver = await getDriver();
//         await driver.get("http://itcapstonelifestyleapp.infinityfreeapp.com/home");
//     });

//     it("should display the recent task section", async function() {
//         const recentTaskSection = await driver.findElement(By.css('.note-section .flex-container .selectable-text'));
//         expect(recentTaskSection).toBeDefined();
//     });

//     it("should display task details in recent tasks", async function() {
//         const recentTaskDetails = await driver.findElement(By.id("recentTaskDesc-1")); // Assuming taskID is 1 for demonstration
//         expect(recentTaskDetails).toBeDefined();
//     });

//     it("should have edit and delete buttons for recent tasks", async function() {
//         const editButton = await driver.findElement(By.id("recentEditButton-1")); // Assuming taskID is 1
//         const deleteButton = await driver.findElement(By.xpath("//input[@value='Delete' and @name='Delete']"));
//         expect(editButton).toBeDefined();
//         expect(deleteButton).toBeDefined();
//     });

//     it("should display the newest task section", async function() {
//         const newestTaskSection = await driver.findElement(By.css('.note-section .flex-container .selectable-text'));
//         expect(newestTaskSection).toBeDefined();
//     });

//     it("should display task details in newest tasks", async function() {
//         const newestTaskDetails = await driver.findElement(By.id("newTaskDesc-1")); // Modify as per actual IDs
//         expect(newestTaskDetails).toBeDefined();
//     });

//     it("should display the oldest task section", async function() {
//         const oldestTaskSection = await driver.findElement(By.css('.note-section .flex-container .selectable-text'));
//         expect(oldestTaskSection).toBeDefined();
//     });

//     it("should display task details in oldest tasks", async function() {
//         const oldestTaskDetails = await driver.findElement(By.id("oldTaskDesc-1")); // Modify as per actual IDs
//         expect(oldestTaskDetails).toBeDefined();
//     });

//     // More tests as needed...

//     afterAll(async () => {
//         // Navigate to the new entry page for the next set of tests
//         await driver.get("http://itcapstonelifestyleapp.infinityfreeapp.com/newEntry");
//     });
// });
