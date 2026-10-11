# kimiyu.ch: the studio landing page (to build)

Written 2026-10-11 at the end of the Wallaby session, for whoever opens this folder next. Last updated 2026-10-11 (artwork decided: the bear; Amor not shown; Laravel app set up; page built).

## Start here

1. Read this file, then look at `../joey.web` (the model) and `artwork/kimiyu-bear.svg`.
2. ~~Create a fresh Laravel 13 app in this folder, set it up like `../joey.web`, and push it to `https://github.com/kimiyuch/kimiyu.web.git`.~~ Done 2026-10-11: fonts, Tailwind, heroicons, tests workflow, `deploy.sh` (targets `~/www/kimiyu.ch`, not run yet) and a placeholder `home.blade.php` with plain links.
3. ~~Serve it in Herd as `https://kimiyu.web.test`.~~ Done (secured).
4. ~~Build the page with the `/ui` skill.~~ Done 2026-10-11: hero with the bear on a honey tile, cards for Joey, Bilby and Wallaby, contact, `/legal`, redirects for the old Wallaby paths, no cookies. Palette `honey` in `app.css`; tile and favicons from `scripts/make-icon.mjs`.
5. Go live on `~/www/kimiyu.ch` (see "The server right now").

## The goal

Turn kimiyu.ch into the landing page of the kimiyu studio: a single page that shows the things we built, each with its icon, a line about what it is and a link. Use the same styles and setup as the other sites, so it looks like their parent.

| | What it is | Live | Repo |
|---|---|---|---|
| **Joey** | A small, native BitTorrent client for macOS ("Open a magnet link, pick your files and let Joey carry them home") | https://joey.kimiyu.ch | `kimiyuch/joey.app` + `kimiyuch/joey.web` |
| **Bilby** | A calm poker tournament clock for the browser, Mac, iPad and iPhone. Free, no account | https://bilby.kimiyu.ch | `kimiyuch/bilby.app` + `kimiyuch/bilby.web` |
| **Amor** | Photograph the duty roster, and every shift goes into your calendar | https://amor.kimiyu.ch (behind a password, a personal tool; **not shown on the page**, decided 2026-10-11) | `kimiyuch/amor.web` |
| **Wallaby** | Split expenses, not relationships: a running tab for couples and housemates | https://wallaby.kimiyu.ch | `kimiyuch/wallaby.web` |

Each product is an Australian animal, drawn as a cute flat animal peeking over the app's object on a rounded gradient tile.

## The artwork: the kimiyu bear

`artwork/kimiyu-bear.svg` is the studio's mark (decided 2026-10-11): a friendly flat bear face with an open, happy smile, on a transparent background. Use it as the studio's mark on the page and as the source for the favicon and app icons.

- The SVG is a faithful vector copy of Marcel's chosen image, `artwork/kimiyu-bear-original.png` (1254×1254), built from that image's pixels: ears, inner ears, eyes, highlights and snout are fitted circles/ellipses; the head (with the small tufts at the cheeks), nose, mouth and tongue are traced outlines. Rendered at full size it matches the original to 99.15% of pixels. Keep the shapes as they are.
- `viewBox="0 0 1254 1254"`; the bear spans roughly x 95–1158, y 158–1107, so it sits a little low and wide in that square. Crop or pad the viewBox as needed for icons.
- Colours: ears `#9d6b45`, inner ears `#e3bb92`, head `#b78459`, snout `#ddb487`, eyes `#292929`, highlights `#fcfbfc`, nose `#3f3533`, mouth `#4c2e24`, tongue `#e06f6b`.
- No tile yet. For favicon and app icons, put it on a rounded tile like the products' icons; pick the tile colour together with the studio palette. Render the sizes from the SVG with a script like `../wallaby.web/scripts/make-icon.mjs`.
- The products are Australian animals drawn peeking over their app's object; the studio bear is just the face, which sets it apart as the parent brand.

## Use the same styles as the other sites

Model it on `../joey.web` (and look at `../bilby.web`, `../amor.web`, `../wallaby.web`):

