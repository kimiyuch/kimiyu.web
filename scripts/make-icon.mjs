// Puts the kimiyu bear (artwork/kimiyu-bear.svg) on a honey tile, like the apps' icons. Writes the
// SVGs and renders the PNGs with headless Chromium (needs `npm install`).
// Usage: node scripts/make-icon.mjs
import { chromium } from "playwright";
import { execFileSync } from "node:child_process";
import { mkdirSync, readFileSync, writeFileSync } from "node:fs";

const root = new URL("../", import.meta.url).pathname;

// The bear's shapes, without the <svg> wrapper. It spans roughly x 95–1158, y 158–1107 of its
// 1254 square, so (626.5, 632.5) is its middle.
const bearShapes = readFileSync(root + "artwork/kimiyu-bear.svg", "utf8")
  .replace(/^[\s\S]*?<svg[^>]*>/, "")
  .replace(/<\/svg>\s*$/, "");

const defs = `
    <linearGradient id="bg" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fbe3b4"/><stop offset="1" stop-color="#e0a254"/></linearGradient>
    <linearGradient id="sheen" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#fff" stop-opacity=".2"/><stop offset="1" stop-color="#fff" stop-opacity="0"/></linearGradient>
    <filter id="soft" x="-20%" y="-20%" width="140%" height="140%"><feDropShadow dx="0" dy="10" stdDeviation="12" flood-color="#4c2e24" flood-opacity=".25"/></filter>
    <filter id="icon" x="-10%" y="-10%" width="120%" height="125%"><feDropShadow dx="0" dy="10" stdDeviation="12" flood-color="#000" flood-opacity=".3"/></filter>
    <clipPath id="squircle"><rect x="100" y="100" width="824" height="824" rx="185"/></clipPath>`;

const background = `
  <rect width="1024" height="1024" fill="url(#bg)"/>
  <rect width="1024" height="560" fill="url(#sheen)"/>`;

const art = `
  <g filter="url(#soft)" transform="translate(512 532) scale(0.74) translate(-626.5 -632.5)">${bearShapes}</g>`;

const svg = (viewBox, body) =>
  `<svg xmlns="http://www.w3.org/2000/svg" viewBox="${viewBox}">\n  <defs>${defs}\n  </defs>${body}\n</svg>\n`;

// Full-bleed square for the apple-touch-icon (iOS rounds the corners).
const square = svg("0 0 1024 1024", background + art);
// Rounded square on transparent with a shadow, on the macOS icon grid like the apps': favicon, page, README.
const rounded = svg("0 0 1024 1024", `
  <rect x="100" y="100" width="824" height="824" rx="185" fill="#e0a254" filter="url(#icon)"/>
  <g clip-path="url(#squircle)"><g transform="translate(100 100) scale(0.8047)">${background}${art}</g></g>`);
// Just the bear, cropped to its outline, for the header and footer mark.
const mark = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="90 150 1074 964">${bearShapes}</svg>\n`;

mkdirSync(root + "public/images", { recursive: true });
mkdirSync(root + "docs", { recursive: true });
writeFileSync(root + "public/favicon.svg", rounded);
writeFileSync(root + "public/images/kimiyu.svg", rounded);
writeFileSync(root + "public/images/bear.svg", mark);

const renders = [
  [rounded, "public/images/favicon-96x96.png", 96],
  [rounded, "docs/icon.png", 512],
  [square, "public/apple-touch-icon.png", 180],
  [rounded, "storage/app/favicon-32.png", 32],
  [rounded, "storage/app/favicon-48.png", 48],
];
const browser = await chromium.launch();
for (const [source, out, size] of renders) {
  const page = await browser.newPage({ viewport: { width: size, height: size } });
  await page.setContent(`<style>html,body{margin:0;background:transparent}svg{display:block;width:${size}px;height:${size}px}</style>${source}`);
  await page.screenshot({ path: root + out, omitBackground: true });
  await page.close();
  console.log(out);
}
await browser.close();

// favicon.ico for old browsers, from the 32 and 48 px renders (needs ImageMagick).
execFileSync("magick", [root + "storage/app/favicon-32.png", root + "storage/app/favicon-48.png", root + "public/favicon.ico"]);
console.log("public/favicon.ico");
