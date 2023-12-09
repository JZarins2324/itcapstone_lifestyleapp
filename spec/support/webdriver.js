const { Builder } = require('selenium-webdriver');
require('chromedriver');

let driver;

module.exports = {
    getDriver: async () => {
        if (!driver) {
            driver = new Builder().forBrowser('chrome').build();
        }
        return driver;
    },
    closeDriver: async () => {
        if (driver) {
            await driver.quit();
            driver = null;
        }
    }
};