- **Laravel 13 + Tailwind CSS 4**, theme colours in `resources/css/app.css` under `@theme`, `@import 'tailwindcss' source(none)` with `@source '../views'`.
- **Fonts:** Inter (self-hosted `resources/fonts/InterVariable.woff2`, weights 400–600, with `cv02 cv03 cv04 cv11`) and Figtree from Bunny for headings (`font-display`), both through `laravel-vite-plugin/fonts` in `vite.config.js` and `@fonts` in the layout. Copy the setup from `../joey.web/vite.config.js`.
- **Icons:** `blade-ui-kit/blade-heroicons`.
- **Design guidelines:** build it with the `/ui` skill, like the Wallaby and Joey landing pages.
- **Studio palette:** to decide, starting from the bear's warm browns and creams (above). The X banner in `../kimiyuch/header.html` blends the sites' light backgrounds (desert ochre, eucalyptus, sky) on `#fbfbf9`, with Figtree headlines in `#13222b`; useful for showing the four apps side by side. (GitHub avatar: `docs/avatar.png`, the bear on its honey tile, 1024×1024, rendered by `scripts/make-icon.mjs`.)
- **App icons:** `../kimiyuch/joey.png`, `bilby.png`, `amor.png` (from each `.app` repo's `docs/icon.png`); Wallaby's is `../wallaby.web/docs/icon.png`.
- **Deploy:** a `deploy.sh` like `../joey.web/deploy.sh` (Hostpoint over SSH, assets built locally and committed).

## Naming

- **Repo: `https://github.com/kimiyuch/kimiyu.web.git`** (public, created empty on 2026-10-11). Follows the suffix rule in the `kimiyuch` org: `.app` = native app, `.web` = website or web app.
- Local folder: `Webroot/kimiyu.web` (renamed from `kimiyu.ch` on 2026-10-11 to match the repo, like `joey.web` and `wallaby.web`). Serve it in Herd as `https://kimiyu.web.test`.
- Email: only `marcel@kimiyu.ch` (contact) and `bot@kimiyu.ch` (app emails) exist. There is no hello@ or privacy@.

## The server right now (Hostpoint, `pumutuxu@pumutuxu.myhostpoint.ch`)

- `~/www/kimiyu.ch` still holds the **old Wallaby app** (it was called kimiyu), in maintenance mode. Its data was moved to `~/www/wallaby.kimiyu.ch` on 2026-10-11; nothing there is needed any more.
- `~/www/kimiyu.ch/public/.htaccess` is a temporary **302 redirect to wallaby.kimiyu.ch** (so old links in emails keep working). The old app's `.htaccess` is saved next to it as `.htaccess.before-wallaby-20261011-205053`.
- **Before the first deploy:** `deploy.sh` never touches the server's `public/.htaccess`, so the temporary 302 would keep redirecting the new site. Replace it with Laravel's `public/.htaccess` (with `Use php-fpm php83` as the first line, or set PHP 8.3 in the Hostpoint panel). The redirects for the old app's paths now live in `routes/web.php`. `deploy.sh` also keeps the server's `storage/`, so the old app's logs and sessions stay there until removed by hand.
- The server's `.env` needs `APP_URL=https://kimiyu.ch` (canonical and share URLs come from it), `APP_ENV=production` and `APP_DEBUG=false`.
- After going live: add kimiyu.ch to Google Search Console and submit `https://kimiyu.ch/sitemap.xml`; the 301s move the old Wallaby pages out of the index.
- When the studio page goes live there: replace the folder contents with the new site (the old app can go), and the redirect disappears with it. Consider keeping redirects for the old app's paths (`/login`, `/register`, `/expenses`, `/profile`, `/verify-email`, `/reset-password/*`) to wallaby.kimiyu.ch, since old emails link there.
- PHP version per site: first line of `public/.htaccess`, e.g. `Use php-fpm php84` (Wallaby needs 8.4; Joey/Bilby/Amor use 8.3).
- DNS for kimiyu.ch is at Hostpoint; SPF, DKIM and DMARC (`p=quarantine`) are set up.

## Afterwards

- Archive the old GitHub repo `marceli-to/kimiyu.ch` (the old Wallaby code; Wallaby now lives in `kimiyuch/wallaby.web`).
