const puppeteer = require("puppeteer");

async function scrapeProduct(url) {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto(url);

    const [el] = await page.$x('//*[@id="imgBlkFront"]');
    const src = await el.getProperty("src");
    const imageURL = await src.jsonValue();

    const [el2] = await page.$x('//*[@id="productTitle"]');
    const txt = await el2.getProperty("textContent");
    const title = await txt.jsonValue();

    const [el3] = await page.$x('//*[@id="price"]');
    const txtPrice = await el3.getProperty("textContent");
    const price = await txtPrice.jsonValue();

    console.log({ imageURL, title, price });

    // browser.close();
}

// scrapeProduct('https://www.amazon.fr/Siddhartha-Hermann-Hesse-Classic-collection/dp/B092PGCV6B/ref=sr_1_4?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&crid=1OXPX1CCXZJVD&dchild=1&keywords=siddhartha+hermann+hesse&qid=1628775778&sprefix=siddhar%2Caps%2C178&sr=8-4');
